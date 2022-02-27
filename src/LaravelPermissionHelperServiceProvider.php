<?php

namespace JordenPowleyWebDev\LaravelPermissionHelper;

use Illuminate\Support\ServiceProvider;
use JordenPowleyWebDev\LaravelPermissionHelper\View\Components\Permissions;

class LaravelPermissionHelperServiceProvider extends ServiceProvider
{
    /**
     * LaravelPermissionHelperServiceProvider::register()
     */
    public function register()
    {
        // Merge in the package config
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-permission-helper.php', 'laravel-permission-helper');
    }

    /**
     * LaravelPermissionHelperServiceProvider::boot()
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            // Make Config Files Available To The App
            $this->publishes([
                __DIR__.'/../config/laravel-permission-helper.php' => config_path('laravel-permission-helper.php'),
            ], 'config');

            // Make Enum Files Available To The App
            $this->publishes([
                __DIR__.'/../src/Enums' => base_path('resources/vendor/laravel-permission-helper/Enums|'),
            ], 'views');

            // Make Blade Files Available To The App
            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/vendor/laravel-permission-helper/views'),
            ], 'views');
        }

        // Load in View Components
        $this->loadViewComponentsAs(config('laravel-permission-helper.views-namespace'), [
            'permissions' => Permissions::class,
        ]);

        // Register the views for the package
        $viewsNamespace = config('laravel-permission-helper.views-namespace');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $viewsNamespace);
    }
}