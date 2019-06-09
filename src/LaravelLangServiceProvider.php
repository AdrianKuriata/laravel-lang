<?php

namespace Devtemple\LaravelLang;

use Illuminate\Support\ServiceProvider;

class LaravelLangServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-lang.php', 'laravel-lang');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            // Config
            __DIR__ . '/../config/laravel-lang.php' => config_path('laravel-lang.php'),
        ], 'laravel-lang');

        // Routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->setPropertyNamespaceForRoutes();

        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-lang');
    }

    private function setPropertyNamespaceForRoutes()
    {
        $this->app->router->group(
            ['namespace' => 'Devtemple\LaravelLang\Http\Controllers'],
            function () {
                require __DIR__ . '/../routes/web.php';
            }
        );
    }
}
