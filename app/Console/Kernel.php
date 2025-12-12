<?php

namespace App\Console;

use App\Console\Commands\GenerateAttendanceTokens;
use App\Console\Commands\ImportAfricanChampions;
use App\Console\Commands\SendAfricanChampionsEmail;
use App\Console\Commands\SendGeneralInviteEmails;
use App\Console\Commands\SendPanelistJoinLinks;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array<int, class-string>
     */
    protected $commands = [
        GenerateAttendanceTokens::class,
        ImportAfricanChampions::class,
        SendAfricanChampionsEmail::class,
        SendGeneralInviteEmails::class,
        SendPanelistJoinLinks::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Define scheduled tasks here if needed.
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
