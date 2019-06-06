<?php

use Illuminate\Contracts\View\Factory;

$router->get('/', function (Factory $viewFactory) {
    return $viewFactory->make('index');
});

$router->fallback(function (Factory $viewFactory) {
    return $viewFactory->make('404');
});