<?php

namespace Captenmasin\LaravelXPost;

use Illuminate\Support\ServiceProvider;
use Captenmasin\LaravelXPost\Services\XPostService;

class XPostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Publish the config file
        $this->publishes([
            __DIR__ . '/../config/x-post.php' => config_path('x-post.php'),
        ], 'config');
    }

    /**
     * Register services.
     */
    public function register()
    {
        // Merge package config
        $this->mergeConfigFrom(__DIR__ . '/../config/x-post.php', 'x-post');

        // Bind the XPostService as a singleton
        $this->app->singleton('x-post-service', function ($app) {
            return new XPostService(
                config('x-post.page_id'),
                config('x-post.access_token')
            );
        });
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return ['x-post-service'];
    }
}
