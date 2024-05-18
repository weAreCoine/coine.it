<section class="container section-margin" aria-labelledby="section-3">
    <div id="clients__title">
        <p class="uppercase mb-4 text-accent tracking-widest font-medium text-2xl">{{__('I nostri clienti')}}</p>
        <h2 id="section-3"
            class="text-5xl md:text-7xl font-semibold md:w-3/4">{{__('Dieci anni di successi: ecco alcuni degli amici cresciuti insieme a noi.')}}</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-16">
        @foreach($files as $index => $file)
            @php($client = pathinfo(basename($file))['filename'])
            <div data-id="{{$index+1}}"
                 class="p-8 rounded-2xl bg-gradient-to-b from-transparent to-white/5 backdrop-blur client__card">
                <div class="overflow-hidden rounded-xl sm:rounded-2xl group">
                    <img src="{{$file}}" alt="{{ucwords(\Illuminate\Support\Str::replace('_', ' ', $client))}} logo"
                         class="w-full h-auto duration-[2s] group-hover:scale-105" height="451"
                         width="200">
                </div>
                <div class="flex items-center justify-between mt-8">
                    <p class="whitespace-nowrap shrink-0 uppercase font-medium tracking-wide">{{__('Servizi')}}</p>
                    <div class="flex justify-end items-center gap-6 flex-wrap">
                        @foreach($activities[$client] as $activity)
                            <x-activity :activity="$activity"/>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
