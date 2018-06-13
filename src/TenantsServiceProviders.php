<?php namespace Nano7\Tenants;

use Nano7\Foundation\Support\ServiceProvider;

class TenantsServiceProviders extends ServiceProvider
{
    /**
     * Register objetos base.
     */
    public function register()
    {
        $this->app->singleton('tenants', function ($app) {
            return new Tenant($app);
        });
    }
}