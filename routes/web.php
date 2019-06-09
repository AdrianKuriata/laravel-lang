<?php

use Illuminate\Support\Facades\Route;

Route::resource(config('laravel-lang.route'), 'DashboardController');