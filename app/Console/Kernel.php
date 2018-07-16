<?php

namespace App\Console;

use App\Console\Commands\Dashboard\Github\Repository;
use App\Console\Commands\Dashboard\Toutiao\News;
use App\Console\Commands\Dashboard\Weibo\Mentions;
use App\Services\Github;
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
        Mentions::class,
        News::class,
        Repository::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('dashboard:weibo-mentions')
                  ->everyMinute();
        $schedule->command('dashboard:toutiao-news')
            ->everyMinute();
        $schedule->command('dashboard:github-repo')
            ->everyFiveMinutes();
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
