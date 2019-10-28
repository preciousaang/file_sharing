<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @section('meta')
        @show
        <title>@yield('title', 'Welcome') | {{env('APP_NAME')}}</title>
        @section('css')
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @show
    </head>
    <body>
    @include('layouts.nav')
    @yield('content')
    @section('js')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @show
    </body>
</html>