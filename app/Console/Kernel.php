<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(\Illuminate\Console\Scheduling\Schedule $schedule)
{
    $schedule->command('wolt:tokenrefresh')
        ->dailyAt('03:00')   // каждый день в 3 ночи
        ->withoutOverlapping()
        ->runInBackground();
    
        $schedule->command('wolt:stock')
        ->hourly()
        ->between('6:55', '23:59')
        ->runInBackground();
        $schedule->command('wolt:price')
        ->hourly()
        ->between('6:45', '23:50')
        ->runInBackground();
    
        $schedule->command('cleanupApiLogs')
        ->hourly()
        ->runInBackground();
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
