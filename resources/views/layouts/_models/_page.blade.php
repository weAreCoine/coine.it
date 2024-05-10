<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=source-sans-3:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet"/>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    @vite('resources/icons/fontawesome/css/all.css')
</head>
<body class="dark">
@yield('header')
<main class="@yield('mainClasses') bg-white dark:bg-darkBackground-900">
    <div x-data="{visible : true}" x-show="visible" x-transition.opacity.duration.500ms @load.window="visible = false"
         class="fixed flex flex-col justify-center items-center top-0 left-0 h-screen w-screen bg-white dark:bg-darkBackground-900 z-[99]">
        <div class="animate-pulse">
            @include('components.application-logo')

        </div>
    </div>
    @yield('content')
</main>
<footer class="dark:bg-darkBackground-900">
    @include('layouts.parts.colophon')
</footer>
</body>

</html>
