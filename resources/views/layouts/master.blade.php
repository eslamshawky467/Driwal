<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("assets/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.rtl.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/style-ar.css")}}">
</head>
<body>
    <div class="Draiwal_app">
        @yield('header')
        @yield('sidebar')
        @yield('content')
    </div>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
