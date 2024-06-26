<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IAM</title>
        <link rel="icon" type="image/png" href="{{ asset('images/site_icon.png') }}"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/js/app.js', 'resources/style/sass/app.scss'])
    </head>
    <body id="app">
        <app-layout>
            @yield('content')
        </app-layout>
    </body>
</html>
