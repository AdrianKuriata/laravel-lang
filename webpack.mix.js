// @todo Dodać na koncu purseCss

const mix = require('laravel-mix');

mix.js('resources/js/laravel-lang.js', 'public/js')
    .sass('resources/sass/laravel-lang.scss', 'public/css', {
        includePaths: ['node_modules']
    });