<?php

namespace App\Console\Commands;

use App\Mail\PanelistJoinLinkEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class SendPanelistJoinLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:panelist-join-links 
        {file=assets/1x/alg-panelist-join-links.xlsx : Excel file with panelist names, emails, and join links} 
        {--dry-run : Preview emails without sending}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send personalized panelist virtual join links from an Excel sheet';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        $this->info("Reading panelist join links from: {$filePath}");

        $data = Excel::toArray([], $filePath);

        if (empty($data) || empty($data[0])) {
            $this->error('No data found in Excel file');
            return 1;
        }

        $rows = $data[0];
        $headers = array_shift($rows); // Remove header row

        if (empty($headers)) {
            $this->error('Missing header row in Excel file');
            return 1;
        }

        // Map header indices
        $nameIndex = null;
        $linkIndex = null;
        $emailIndices = [];

        foreach ($headers as $i => $header) {
            $h = Str::lower(trim((string) $header));

            if (Str::contains($h, 'name')) {
                $nameIndex = $i;
            }

            if (Str::contains($h, 'link') || Str::contains($h, 'url')) {
                $linkIndex = $i;
            }

            if (Str::contains($h, 'email')) {
                $emailIndices[] = $i;
            }
        }

        if ($nameIndex === null || $linkIndex === null || empty($emailIndices)) {
            $this->error('Could not detect required columns. Needed: name, link/url, and at least one email column.');
            $this->line('Headers found: ' . implode(', ', $headers));
            return 1;
        }

        $this->info('Headers detected:');
        $this->line(' - Name column: ' . $headers[$nameIndex]);
        $this->line(' - Link column: ' . $headers[$linkIndex]);
        $this->line(' - Email columns: ' . implode(', ', array_map(fn($idx) => $headers[$idx], $emailIndices)));

        $dryRun = $this->option('dry-run');
        $processedEmails = [];
        $sent = 0;
        $skipped = 0;
        $rowCount = 0;

        foreach ($rows as $index => $row) {
            // Skip empty row
            if (empty(array_filter($row))) {
                continue;
            }

            $rowCount++;
            $name = trim((string) ($row[$nameIndex] ?? ''));
            $joinUrl = trim((string) ($row[$linkIndex] ?? ''));

            $emails = [];
            foreach ($emailIndices as $emailIndex) {
                $email = trim((string) ($row[$emailIndex] ?? ''));
                if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emails[] = $email;
                }
            }

            if ($name === '' || $joinUrl === '' || empty($emails)) {
                $this->warn("Skipping row " . ($index + 2) . " (missing name, link, or emails)");
                $skipped++;
                continue;
            }

            foreach ($emails as $email) {
                // Deduplicate identical email entries across rows
                if (isset($processedEmails[$email])) {
                    $this->warn("Skipping duplicate email: {$email} (first seen for {$processedEmails[$email]})");
                    $skipped++;
                    continue;
                }

                $processedEmails[$email] = $name;

                if ($dryRun) {
                    $this->info("[DRY RUN] Would send to: {$name} <{$email}> | {$joinUrl}");
                } else {
                    try {
                        Mail::to($email)->send(new PanelistJoinLinkEmail($name, $joinUrl));
                        $this->info("✓ Sent to: {$name} <{$email}>");
                        $sent++;
                    } catch (\Throwable $e) {
                        $this->error("✗ Failed to send to {$email}: " . $e->getMessage());
                        $skipped++;
                    }
                }
            }
        }

        $this->newLine();
        $this->info("Processed rows: {$rowCount}");
        $this->info("Total recipients processed: " . count($processedEmails));
        if ($dryRun) {
            $this->info("Dry run complete. No emails sent.");
        } else {
            $this->info("Successfully sent: {$sent}");
            if ($skipped > 0) {
                $this->warn("Skipped/failed: {$skipped}");
            }
        }

        return 0;
    }
}
