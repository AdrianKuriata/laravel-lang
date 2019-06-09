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
        $this->mergeConfigFrom(__DIR__.'/config/laravel-lang.php', 'laravel-lang');
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
            __DIR__.'/config/laravel-lang.php' => config_path('laravel-lang.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
}
