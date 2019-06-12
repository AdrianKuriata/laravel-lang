<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Lang</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.9.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{package_asset('css/laravel-lang.css')}}" />
    @stack('css')
</head>
<body>
<div id="app">
    @include('laravel-lang::layouts.partials.header')

    <div class="container content">
        @yield('content')
    </div>

    @stack('bottom')
</div>

<!-- Scripts -->
<script src="{{package_asset('js/laravel-lang.js')}}"></script>
@stack('js')
</body>
</html>
