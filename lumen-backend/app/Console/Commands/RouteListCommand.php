<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Lumen\Application;

class RouteListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all registered routes';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $app = app();
        $routes = $app->router->getRoutes();

        $headers = ['Method', 'URI', 'Action'];

        $rows = [];

        foreach ($routes as $route) {
            $rows[] = [
                $route['method'],
                $route['uri'],
                isset($route['action']['uses']) ? $route['action']['uses'] : 'Closure',
            ];
        }

        $this->table($headers, $rows);
    }
}
