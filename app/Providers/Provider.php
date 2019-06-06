<?php

namespace App\Providers;

use Illuminate\Container\Container;

abstract class Provider
{
    /**
     * Laravel's container instance.
     * 
     * @var \Illuminate\Container\Container
    */
    protected $app;

    /**
     * Create a new provider instance.
     * 
     * @param  \Illuminate\Container\Container  $app
    */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Register provider services.
     * 
     * @return void
    */
    abstract public function register();
}