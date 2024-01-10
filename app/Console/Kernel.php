<?php

namespace App\Console;

use App\Jobs\SendEmailNotifications;
use App\Jobs\UpdateVaccinationStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new SendEmailNotifications)
                        ->dailyAt('21:00')
                        ->days([
                            Schedule::SUNDAY, Schedule::MONDAY, Schedule::TUESDAY,
                            Schedule::WEDNESDAY, Schedule::THURSDAY
                        ]);

        $schedule->job(new UpdateVaccinationStatus)->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
