<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @routes
    <script>
        function fullRoute(route) {
            return `{{config('laravel-lang.route')}}.${route}`
        }
    </script>
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

    <div class="container">
        @foreach (['success', 'warning', 'primary', 'secondary', 'info', 'danger'] as $type)
            @if(session()->has($type))
                <alert-component type="{{$type}}" message="{{session()->get($type)}}"></alert-component>
                {{session()->forget($type)}}
            @endif
        @endforeach

        @yield('content')
    </div>

    @stack('bottom')

    <div class="p-3 text-center border-top shadow-sm mt-3">
        Made with <i class="fa fa-heart text-danger"></i> by Devtemple
    </div>
</div>

<!-- Scripts -->
<script src="{{package_asset('js/laravel-lang.js')}}"></script>
@stack('js')
</body>
</html>
