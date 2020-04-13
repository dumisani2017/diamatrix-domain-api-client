<?php

namespace Vooyd\DomainApiClient;

use Illuminate\Support\ServiceProvider;

class DomainApiClientServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/domain-api-client.php', 'domain');

        // Register the service the package provides.
        $this->app->singleton('domain-api-client', function ($app) {
            return new DomainApiClient();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['domain-api-client'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/domain-api-client.php' => config_path('domain-api-client.php'),
        ], 'domain-api-client.config');

        // Registering package commands.
        // $this->commands([]);
    }
}
