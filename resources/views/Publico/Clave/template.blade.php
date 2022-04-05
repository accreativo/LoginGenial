<!DOCTYPE html>
<html lang="es">
    <head>
        @yield('head')
        <title>@yield('titulo')</title>
    </head>
    <body>
        @yield('header')
        @yield('content')
        <div class="footerLogin">
            @yield('footer')
        </div>

    </body>
</html>
