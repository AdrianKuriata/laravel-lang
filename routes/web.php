<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web'] + config('laravel-lang.middleware')], function () {
    Route::resource(config('laravel-lang.route'), 'DashboardController');
});