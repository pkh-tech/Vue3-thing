<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\RouteListCommand::class,
    ];

    protected $middleware = [
        \App\Http\Middleware\CorsMiddleware::class,
    ];
    
    protected function schedule(Schedule $schedule)
    {
        //
    }
}
