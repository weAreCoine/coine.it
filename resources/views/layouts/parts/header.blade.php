<?php
    $light = $light ?? false;
?>
<header @class([
    'sticky top-0 backdrop-blur-sm z-50',
    'bg-sky-900 dark:bg-slate-800' => !$light,
    'bg-white/90  dark:bg-slate-900/90' => $light,
])>
    @if($isLandingPage ?? false === true)
        <div class="container py-8 grid grid-cols-3 gap-8 items-center">
            <navigation @class([
            'text-white' => !$light,
            ])>
                <ul class="flex gap-x-16 items-center">
                    <li @class(['current' => request()->routeIs('new-project')])><a @class(['back-button', 'inverse' => !$light]) href="{{route('home')}}"><span class="hidden sm:inline">{{__('Back to Home')}}</span></a></li>
                </ul>
            </navigation>
            <div class="flex justify-center items-center">
                @include('components.application-logo', ['forceLightColor' => !$light])
            </div>
        </div>
    @else
        <div class="container py-8 flex justify-between gap-8 items-baseline">
            @include('components.application-logo', ['forceLightColor' => !$light])
            <navigation @class([
            'text-white' => !$light,
            ])>
                <ul class="flex gap-x-16 items-center">
                    <li @class(['current' => request()->routeIs('home')])><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('home')}}">About</a></li>
                    <li><a href="{{route('home')}}">Works</a></li>
                    <li><a href="{{route('home')}}">Blog</a></li>
                    <li @class(['current' => request()->routeIs('new-project')])><a @class(['btn-primary', 'inverse' => !$light]) href="{{route('new-project')}}">Start a Project</a></li>
                </ul>
            </navigation>
        </div>
    @endif
</header>
