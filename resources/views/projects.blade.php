@extends('layouts.page', ['isLandingPage' => true])
<?php
$data = json_encode([
    'servicesChips' => [
        'webDesign' => __('UX/UI Design'),
        'translation' => __('Traduzione'),
        'contentWriting' => __('Content Writing'),
        'website' => __('Web Development'),
        'onlineMarketing' => __('Online Marketing'),
        'flutterApp' => __('App Flutter'),
        'teaching' => __('Formazione'),
        'adsStrategy' => __('Strategia Marketing'),
    ],
    'faqs' => [
        [
            'question' => __('Accettate un compenso in percentuale sul fatturato?'),
            'answer' => __('No. Questo tipo di accordi ha tantissimi limiti, possibili conflitti di interesse e altre criticità. Preferiamo dimostrare la fiducia che riponiamo nelle nostre capacità stipulando contratti che lasciano le mani di entrambe le parti libere di svincolarsi qualora non si lavorasse bene insieme.'),
        ],
        [
            'question' => __('Quali son'),
            'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
        ],
        [
            'question' => 'How can we start a project together?',
            'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
        ],
        [
            'question' => 'How can we start a project together?',
            'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
        ],
    ],
]);
?>

<script>
    function getStartProjectData() {
        return {
            selectedServices: [],
            selectedBudget: null,
            firstName: '',
            lastName: '',
            email: '',
            phone: '',
            content: '',
            submitEnabled: false,
            openFaq: -1,
            budgets: [
                '< 5k', '5 ÷ 10k', '10 ÷ 20k', '20 ÷ 50k', '> 50k'
            ],
            ...(JSON.parse('<?= $data ?>')),
            toggleService(service) {
                if (this.selectedServices.includes(service)) {
                    this.selectedServices = this.selectedServices.filter((value) => value !== service);
                } else {
                    this.selectedServices.push(service);
                }
                this.checkSubmitEnable();
            },

            toggleBudget(budget) {
                this.selectedBudget = this.selectedBudget === budget ? null : budget;
                this.checkSubmitEnable();
            },
            toggleFaq(index) {
                if (index === this.openFaq) this.openFaq = -1;
                else {
                    this.openFaq = index;
                }
            },
            checkSubmitEnable() {
                this.submitEnabled =
                    this.firstName.length &&
                    this.lastName.length &&
                    this.email.length &&
                    this.phone.length &&
                    this.content.length &&
                    this.selectedServices.length &&
                    this.selectedBudget !== null;
            },
        }
    }
</script>

