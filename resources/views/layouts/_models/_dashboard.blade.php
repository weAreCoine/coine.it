<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=source-sans-3:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"/>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 dark:bg-slate-900 flex justify-between">
{{--<div class=" bg-slate-50 dark:bg-white/10 h-screen fixed top-0 left-0 w-1/5">--}}
<div class="bg-slate-100 dark:bg-slate-900 min-w-[350px] h-screen">
    @yield('navigation')
</div>
<main class="@yield('mainClasses') grow">
    {{--<main class="@yield('mainClasses') ml-[20%]">--}}
    <div x-data="{visible : true}" x-show="visible" x-transition.opacity.duration.500ms @load.window="visible = false"
         class="fixed flex flex-col justify-center items-center top-0 left-0 h-screen w-screen bg-white dark:bg-slate-900 z-[99]">
        <div class="animate-pulse">
            @include('components.application-logo')
        </div>
    </div>

    <div class="bg-white dark:bg-white/5 px-8 mx-6 mt-6 py-6 rounded-xl">
        @yield('content')
    </div>
</main>
<footer class="dark:bg-slate-900">
    <script src="https://kit.fontawesome.com/66831c7c40.js" async></script>
</footer>
</body>

</html>
