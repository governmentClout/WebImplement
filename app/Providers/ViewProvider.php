<?php

namespace App\Providers;

use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Engines\FileEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\Contracts\View\Factory as FactoryContract;

class ViewProvider extends Provider
{
    /**
     * {@inheritDoc}
    */
    public function register()
    {
        $this->app->singleton(Factory::class, function () {
            $resolver = new EngineResolver;

            $resolver->register('file', function () {
                return new FileEngine;
            });

            $viewFinder = new FileViewFinder(
                $this->app['files'], [ VIEW_PATH ], ['html']
            );

            return new Factory($resolver, $viewFinder, $this->app['events']);
        });
        
        // Bind the view contract in the container.
        // This allows the container to inject dependencies of 
        // this type and resolve the view factory implementation.
        $this->app->bind(FactoryContract::class, Factory::class);
    }
}