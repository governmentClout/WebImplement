<?php

namespace App\Providers;

use Illuminate\Events\Dispatcher;

class EventProvider extends Provider
{
    /**
     * {@inheritDoc}
    */
    public function register()
    {
        $this->app->singleton('events', function () {
            return new Dispatcher($this->app);
        });
    }
}