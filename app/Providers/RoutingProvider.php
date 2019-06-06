<?php

namespace App\Providers;

use Illuminate\Routing\Router;

class RoutingProvider extends Provider
{
    /**
     * {@inheritDoc}
    */
    public function register()
    {
        $this->app->singleton('router', function () {
            $router = new Router($this->app['events'], $this->app);

            $router->group([], function ($router) {
                $app = $this->app;

                require ROUTE_PATH.'/web.php';
            });

            return $router;
        });
    }
}