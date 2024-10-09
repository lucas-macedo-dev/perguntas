<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@1,900&family=Tilt+Warp&display=swap"
            rel="stylesheet">
        <title> @yield('title')</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @yield('scripts_extra')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        @if (request()->segment(2))
            <a href="/" class="sr-only focus:not-sr-only m-3">&LeftArrow; back to menu</a>
        @endif
        @yield('content')
    </body>
</html>
