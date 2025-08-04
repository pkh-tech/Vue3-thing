<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Hash; 

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();
$app->withEloquent();

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);


// Register Config Files
$app->configure('app');
$app->configure('auth');
$app->configure('jwt');

// Register Middleware
$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'cors' => App\Http\Middleware\CorsMiddleware::class
]);

$app->middleware([
    App\Http\Middleware\CorsMiddleware::class,
]);



// Register Providers
$app->configure('cors');
$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(Illuminate\Hashing\HashServiceProvider::class);
$app->register(App\Providers\RouteServiceProvider::class);

//Register Mail
$app->configure('mail');
$app->register(Illuminate\Mail\MailServiceProvider::class);



// Load Routes
$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/web.php';
});

$app->router->group([
    'prefix' => 'api',
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/api.php';
});


return $app;
