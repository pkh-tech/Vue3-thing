<?php

/**
 * Register The Auto Loader
 *
 * Composer provides a convenient, automatically generated class loader for
 * this application. We just need to require it into the script.
 */

require __DIR__.'/../vendor/autoload.php';

/**
 * Turn On The Lights
 *
 * This bootstraps the framework. The default location for this file is
 * in the `bootstrap/app.php` file, but you can use this file if you want
 * to manually load a different bootstrap file for your application.
 */

$app = require_once __DIR__.'/../bootstrap/app.php';

/**
 * Run The Application
 *
 * After we get the application, we can handle the incoming request
 * and send the associated response back to the client's browser.
 */

$app->run();
