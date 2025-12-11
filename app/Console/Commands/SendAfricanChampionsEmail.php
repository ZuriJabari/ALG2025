<?php

namespace App\Console\Commands;

use App\Mail\AfricanChampionsBreakfastInvite;
use App\Models\SeatReservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAfricanChampionsEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:african-champions {--test : Send test email to first recipient only}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Africa Champions Breakfast invitation emails to all Africa Champions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching Africa Champions...');

        $champions = SeatReservation::where('fellowship', 'Africa Champions Invite')->get();

        if ($champions->isEmpty()) {
            $this->error('No Africa Champions found in the database.');
            return 1;
        }

        $this->info("Found {$champions->count()} Africa Champions");

        if ($this->option('test')) {
            $this->warn('TEST MODE: Sending to first recipient only');
            $champions = $champions->take(1);
        }

        $this->newLine();
        $bar = $this->output->createProgressBar($champions->count());
        $bar->start();

        $sent = 0;
        $failed = 0;

        foreach ($champions as $champion) {
            try {
                Mail::to($champion->email)->send(new AfricanChampionsBreakfastInvite($champion));
                $sent++;
                $this->newLine();
                $this->info("✓ Sent to: {$champion->full_name} ({$champion->email})");
                $bar->advance();
            } catch (\Exception $e) {
                $failed++;
                $this->newLine();
                $this->error("✗ Failed to send to {$champion->email}: " . $e->getMessage());
                $bar->advance();
            }
        }

        $bar->finish();
        $this->newLine(2);

        $this->info('Email sending completed!');
        $this->info("Successfully sent: {$sent}");
        if ($failed > 0) {
            $this->warn("Failed: {$failed}");
        }

        return 0;
    }
}
