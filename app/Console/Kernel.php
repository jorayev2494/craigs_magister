<?php

namespace App\Console;

use App\Console\Commands\Base\ICommands;
use Carbon\Carbon;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('websockets:clean')->daily();                            // clear ws statistic everyday
        $schedule->command(ICommands::SEND_TEST_SOCKETS_COMMAND)->everyMinute();    // send ws test command
        $schedule->call(function(): void {
            info('schedule: ', [Carbon::now()->format('Y-m-d H:i:s')]);
        })->everyMinute();
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
