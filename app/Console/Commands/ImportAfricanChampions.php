<?php

namespace App\Console\Commands;

use App\Models\SeatReservation;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportAfricanChampions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:african-champions {file=assets/1x/Email list- Olara.xlsx} {--dry-run : Preview import without saving}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import African Champions from Excel file into seat reservations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');
        
        if (!file_exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        $this->info("Importing African Champions from: {$filePath}");

        $data = Excel::toArray([], $filePath);
        
        if (empty($data) || empty($data[0])) {
            $this->error('No data found in Excel file');
            return 1;
        }

        $rows = $data[0];
        $headers = array_shift($rows); // Remove header row
        
        $this->info("Found " . count($rows) . " rows to import");
        $this->info("Headers: " . implode(', ', $headers));

        $imported = 0;
        $skipped = 0;

        foreach ($rows as $index => $row) {
            // Skip empty rows
            if (empty(array_filter($row))) {
                continue;
            }

            // Map columns based on Excel structure: No., NAME, Email
            $name = $row[1] ?? null; // Column B (NAME)
            $email = $row[2] ?? null; // Column C (Email)
            
            if (empty($name) || empty($email)) {
                $this->warn("Skipping row " . ($index + 2) . ": Missing name or email");
                $skipped++;
                continue;
            }

            if ($this->option('dry-run')) {
                // Dry run mode - just show what would be imported
                $this->info("Would import: {$name} ({$email})");
                $imported++;
            } else {
                // Check if already exists
                $existing = SeatReservation::where('email', $email)->first();
                
                if ($existing) {
                    // Update existing record to mark as Africa Champion
                    $existing->update([
                        'is_fellow' => true,
                        'fellowship' => 'Africa Champions Invite',
                    ]);
                    $this->info("✓ Updated existing: {$name} ({$email}) - Now marked as Africa Champion");
                    $skipped++;
                    continue;
                }

                // Create reservation
                SeatReservation::create([
                    'full_name' => $name,
                    'email' => $email,
                    'phone' => null,
                    'sector' => 'Civil Society', // Default sector
                    'is_fellow' => true,
                    'fellowship' => 'Africa Champions Invite',
                    'attendance_mode' => null,
                ]);

                $imported++;
                $this->info("✓ Imported: {$name} ({$email})");
            }
        }

        $this->newLine();
        $this->info("Import completed!");
        $this->info("New imports: {$imported}");
        $this->info("Updated existing: {$skipped}");

        return 0;
    }
}
