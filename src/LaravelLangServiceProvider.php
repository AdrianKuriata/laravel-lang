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
     * @todo Później spróbować załadować funkcje globalne na poziomie composer.json
     * @return void
     */
    public function boot()
    {
        require(__DIR__ . '/Helpers/helpers.php');

        // Config
        $this->publishes([
            __DIR__ . '/../config/laravel-lang.php' => config_path('laravel-lang.php')
        ], 'laravel-lang-config');

        // Public Assets
        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/devtemple/laravel-lang')
        ], 'laravel-lang-public');

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
