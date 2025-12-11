<?php

namespace App\Console\Commands;

use App\Models\SeatReservation;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateAttendanceTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:generate-tokens {--fellowship= : Generate only for specific fellowship}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate unique attendance tokens for seat reservations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating attendance tokens...');

        $query = SeatReservation::whereNull('attendance_token');

        if ($fellowship = $this->option('fellowship')) {
            $query->where('fellowship', $fellowship);
            $this->info("Filtering by fellowship: {$fellowship}");
        }

        $reservations = $query->get();

        if ($reservations->isEmpty()) {
            $this->warn('No reservations found without attendance tokens.');
            return 0;
        }

        $this->info("Found {$reservations->count()} reservations without tokens");

        $bar = $this->output->createProgressBar($reservations->count());
        $bar->start();

        $generated = 0;

        foreach ($reservations as $reservation) {
            // Generate unique token
            $token = Str::random(32);
            
            // Ensure uniqueness
            while (SeatReservation::where('attendance_token', $token)->exists()) {
                $token = Str::random(32);
            }

            $reservation->update([
                'attendance_token' => $token,
            ]);

            $generated++;
            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("Successfully generated {$generated} attendance tokens!");

        return 0;
    }
}
