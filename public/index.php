<?php

// Setup composer autoloader
require __DIR__.'/../vendor/autoload.php';

// Define constants
defined('PROJECT_PATH') or define('PROJECT_PATH', dirname(__DIR__));
defined('APP_PATH') or define('APP_PATH', PROJECT_PATH.'/app');
defined('ROUTE_PATH') or define('ROUTE_PATH', PROJECT_PATH.'/routes');
defined('VIEW_PATH') or define('VIEW_PATH', PROJECT_PATH.'/views');

// Obtain an instance of laravel application container
$app = new Illuminate\Container\Container;

// Register our components
$providers = require APP_PATH.'/Providers/providers.php';

foreach ($providers as $provider) {
    (new $provider($app))->register();
}


// Capture the request
$request = \Illuminate\Http\Request::capture();

$response = $app->make('router')->dispatch($request);

$response->send();