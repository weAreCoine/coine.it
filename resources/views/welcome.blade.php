@extends('layouts.home')


@section('content')
    <section class="bg-sky-900 dark:bg-slate-800 pt-12 pb-24 text-white" aria-labelledby="page-title">
        <div class="container">
            <h1 id="page-title" class="text-8xl font-semibold w-5/6">{{__('We craft holistic, people friendly digital experiences')}}</h1>
            <p class="text-4xl w-7/12 mt-12">{{__('BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.')}}</p>
        </div>
        <div class="container flex gap-8 items-center mt-24">
            <div class="min-w-[26%] bg-sky-800/30 dark:bg-gradient-to-b dark:to-darkBox dark:from-slate-800 p-9 rounded-2xl">
                <i class="fa-solid fa-compass-drafting text-5xl"></i>
                <h2 class="text-6xl font-semibold mt-9">{{__('Feature')}}</h2>
                <p class="text-2xl mt-2">BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS.</p>
            </div>
            <div class="min-w-[26%] bg-sky-800/30 dark:bg-gradient-to-b dark:to-darkBox dark:from-slate-800 p-9 rounded-2xl">
                <i class="fa-solid fa-compass-drafting text-5xl"></i>
                <h2 class="text-6xl font-semibold mt-9">{{__('Feature')}}</h2>
                <p class="text-2xl mt-2">BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS.</p>
            </div>
            <div class="min-w-[26%] bg-sky-800/30 dark:bg-gradient-to-b dark:to-darkBox dark:from-slate-800 p-9 rounded-2xl">
                <i class="fa-solid fa-compass-drafting text-5xl"></i>
                <h2 class="text-6xl font-semibold mt-9">{{__('Feature')}}</h2>
                <p class="text-2xl mt-2">BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS.</p>
            </div>
            <div class="min-w-[26%] bg-sky-800/30 dark:bg-gradient-to-b dark:to-darkBox dark:from-slate-800 p-9 rounded-2xl">
                <i class="fa-solid fa-compass-drafting text-5xl"></i>
                <h2 class="text-6xl font-semibold mt-9">{{__('Feature')}}</h2>
                <p class="text-2xl mt-2">BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS.</p>
            </div>
        </div>
    </section>
    <section class="bg-sky-50 dark:bg-gradient-to-b dark:from-slate-800 dark:to-slate-900 rounded-br-[4rem] rounded-bl-[4rem]" aria-labelledby="section-1">
        <div class="py-32 container mx-auto">
            <div class="w-3/4 mx-auto">
                <p class="uppercase mb-4 text-orange-500 tracking-widest font-medium text-2xl">Our services</p>
                <h2 id="section-1" class="text-7xl font-semibold">We craft holistic, people friendly digital experiences</h2>
                <p class="text-4xl mt-12">Our clients are companies, brands, and startups that keep the world going around.</p>
                <p class="text-4xl mt-6">They treat diseases, move parcels, insure cars, process payments, create jobs, rent homes and publish news. They are vast and complex businesses requiring design experiences that are just
                    as
                    people-friendly as they are,
                    robust and scalable.</p>
                <p class="text-4xl mt-6">They are vast and complex businesses requiring design experiences that are just as people-friendly as they are, robust and scalable.</p>
                <p class="text-4xl mt-6">They are vast and complex businesses requiring design experiences that are just as people-friendly as they are, robust and scalable.</p>
            </div>
        </div>
    </section>
    <section class="container my-32" aria-labelledby="section-2">
        <p class="uppercase mb-4 text-orange-500 tracking-widest font-medium text-2xl">Our services</p>
        <h2 id="section-2" class="text-7xl font-semibold w-3/5">It’s not about limitations, but this is something about what we focus on.</h2>
        <div class="grid grid-cols-3 gap-8 mt-16 dark:text-slate-900 dark:text-white">
            <div class="bg-violet-100 dark:bg-[#576CB7] p-20 rounded-2xl">
                <i class="fa-solid fa-compass-drafting text-5xl"></i>
                <h2 class="text-3xl font-semibold mt-12">{{__('Feature')}}</h2>
                <p class="text-2xl mt-8">The essential ability to combine empathy, creativity and rationality to meet user needs and business success.</p>
                <ul class="list-square text-2xl mt-6 pl-5 font-medium">
                    <li>Visual branding</li>
                    <li class="mt-2">Brand Strategy</li>
                    <li class="mt-2">Identity developement</li>
                    <li class="mt-2">Digital and print collateral</li>
                    <li class="mt-2">Brand guidelines</li>
                    <li class="mt-2">Mockup design</li>
                </ul>
            </div>
            <div class="bg-yellow-50 dark:bg-[#D14C07] p-20 rounded-2xl">
                <i class="fa-solid fa-compass-drafting text-5xl"></i>
                <h2 class="text-3xl font-semibold mt-12">{{__('Feature')}}</h2>
                <p class="text-2xl mt-8">The essential ability to combine empathy, creativity and rationality to meet user needs and business success.</p>
                <ul class="list-square text-2xl mt-6 pl-5 font-medium">
                    <li>Visual branding</li>
                    <li class="mt-2">Brand Strategy</li>
                    <li class="mt-2">Identity developement</li>
                    <li class="mt-2">Digital and print collateral</li>
                    <li class="mt-2">Brand guidelines</li>
                    <li class="mt-2">Mockup design</li>
                </ul>
            </div>
            <div class="bg-rose-50 p-20 dark:bg-[#16A34A] rounded-2xl">
                <i class="fa-solid fa-compass-drafting text-5xl"></i>
                <h2 class="text-3xl font-semibold mt-12">{{__('Feature')}}</h2>
                <p class="text-2xl mt-8">The essential ability to combine empathy, creativity and rationality to meet user needs and business success.</p>
                <ul class="list-square text-2xl mt-6 pl-5 font-medium">
                    <li>Visual branding</li>
                    <li class="mt-2">Brand Strategy</li>
                    <li class="mt-2">Identity developement</li>
                    <li class="mt-2">Digital and print collateral</li>
                    <li class="mt-2">Brand guidelines</li>
                    <li class="mt-2">Mockup design</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="container my-32" aria-labelledby="section-3">
        <p class="uppercase mb-4 text-orange-500 tracking-widest font-medium text-2xl">Our services</p>
        <h2 id="section-3" class="text-7xl font-semibold w-3/4">It’s not about limitations, but this is something about what we focus on.</h2>
        <div class="grid grid-cols-4 gap-x-8 gap-y-28 mt-16">
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
            <div>
                <img src="{{asset('images/clients/anastasis.png')}}" alt="Anastasis Logo" class="h-24 w-auto saturate-0 hover:saturate-100 duration-300">
                <p class="mt-12 text-2xl">We have a 5+ years ongoing partnership with Progressive to help build a quote management system for agents and homeowners.</p>
            </div>
        </div>
    </section>
    <section class="bg-sky-900 dark:bg-gradient-to-b dark:from-slate-900 dark:to-slate-800 py-32 text-white" aria-labelledby="section-4">
        <div class="container">
            <h2 id="section-4" class="text-center text-8xl font-semibold w-5/6 mx-auto">We translate research into solutions, crafting thoughtful and unified brands, apps, websites, interfaces, and systems.</h2>
            <div class="grid grid-cols-2 gap-8 mt-24">
                <p class="text-4xl">BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>
                <p class="text-4xl">BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>
            </div>
            <div class="grid grid-cols-3 grid-rows-6 gap-8 h-[50rem] mt-24">
                <div class="row-span-4 rounded-2xl overflow-hidden">
                    <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                </div>
                <div class="col-span-2 row-span-6 rounded-2xl overflow-hidden">
                    <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                </div>
                <div class="rounded-2xl overflow-hidden row-span-2">
                    <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                </div>
            </div>

        </div>
    </section>
    <section class="py-32  dark:bg-gradient-to-b dark:from-slate-800 dark:to-slate-900" aria-labelledby="section-5">
        <div class="container">
            <p class="uppercase mb-4 text-orange-500 tracking-widest font-medium text-2xl">Latest articles</p>
            <h2 id="section-5" class="text-7xl font-semibold w-3/4">It’s not about limitations, but this is something about what we focus on.</h2>
            <div class="mt-24 flex gap-8 items-center">
                <article class="min-w-[30%] w-[30%]">
                    <p class="uppercase tracking-widest text-orange-500 text-sm ">Marzo 2022</p>
                    <h2 class="text-3xl font-semibold my-6">Come creare le direttive di Blade</h2>
                    <p>BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>
                    <p class="uppercase tracking-widest text-orange-500 text-sm mt-6">Category</p>
                    <p class="text-xl font-semibold">Web Developement</p>
                    <div class="aspect-square overflow-hidden rounded-2xl mt-6">
                        <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                    </div>
                </article>
                <article class="min-w-[30%] w-[30%]">
                    <p class="uppercase tracking-widest text-orange-500 text-sm ">Marzo 2022</p>
                    <h2 class="text-3xl font-semibold my-6">Come creare le direttive di Blade</h2>
                    <p>BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>
                    <p class="uppercase tracking-widest text-orange-500 text-sm mt-6">Category</p>
                    <p class="text-xl font-semibold">Web Developement</p>
                    <div class="aspect-square overflow-hidden rounded-2xl mt-6">
                        <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                    </div>
                </article>
                <article class="min-w-[30%] w-[30%]">
                    <p class="uppercase tracking-widest text-orange-500 text-sm ">Marzo 2022</p>
                    <h2 class="text-3xl font-semibold my-6">Come creare le direttive di Blade</h2>
                    <p>BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>
                    <p class="uppercase tracking-widest text-orange-500 text-sm mt-6">Category</p>
                    <p class="text-xl font-semibold">Web Developement</p>
                    <div class="aspect-square overflow-hidden rounded-2xl mt-6">
                        <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                    </div>
                </article>
                <article class="min-w-[30%] w-[30%]">
                    <p class="uppercase tracking-widest text-orange-500 text-sm ">Marzo 2022</p>
                    <h2 class="text-3xl font-semibold my-6">Come creare le direttive di Blade</h2>
                    <p>BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>
                    <p class="uppercase tracking-widest text-orange-500 text-sm mt-6">Category</p>
                    <p class="text-xl font-semibold">Web Developement</p>
                    <div class="aspect-square overflow-hidden rounded-2xl mt-6">
                        <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                    </div>
                </article>
                <article class="min-w-[30%] w-[30%]">
                    <p class="uppercase tracking-widest text-orange-500 text-sm ">Marzo 2022</p>
                    <h2 class="text-3xl font-semibold my-6">Come creare le direttive di Blade</h2>
                    <p>BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>
                    <p class="uppercase tracking-widest text-orange-500 text-sm mt-6">Category</p>
                    <p class="text-xl font-semibold">Web Developement</p>
                    <div class="aspect-square overflow-hidden rounded-2xl mt-6">
                        <img src="{{asset('images/home/desktop.jpg')}}" alt="My desktop" class="object-cover w-full h-auto">
                    </div>
                </article>
                <div class="min-w-[30%] w-[30%] text-center">
                    <a class="btn-primary whitespace-nowrap text-2xl font-semibold" href="{{route('home')}}">See more</a>
                </div>
            </div>
        </div>
    </section>
    <section class="container pb-32" aria-labelledby="section-6">
        <div class="bg-sky-900 dark:bg-slate-800/40 py-16 mt-32 rounded-2xl text-white">
            <h2 id="section-6" class="text-7xl font-semibold w-3/5 text-center mx-auto mb-16">Don’t be surprised at how stunning your project is once you have decided</h2>
            <p class="text-center"><a class="btn-primary inverse text-2xl" href="{{route('home')}}">Start a Project</a></p>
        </div>
    </section>
@endsection