@section('content')
    <div x-data="getStartProjectData()">
        <div class="container pt-48">
            <div class="sm:w-5/6 mx-auto">
                <h1 id="page-title"
                    class="text-5xl sm:text-6xl lg:text-7xl font-semibold">{{__('Potremmo lavorare insieme. Iniziamo?')}}</h1>
                <p class="text-3xl sm:text-4xl mt-12">{{__('Inizia raccontandoci qualcosa di te, dei tuoi obiettivi e del progetto su cui vorresti lavorassimo insieme.')}}</p>
                <form action="" method="POST">
                    @csrf
                    <div
                        class="form__field">
                        <h2 class="title">
                            {{__('Sono interessato a...')}}

                        </h2>
                        <input type="hidden" name="services" required x-model="selectedServices.join('_')">
                        <ul class="chips__container">
                            <template x-for="(label, value) in servicesChips" :key="value">
                                <li class="chip"
                                    :class="{
                                    'selected': selectedServices.includes(value),
                                    'not__selected': !selectedServices.includes(value)
                                }"
                                    @click="toggleService(value)">
                                    <i class="fa-regular fa-circle-check text-xl opacity-70"
                                       x-show="selectedServices.includes(value)"></i>
                                    <span x-text="label"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="form__field">
                        <h2 class="title">{{__('Raccontaci di te...')}}</h2>
                        <div class="grid md:grid-cols-2 gap-8 mt-8">
                            <div class="material-input">
                                <input type="text" id="firstName" autocomplete="given-name" placeholder=" " required
                                       name="firstName" x-model="firstName" @change="checkSubmitEnable()">
                                <label for="firstName">{{__('Il tuo nome')}}</label>
                            </div>
                            <div class="material-input">
                                <input type="text" id="lastName" placeholder=" " required autocomplete="family-name"
                                       name="lastName" x-model="lastName" @change="checkSubmitEnable()">
                                <label for="lastName">{{__('Il tuo cognome')}}</label>
                            </div>
                            <div class="material-input">
                                <input type="email" id="email" placeholder=" " required autocomplete="email"
                                       name="email" x-model="email" @change="checkSubmitEnable()">
                                <label for="email">{{__('Il tuo indirizzo email')}}</label>
                            </div>
                            <div class="material-input">
                                <input type="tel" id="phone" placeholder=" " required autocomplete="tel" name="phone"
                                       x-model="phone" @change="checkSubmitEnable()">
                                <label for="phone">{{__('Il tuo numero di telefono')}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form__field">
                        <h2 class="title">{{__('Raccontaci qualcosa del tuo progetto...')}}</h2>
                        <textarea required
                                  placeholder="{{__('Gli obiettivi del progetto in poche parole... scrivi ciò che pensi dovremmo sapere del tuo progetto 😉')}}"
                                  name="content" x-model="content" id="content"
                                  class="w-full mt-8 border-b border-b-darkBackground-300 bg-transparent outline-none text-2xl placeholder-opacity-100 placeholder-darkBackground-500 focus:placeholder-opacity-0 duration-500"
                                  cols="30" rows="10"
                        ></textarea>
                    </div>

                    <div class="form__field">
                        <h2 class="title">{{__('Budget per il progetto (EUR)...')}}</h2>
                        <input type="hidden" name="budget" x-model="selectedBudget">
                        <ul class="chips__container">
                            <template x-for="(label, value) in budgets" :key="value">
                                <li class="chip"
                                    :class="{
                                    'selected': selectedBudget === value,
                                    'not__selected': selectedBudget !== value
                                }"
                                    @click="toggleBudget(value)">
                                    <i class="fa-regular fa-circle-check text-xl opacity-70"
                                       x-show="selectedBudget === value"></i>
                                    <span x-text="label"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="text-right mt-12">
                        <button type="submit" class="btn-primary text-2xl"
                                :disabled="!submitEnabled">{{__('Invia')}}</button>
                    </div>
                </form>
            </div>
            <hr class="my-24 border-darkBackground-900 border-[1px]">
            <div class="grid grid-cols-3 mt-20 gap-x-8 gap-y-24">
                <h2 class="text-4xl sm:text-5xl col-span-3 sm:col-span-2 font-semibold">{{__('Se preferisci, puoi metterti in contatto con noi utilizzando uno dei metodi qui sotto.')}}</h2>
                <div class="lg:col-start-2 lg:row-start-2 col-span-3">
                    <a href="mailto:ciao@coine.it"
                       class="text-4xl font-semibold style-none inline-block">ciao@coine.it</a>
                    <p class="text-xl mt-2 text-darkBackground-400">{{__('Nuovi progetti e informazioni')}}</p>
                    <a href="tel:003934576837" class="text-4xl font-semibold style-none inline-block mt-9">+39 345 447
                        6837</a>
                    <p class="text-xl mt-2 text-darkBackground-400">{{__('Sviluppo e Marketing')}}</p>
                    <a href="tel:00393292130462" class="text-4xl font-semibold style-none inline-block mt-9">+39 329 213
                        0462</a>
                    <p class="text-xl mt-2 text-darkBackground-400">{{__('Traduzioni e Creazione Contenuti')}}</p>
                </div>
                <div class="lg:col-start-3 lg:row-start-2 col-span-3 lg:col-span-1">
                    <h3 class="text-4xl font-semibold">Dove siamo</h3>
                    <a href="https://goo.gl/maps/Nzen6mimbRcrj6fb8"
                       class="style-none block mt-8 text-xl text-darkBackground-400 leading-relaxed">
                        via San Martino Carano 50/A<br>
                        41037 - Mirandola<br>
                        Modena<br>
                        Italy
                    </a>
                </div>
            </div>
        </div>
        {{--        <div--}}
        {{--            class="bg-sky-900 dark:bg-gradient-to-b dark:from-darkBackground-900 dark:to-darkBackground-800 py-24 my-24 dark:mb-0">--}}
        {{--            <div class="container w-5/6 mx-auto grid grid-cols-3 gap-8">--}}
        {{--                <h2 id="faq-title" class="text-5xl font-semibold text-white text-left">{{__('Domande frequenti')}}</h2>--}}
        {{--                <div class="col-start-1 row-start-2">--}}
        {{--                    <img src="{{asset('storage/images/contacts/faq.png')}}" alt="High Five Image"--}}
        {{--                         class="mt-8 mix-blend-luminosity">--}}
        {{--                </div>--}}
        {{--                <section class="col-span-2 row-start-2" aria-labelledby="faq-title">--}}
        {{--                    <ul class="text-white text-3xl">--}}
        {{--                        <template x-for="(faq, index) in faqs" :key="index">--}}
        {{--                            <li class="mt-12 first:mt-0">--}}
        {{--                                <div class="question cursor-pointer flex justify-between items-center"--}}
        {{--                                     @click="toggleFaq(index)">--}}
        {{--                                    <h3 x-text="faq.question"></h3>--}}
        {{--                                    <div class="accordion-icon" :class="{'open' : openFaq === index}"></div>--}}
        {{--                                </div>--}}
        {{--                                <p x-text="faq.answer" class="p-8 text-xl bg-white/10 mt-6 rounded-2xl"--}}
        {{--                                   x-show="openFaq === index" x-collapse></p>--}}
        {{--                            </li>--}}
        {{--                        </template>--}}

        {{--                    </ul>--}}
        {{--                </section>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="dark:bg-gradient-to-b dark:from-darkBackground-800 dark:to-darkBackground-900 dark:pt-24">--}}
        {{--            <div class="container ">--}}
        {{--                <div class="w-4/6 mx-auto text-center">--}}
        {{--                    <h2 id="page-title"--}}
        {{--                        class="text-7xl font-semibold">{{__('Get a better understanding of our knowledge')}}</h2>--}}
        {{--                    <p class="text-4xl mt-8">BB Agency is a strategic partner for fast-growing tech companies in need of--}}
        {{--                        a scalable website with modular CMS, a design system, and future-proof brand identity.</p>--}}

        {{--                    <a href="" class="btn-secondary mt-24 inline-block">{{__('Latest articles')}}</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
@endsection
