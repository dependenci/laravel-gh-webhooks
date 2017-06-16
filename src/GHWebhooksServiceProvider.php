<?php

namespace DependenCI\GHWebhooks;

use Illuminate\Support\ServiceProvider;

class GHWebhooksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/ghwebhooks.php' => config_path('ghwebhooks.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ghwebhooks.php', 'ghwebhooks');

        $this->app->make('DependenCI\GHWebhooks\GHWebhooks');

        $this->app->bind('ghwebhooks', function($app) {
            return new GHWebhooks();
        });
    }
}
