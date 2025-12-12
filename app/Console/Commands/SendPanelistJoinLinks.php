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
        {--dry-run : Preview emails without sending}
        {--only-emails= : Comma/semicolon-separated list of emails to send to (optional filter)}
        {--override-name= : Override name if sending to emails not present in sheet}
        {--override-link= : Override join link if sending to emails not present in sheet}';

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
        $onlyEmailsOption = (string) $this->option('only-emails');
        $overrideName = (string) $this->option('override-name');
        $overrideLink = (string) $this->option('override-link');
        $onlyEmails = [];
        if (!empty($onlyEmailsOption)) {
            $parts = preg_split('/[;,]+/', $onlyEmailsOption);
            foreach ($parts as $p) {
                $e = trim($p);
                if ($e !== '' && filter_var($e, FILTER_VALIDATE_EMAIL)) {
                    $onlyEmails[strtolower($e)] = true;
                }
            }
            if (!empty($onlyEmails)) {
                $this->info('Filtering to only these emails: ' . implode(', ', array_keys($onlyEmails)));
            }
        }
        $processedEmails = [];
        $sent = 0;
        $skipped = 0;
        $rowCount = 0;
        $filteredEmailsFound = [];

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
                $raw = trim((string) ($row[$emailIndex] ?? ''));
                if ($raw === '') {
                    continue;
                }
                // Support multiple emails in one cell separated by comma/semicolon
                $parts = preg_split('/[;,]+/', $raw);
                foreach ($parts as $part) {
                    $email = trim($part);
                    if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emails[] = $email;
                    }
                }
            }

            if ($name === '' || $joinUrl === '' || empty($emails)) {
                $this->warn("Skipping row " . ($index + 2) . " (missing name, link, or emails)");
                $skipped++;
                continue;
            }

            foreach ($emails as $email) {
                // Optional filter: only send to specified emails
                if (!empty($onlyEmails) && !isset($onlyEmails[strtolower($email)])) {
                    $skipped++;
                    continue;
                }

                // Deduplicate identical email entries across rows
                if (isset($processedEmails[$email])) {
                    $this->warn("Skipping duplicate email: {$email} (first seen for {$processedEmails[$email]})");
                    $skipped++;
                    continue;
                }

                $processedEmails[$email] = $name;
                $filteredEmailsFound[strtolower($email)] = true;

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

        // Handle filtered emails that were not present in the sheet, using overrides if provided
        if (!empty($onlyEmails)) {
            $missingEmails = array_diff(array_keys($onlyEmails), array_keys($filteredEmailsFound));
            if (!empty($missingEmails)) {
                if ($overrideName !== '' && $overrideLink !== '') {
                    foreach ($missingEmails as $email) {
                        if ($dryRun) {
                            $this->info("[DRY RUN] Would send (override) to: {$overrideName} <{$email}> | {$overrideLink}");
                        } else {
                            try {
                                Mail::to($email)->send(new PanelistJoinLinkEmail($overrideName, $overrideLink));
                                $this->info("✓ Sent (override) to: {$overrideName} <{$email}>");
                                $sent++;
                                $processedEmails[$email] = $overrideName;
                            } catch (\Throwable $e) {
                                $this->error("✗ Failed to send (override) to {$email}: " . $e->getMessage());
                                $skipped++;
                            }
                        }
                    }
                } else {
                    $this->warn('Some filtered emails were not found in the sheet and no override-name/override-link provided: ' . implode(', ', $missingEmails));
                }
            }
        }

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
