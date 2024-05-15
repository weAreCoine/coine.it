<?php
$light = $light ?? false;
?>
<header class="fixed top-0 left-0 w-full z-50">
    @if(($isLandingPage ?? false) === true)
        <div class="container py-8 flex justify-between lg:grid lg:grid-cols-3 gap-8 items-center">
            <navigation @class(['text-white' => !$light, 'inline-block'])>
                <ul class="inline-flex gap-x-16 items-center">
                    <li @class(['current' => request()->routeIs('new-project'), 'bg-white/5 grow-0 backdrop-blur rounded-full px-6 py-4'])>
                        <a
                            @class(['back-button', 'inverse' => !$light]) href="{{route('home')}}"><span
                                class="hidden sm:inline">{{__('Indietro')}}</span></a>
                    </li>
                </ul>
            </navigation>
            <div class="flex justify-center items-center">
                <div class="bg-white/5 backdrop-blur rounded-full sm:px-12 sm:pt-3 sm:pb-4 px-5 py-4 duration-500">
                    @include('components.application-logo', ['forceLightColor' => !$light])
                </div>
            </div>
        </div>
    @else
        <div class="container py-8 flex justify-between gap-8 items-center">
            <div class="bg-white/5 backdrop-blur rounded-full sm:px-12 sm:pt-3 sm:pb-4 px-5 py-4 duration-500">
                @include('components.application-logo', ['forceLightColor' => !$light])
            </div>
            <div class="bg-white/5 backdrop-blur rounded-full px-6 py-4 hidden lg:block">
                <navigation @class([
            'text-white' => !$light,
            ])>
                    <ul class="flex gap-x-16 items-center">
                        {{--                        <li @class(['current' => request()->routeIs('home')]) >--}}
                        {{--                            <a href="{{route('home')}}">--}}
                        {{--                                <x-home-icon class="fill-white hover:fill-accent duration-500 h-8 w-auto"/>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                        @if(auth()->user() !== null)
                            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        @endif
                        @unless(request()->routeIs('new-project'))
                            <li @class(['current' => request()->routeIs('new-project')])><a
                                    @class(['btn-primary whitespace-nowrap', 'inverse' => !$light]) href="{{route('new-project')}}">{{__('Inizia da qui')}}</a>
                            </li>
                        @endunless
                    </ul>
                </navigation>
            </div>
        </div>
    @endif
</header>
