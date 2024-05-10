<section
    id="above__the__fold"
    class="bg-slate-800 pt-20 pb-48 text-white min-h-screen flex flex-col justify-end gap-y-24"
    aria-labelledby="page-title">
    <div class="container relative">
        <div class="flex justify-end">
            <img id="image__to__rotate" src="{{asset('storage/images/home/home-atf.png')}}" alt="People connection"
                 width="1024" height="1024"
                 class="w-[400px]">
        </div>
        <p id="page-title"
           class="text-8xl font-semibold max-w-[73rem] text-pretty"><span
                class="text">{{__('Connettiamo le persone, creando esperienze digitali')}}</span><span
                class="text-orange-500 animate-pulse">_</span></p>
        <h1 class="text-4xl w-7/12 mt-12">{{__('Con un approccio olistico che combina tecnologia e strategie di marketing mirate, siamo qui per trasformare la tua visione digitale in realtà.')}}</h1>
    </div>
    <div class="container grid grid-cols-4 gap-8 justify-start">
        <div
            id="service__1"
            class="bg-gradient-to-b to-darkBox from-slate-800 p-9 rounded-2xl">
            <i class="fa-solid fa-code text-5xl"></i>
            <h2 class="text-5xl leading-tight mb-4 font-semibold mt-9">{{__('Sviluppo Web')}}</h2>
            <p class="text-2xl mt-2">{{ __('Soluzioni scalabili e su misura, da Wordpress a Laravel: creiamo il sito di cui
                    hai veramente bisogno.') }}</p>
        </div>
        <div
            id="service__2"
            class="bg-sky-800/30 dark:bg-gradient-to-b dark:to-darkBox dark:from-slate-800 p-9 rounded-2xl">
            <i class="fa-solid fa-mobile-screen-button text-5xl"></i>
            <h2 class="text-5xl leading-tight mb-4 font-semibold mt-9">{{__('Sviluppo App Mobile')}}</h2>
            <p class="text-2xl mt-2">{{ __('Utilizziamo Flutter per creare applicazioni multi-piattaforma, con prestazioni native.') }}</p>
        </div>
        <div
            id="service__3"
            class="bg-sky-800/30 dark:bg-gradient-to-b dark:to-darkBox dark:from-slate-800 p-9 rounded-2xl">
            <i class="fa-solid fa-bullhorn text-5xl"></i>
            <h2 class="text-5xl leading-tight mb-4 font-semibold mt-9">{{__('Digital Marketing')}}</h2>
            <p class="text-2xl mt-2">{{__('Usiamo i tool più avanzati per far crescere le metriche che importano davvero per il tuo business.')}}</p>
        </div>
        <div
            id="service__4"
            class="bg-sky-800/30 dark:bg-gradient-to-b dark:to-darkBox dark:from-slate-800 p-9 rounded-2xl">
            <i class="fa-solid fa-earth-europe text-5xl"></i>
            <h2 class="text-5xl leading-tight mb-4 font-semibold mt-9">{{__('Cultural Localization')}}</h2>
            <p class="text-2xl mt-2">{{__('Non ci limitiamo alla traduzione: adattiamo i tuoi contenuti alla nuova cultura e alle esigenze del suo mercato.')}}</p>
        </div>
    </div>
</section>
