<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\LiquidateUser::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('liquidate:cron')->everyMinute();
         $schedule->command('autopnl:cron')->everyThirtyMinutes();
         $schedule->command('update_assets:cron')->everyFiveMinutes();
         $schedule->command('margin_call:cron')->everyFiveMinutes();
         $schedule->command('database:backup')->everySixHours();
         $schedule->command('update:data-after-midnight')->dailyAt('00:05');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
