<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    # command schedule
     
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:dynamic-pricing')->everyMinute();
    }
    

    
    // protected function commands(): void
    // {
    //     $this->load(__DIR__.'/Commands');

    //     require base_path('routes/console.php');
    // }
}