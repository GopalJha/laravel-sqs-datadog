<?php

namespace GopalJha\LaravelSQSDataDog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class LaravelSQSDataDogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Allow config publish
        $this->publishes([
            __DIR__ . '/config/datadog.php' => config_path('datadog.php'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/config/retry.php' => config_path('retry.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('datadog', DataDog::class);
        $this->app->bind('datadogcurl', DataDogCurl::class);
        $this->app->bind('datadogclient', DataDogClient::class);
    }
}
