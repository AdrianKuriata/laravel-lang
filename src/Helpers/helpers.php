<?php

if (!function_exists('package_asset')) {
    function package_asset($path) {
        return asset(sprintf('vendor/devtemple/laravel-lang/%s', $path));
    }
}