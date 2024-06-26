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
@if(session()->has('success'))
    <div x-data="{count: 5, interval: null, visible: <?= json_encode(session()->has('success'))?>}"
         x-show="visible"
         @click="visible=false"
         x-transition.opacity.duration.300ms
         x-init="interval = setInterval(() => count--, 1000); $watch('count', value => { if(value <= 0) {clearInterval(interval); visible = false;}})"
         class="fixed cursor-pointer top-8 left-1/2 -translate-x-1/2 bg-emerald-300 text-black py-4 px-12 rounded-full flex justify-center items-center gap-6 z-50">
        <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"
             class="h-8 w-auto">
            <g clip-path="url(#clip0_1032_3438)">
                <path
                    d="M24.5 2.49001C24.5025 2.00627 24.3242 1.53906 24 1.18001C23.7002 1.00683 23.3684 0.896279 23.0246 0.855027C22.6809 0.813776 22.3323 0.842685 22 0.940006C20.7798 1.20916 19.5748 1.54296 18.39 1.94001C17.78 2.12001 17.18 2.33001 16.59 2.56001C15.71 2.89001 14.85 3.27001 13.98 3.65001C12.3791 4.34912 10.8169 5.13357 9.30002 6.00001C7.77809 6.85669 6.34446 7.86157 5.02002 9.00001L1.59002 12.07L0.80002 12.86C0.702561 12.9622 0.618549 13.0765 0.55002 13.2C0.518727 13.2873 0.518727 13.3827 0.55002 13.47C0.57051 13.5798 0.617722 13.6828 0.687486 13.77C0.757249 13.8572 0.847416 13.9259 0.95002 13.97C1.33638 14.1019 1.74177 14.1695 2.15002 14.17C2.59002 14.17 3.37002 14.17 4.04002 14.27C4.37887 14.2598 4.71699 14.3072 5.04002 14.41L5.23002 16.64C5.29002 17.28 5.32002 17.78 5.32002 18.25C5.32002 19 5.22002 20.3 5.22002 21.32C5.22002 21.4102 5.25584 21.4967 5.3196 21.5604C5.38337 21.6242 5.46985 21.66 5.56002 21.66C5.65019 21.66 5.73667 21.6242 5.80044 21.5604C5.8642 21.4967 5.90002 21.4102 5.90002 21.32C5.90002 20.32 6.03002 19 6.04002 18.25C6.04002 17.76 6.04002 17.25 5.97002 16.58C5.90002 15.91 5.90002 15.07 5.82002 14.58C5.74002 14.09 5.73002 13.82 4.48002 13.58C3.74002 13.49 2.72002 13.44 2.17002 13.41L1.62002 13.33L2.20002 12.76L5.65002 9.76001C6.92706 8.65122 8.3143 7.67613 9.79002 6.85001C11.2818 6.04538 12.8138 5.31776 14.38 4.67001C15.23 4.31001 16.09 3.96001 16.95 3.67001C18.7798 2.99245 20.6676 2.48367 22.59 2.15001C23.49 2.54001 23.36 2.88001 23.34 3.15001C23.3027 3.65479 23.2122 4.15423 23.07 4.64001L21.78 9.00001C21.52 9.87001 21.24 10.68 20.95 11.47C20.24 13.38 19.46 15.17 18.74 17.24C18.5713 17.7098 18.3709 18.1675 18.14 18.61C17.77 19.31 17.35 19.98 16.96 20.61C16.85 20.8138 16.7229 21.0078 16.58 21.19L16.48 21.31L16.42 21.22L15.42 19.65C14.9269 18.9735 14.3996 18.3227 13.84 17.7C13.2789 17.072 12.6812 16.4776 12.05 15.92C11.62 15.56 10.41 14.56 10.05 15.28C9.95002 15.41 9.84002 15.66 9.78002 15.73L8.61002 17.43L7.43002 19.52C7.01002 20.25 6.51002 20.94 6.06002 21.67C5.87002 21.99 5.68002 22.32 5.52002 22.67C5.48563 22.7416 5.48106 22.824 5.50731 22.899C5.53355 22.9739 5.58847 23.0355 5.66002 23.07C5.66002 23.07 5.94002 23.3 6.35002 22.99C6.76002 22.68 6.88002 22.6 7.11002 22.42C7.34002 22.24 7.87002 21.87 8.24002 21.61C8.61002 21.35 8.91002 21.16 9.24002 20.93L10.76 19.87C11.56 19.3 12.33 18.71 13.08 18.08L13.25 18.27C13.79 18.9 14.3 19.56 14.74 20.18L15.64 21.72C15.7316 21.8905 15.8352 22.0542 15.95 22.21C16.0072 22.2706 16.0775 22.3174 16.1554 22.3468C16.2334 22.3763 16.317 22.3876 16.4 22.38C16.637 22.341 16.8585 22.2372 17.04 22.08C17.3243 21.8044 17.5698 21.4916 17.77 21.15C18.18 20.52 18.63 19.83 19.02 19.15C19.2886 18.6721 19.5193 18.174 19.71 17.66C20.45 15.6 21.27 13.83 21.99 11.94C22.31 11.12 22.6 10.29 22.87 9.40001L24.17 5.00001C24.4125 4.18616 24.5239 3.33889 24.5 2.49001ZM9.62002 19.27C9.27477 19.493 8.94101 19.7333 8.62002 19.99C8.28002 20.26 7.96002 20.54 7.62002 20.84L6.87002 21.61C7.26002 21.02 7.67002 20.45 8.03002 19.85L9.27002 17.85L10.42 16.2C10.47 16.14 10.62 15.89 10.68 15.79C10.74 15.69 10.88 15.92 10.99 16C11.1 16.08 11.44 16.41 11.57 16.52C11.91 16.83 12.25 17.18 12.57 17.52C11.62 18.15 10.59 18.66 9.62002 19.27Z"
                    fill="black"/>
                <path
                    d="M14.2 9.67001C13.67 10.25 13.2 10.86 12.68 11.49C12.16 12.12 11.56 12.93 11.05 13.69C10.94 13.85 10.84 14.02 10.74 14.18C10.48 14.97 10.85 14.85 11.54 14.26L11.63 14.12C12.19 13.41 12.82 12.74 13.41 12.12C14.36 11.03 15.41 10.03 16.41 9.04001L18.63 6.95001C19.72 5.95001 20.81 4.89001 21.88 3.84001C23.5 1.00001 19.09 5.00001 16.71 7.17001C15.84 8.00001 15 8.79001 14.2 9.67001Z"
                    fill="black"/>
                <path
                    d="M13.8 6.61002C12.41 7.55002 11.07 8.55002 9.73002 9.61002L6.57002 12.18C6.37002 12.36 6.14002 12.55 5.91002 12.74C5.43002 13.34 5.50002 13.56 6.59002 13.08C6.75002 12.97 6.91002 12.86 7.04002 12.75L10.34 10.39L18.56 4.72002C19.37 4.17002 20.15 3.62002 20.96 3.09002C21.15 2.42002 19.73 2.89002 18.56 3.58002L18.03 3.90002C16.61 4.79002 15.18 5.66002 13.8 6.61002Z"
                    fill="black"/>
            </g>
            <defs>
                <clipPath id="clip0_1032_3438">
                    <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
                </clipPath>
            </defs>
        </svg>

        <p class="font-medium uppercase">{{session('success')}}</p>
        <div class="bg-white p-2 rounded-full aspect-square h-8 w-8 flex justify-center items-center font-bold">
            <p x-text="count"></p>
        </div>
    </div>
@endif
