<div class="container pt-24">
    @include('components.application-logo', ['height' => 'h-12'])
</div>
<div id="colophon" class="grid  grid-cols-6 lg:grid-cols-12 gap-8 container items-start my-12">
    <div class="col-span-6">
        <p class="text-2xl">Con oltre 10 anni di esperienza, Coiné è il tuo partner ideale per crescere in modo
            sostenibile affrontando le sfide del mondo digitale. </p>

        <p class="text-xl mt-8 flex items-center gap-4">
            <x-navigation-icon class="fill-black dark:fill-white"/>
            <a
                href="https://goo.gl/maps/XQHr1kkVvZZWXhiE8" rel="nofollow" target="_blank"
                title="{{__('Get directions')}}">via
                San
                Martino
                Carano 50/A, 41037 Mirandola (MO)</a></p>
        <p class="text-xl mt-4 flex items-center gap-4">
            <x-call-me-icon class="fill-black dark:fill-white"/>
            <a
                href="tel:00393454476837">+39 345 447 6837</a></p>
        <p class="text-xl mt-4 flex items-center gap-4 ">
            <x-mail-icon class="fill-black dark:fill-white"/>
            <a
                href="mailto:ciao@coine.it">ciao@coine.it</a></p>
    </div>
    {{--    <div class="col-span-2">--}}
    {{--        <h2 class="text-accent uppercase tracking-widest mb-8 font-semibold">NAVIGATION</h2>--}}
    {{--        <ul>--}}
    {{--            <li class="mb-2"><a href="{{route('home')}}" class="font-medium text-lg">Home</a></li>--}}
    {{--            <li class="mb-2"><a href="{{route('home')}}" class="font-medium text-lg">About us</a></li>--}}
    {{--            <li class="mb-2"><a href="{{route('home')}}" class="font-medium text-lg">Contacts</a></li>--}}
    {{--            <li><a href="{{route('home')}}" class="font-medium text-lg">Blog</a></li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}
    {{--    <div class="col-span-2">--}}
    {{--        <h2 class="text-accent uppercase tracking-widest mb-8 font-semibold">Utilities</h2>--}}
    {{--        <ul>--}}
    {{--            <li class="mb-2"><a href="{{route('home')}}" class="font-medium text-lg">Privacy policy</a></li>--}}
    {{--            <li class="mb-2"><a href="{{route('home')}}" class="font-medium text-lg">Cookies Policy</a></li>--}}
    {{--            <li class="mb-2"><a href="{{route('home')}}" class="font-medium text-lg">GDPR Settings</a></li>--}}
    {{--            <li><a href="{{route('home')}}" class="font-medium text-lg">Blog</a></li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}
    {{--    <div class="col-span-2">--}}
    {{--        <h2 class="text-accent uppercase tracking-widest mb-8 font-semibold">Links</h2>--}}
    {{--        <ul>--}}
    {{--            <li class="mb-2 flex items-center gap-4"><i class="min-w-[1.5rem] fa-brands fa-github"></i><a--}}
    {{--                    href="{{route('home')}}" class="font-medium text-lg"><span>GitHub</span></a></li>--}}
    {{--            <li class="mb-2 flex items-center gap-4"><i class="min-w-[1.5rem] fa-brands fa-youtube"></i><a--}}
    {{--                    href="{{route('home')}}" class="font-medium text-lg"><span>YouTube</span></a></li>--}}
    {{--            <li class="mb-2 flex items-center gap-4"><i class="min-w-[1.5rem] fa-brands fa-dribbble"></i><a--}}
    {{--                    href="{{route('home')}}" class="font-medium text-lg"><span>Dribbble</span></a></li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}
</div>
<div class="pb-24 container">
    <p class="text-xs text-center text-darkBackground-800 dark:text-darkBackground-500">&#169; 2014-{{date('Y')}}
        coine.it - {{__('Tutti i diritti riservati')}} | {{__('P.IVA')}}: IT03615310368</p>
</div>
