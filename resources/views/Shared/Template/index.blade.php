<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('style_libraries')
    @include('Shared.Libraries.bootstrap-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logos/favicon.png') }}" type="image/png">
	<title>@yield('titulo')</title>
</head>
<body>
    <div class="preload">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
            <div class="mensaje-preload">
                <span class="text-light">Un momento...</span>
            </div>
        </div>
    </div>
    <div id="bg1" class="bg-layer"></div>
    <div id="bg2" class="bg-layer bg-top"></div>
    @yield('header')
    @yield('content')
    @yield('footer')
</body>
</html>
