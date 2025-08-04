<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        $this->mapApiRoutes($router);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define the "api" routes for the application.
     *
     * @param Router $router
     * @return void
     */
    protected function mapApiRoutes(Router $router)
    {
        $router->group(['prefix' => 'api', 'namespace' => 'App\Http\Controllers'], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
