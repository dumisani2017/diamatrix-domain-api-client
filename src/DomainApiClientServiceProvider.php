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
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'vooyd');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'vooyd');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
        $this->mergeConfigFrom(__DIR__.'/../config/diamatrix-domain-api-client.php', 'diamatrix-domain-api-client');

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
            __DIR__.'/../config/diamatrix-domain-api-client.php' => config_path('diamatrix-domain-api-client.php'),
        ], 'diamatrix-domain-api-client.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/vooyd'),
        ], 'diamatrix-domain-api-client.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/vooyd'),
        ], 'diamatrix-domain-api-client.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/vooyd'),
        ], 'diamatrix-domain-api-client.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
