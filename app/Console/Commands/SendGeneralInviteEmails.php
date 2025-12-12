<?php

namespace App\Console\Commands;

use App\Mail\GeneralALGInvite;
use App\Models\SeatReservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendGeneralInviteEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:general-invite {--dry-run : Preview emails without sending}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the general ALG 2025 invite email (with programme PDF + individual QR) to a small recipient list';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $recipients = [
            ['full_name' => 'Derek Atwine', 'email' => 'derekatwine6@gmail.com'],
            ['full_name' => 'Maggie Alwedi', 'email' => 'maggiealwedi@gmail.com'],
            ['full_name' => 'Trevor Mugisa', 'email' => 'trevormugisa01@gmail.com'],
        ];

        $dryRun = (bool) $this->option('dry-run');

        $this->info('Preparing to send General ALG invite emails...');
        if ($dryRun) {
            $this->warn('DRY RUN: No emails will be sent.');
        }

        $sent = 0;
        $failed = 0;

        foreach ($recipients as $r) {
            $email = $r['email'];
            $name = $r['full_name'];

            $reservation = SeatReservation::firstOrCreate(
                ['email' => $email],
                [
                    'full_name' => $name,
                    'fellowship' => 'General Invite',
                    'attendance_mode' => 'In-person',
                ]
            );

            // Ensure name is correct if record already existed
            if ($reservation->full_name !== $name) {
                $reservation->full_name = $name;
            }

            // Ensure we have an attendance token for QR generation
            if (empty($reservation->attendance_token)) {
                $token = Str::random(32);
                while (SeatReservation::where('attendance_token', $token)->exists()) {
                    $token = Str::random(32);
                }
                $reservation->attendance_token = $token;
            }

            $reservation->save();

            if ($dryRun) {
                $this->info("[DRY RUN] Would send to: {$name} <{$email}> | token={$reservation->attendance_token}");
                continue;
            }

            try {
                Mail::to($reservation->email)->send(new GeneralALGInvite($reservation));
                $sent++;
                $this->info("✓ Sent to: {$name} <{$email}>");
            } catch (\Throwable $e) {
                $failed++;
                $this->error("✗ Failed to send to {$email}: " . $e->getMessage());
            }
        }

        $this->newLine();
        $this->info("Done. Sent: {$sent}");
        if ($failed > 0) {
            $this->warn("Failed: {$failed}");
        }

        return $failed > 0 ? 1 : 0;
    }
}
