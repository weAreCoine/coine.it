@extends('layouts.home')


@section('content')
    <x-welcome.above-the-fold/>
    <section
        id="method"
        class="from-slate-1 00 to-white bg-gradient-to-b dark:from-slate-800 dark:to-slate-900"
        aria-labelledby="section-1">
        <div class="py-32 container mx-auto">
            <div class="max-w-[75%] mx-auto">
                <p class="uppercase mb-4 text-orange-500 tracking-widest font-medium text-2l">{{__('Il metodo di lavoro')}}</p>
                <h2 id="section-1" class="text-7xl font-semibold">{{__('Strategie basate su dati concreti')}}</h2>
                <div class="leading-loose">
                    <p class="text-4xl mt-12">{{__('Basiamo ogni strategia su dati solidi e verificabili per garantirti decisioni precise fin dal primo giorno.')}}</p>
                    <p class="text-4xl mt-6">{{__('Se stai iniziando la tua avventura, ti aiuteremo a monitorare i dati cruciali per ottimizzare ogni tua mossa e misurare l\'impatto delle tue azioni.')}}</p>
                    <p class="text-4xl mt-6">{{__('Collabora con noi e avrai a tua disposizione un team selezionato di professionisti freelance, ciascuno con oltre un decennio di esperienza nel proprio campo.')}}</p>
                    <p class="text-4xl mt-6">{{__('Condividi con noi il tuo progetto: personalizzeremo il team e la strategia in base al tuo budget per aiutarti a raggiungere i tuoi obiettivi di crescita in modo efficiente.')}}</p>

                </div>
            </div>
        </div>
    </section>
    <x-welcome.services-sections/>
    <section class="bg-sky-900 dark:bg-gradient-to-b dark:from-slate-900 dark:to-slate-800 py-32 text-white"
             aria-labelledby="section-4">
        <div class="container">
            <h2 id="section-4"
                class="text-center text-8xl font-semibold w-5/6 mx-auto min-h-[4em]"></h2>
            <div class="grid grid-cols-2 gap-8 mt-24">
                <p id="section-4-left"
                   class="text-4xl">{{__('Il nostro approccio olistico eleva il tuo business combinando robuste infrastrutture digitali con strategie di marketing mirate.')}}</p>
                <p id="section-4-right"
                   class="text-4xl">{{__('Ti guideremo da una solida base tecnica alla conquista del mercato. Avvia oggi il tuo percorso verso l\'eccellenza.')}}</p>
            </div>
        </div>
    </section>
    <section class="dark:bg-gradient-to-b dark:from-slate-800 dark:to-slate-900 py-32" aria-labelledby="section-6">
        <div
            class="container bg-gradient-to-br from-transparent to-slate-100 dark:to-slate-800 dark:from-transparent py-16 rounded-2xl dark:text-white">
            <div>
                <img src="{{asset('storage/images/home/home-ideas.png')}}"
                     alt="{{__('Collabora con Coiné')}}"
                     width="512"
                     height="512"
                     class="dark:invert mx-auto mb-12"
                     id="bulbs"
                >
            </div>
            <h2 id="section-6"
                class="text-7xl font-semibold w-3/5 text-center mx-auto mb-16">{{__('Pronto a espandere il tuo business?')}}</h2>
            <div class="text-center">
                <a class="btn-primary dark:inverse text-2xl"
                   href="{{route('new-project')}}">{{__('Condividi il tuo progetto')}}</a>
            </div>
        </div>
    </section>
    <x-clients-list/>
@endsection
