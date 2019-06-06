<?php

namespace App\Providers;

use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Engines\FileEngine;
use Illuminate\View\Engines\EngineResolver;

class FileProvider extends Provider
{
    /**
     * {@inheritDoc}
    */
    public function register()
    {
        $this->app->singleton('files', function () {
            return new Filesystem;
        });
    }
}