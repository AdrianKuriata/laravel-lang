<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('laravel-lang.middleware')], function () {
    Route::group(['prefix' => config('laravel-lang.route'), 'as' => config('laravel-lang.route') . '.'], function () {
        Route::resource('languages', 'LanguageController');
    });

    Route::resource(config('laravel-lang.route'), 'DashboardController')->only(['index']);
});
