@extends('layouts.page', ['isLandingPage' => true])
<?php
    $data = json_encode([
        'servicesChips' => [
            'webDesign' => __('Web Design'),
            'translation' => __('Translation'),
            'contentWriting' => __('Content Writing'),
            'website' => __('Website'),
            'onlineMarketing' => __('Online Marketing'),
            'flutterApp' => __('Flutter App'),
            'teaching' => __('Teaching'),
            'adsStrategy' => __('Ads Strategy'),
        ],
        'faqs' => [
            [
                'question' => 'How can we start a project together?',
                'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
            ], [
                'question' => 'How can we start a project together?',
                'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
            ], [
                'question' => 'How can we start a project together?',
                'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
            ], [
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
            },

            toggleBudget(budget) {
                this.selectedBudget = this.selectedBudget === budget ? null : budget;
            },
            toggleFaq(index) {
                if (index === this.openFaq) this.openFaq = -1;
                else {
                    this.openFaq = index;
                }
            }
        }
    };
</script>

@section('content')
    <div x-data="getStartProjectData()">
        <div class="container pt-12">
            <div class="w-5/6 mx-auto">
                <h1 id="page-title" class="text-7xl font-semibold">{{__('We craft holistic, people friendly digital experiences')}}</h1>
                <p class="text-4xl mt-12">{{__('BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.')}}</p>
                <form action="" method="POST">
                    @csrf
                    <div class="rounded-2xl bg-slate-50 dark:bg-slate-800/40 dark:bg-slate-800/40 mt-20 p-16">
                        <h2 class="text-3xl font-medium">{{__('Im interested in...')}}</h2>
                        <ul class="mt-12 flex flex-wrap gap-x-4 gap-y-8">
                            <template x-for="(label, value) in servicesChips" :key="value">
                                <li class="cursor-pointer flex items-center gap-3 font-medium rounded-full border border-slate-300 px-6 py-2 text-2xl inline-block duration-500"
                                    :class="{
                                    'bg-sky-900 dark:bg-orange-500 hover:bg-sky-800 dark:hover:bg-orange-600 border-sky-900 text-white font-semibold': selectedServices.includes(value),
                                    'text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white': !selectedServices.includes(value)
                                }"
                                    @click="toggleService(value)">
                                    <i class="fa-regular fa-circle-check text-xl opacity-70" x-show="selectedServices.includes(value)"></i>
                                    <span x-text="label"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="rounded-2xl bg-slate-50 dark:bg-slate-800/40 mt-12 p-16">
                        <h2 class="text-3xl font-medium">{{__('Let us to know first...')}}</h2>
                        <div class="grid grid-cols-2 gap-8 mt-8">
                            <div class="material-input">
                                <input type="text" id="firstName" autocomplete="given-name" placeholder=" " required name="firstName" x-model="firstName">
                                <label for="firstName">{{__('Your first name')}}</label>
                            </div>
                            <div class="material-input">
                                <input type="text" id="lastName" placeholder=" " required autocomplete="family-name" name="lastName" x-model="lastName">
                                <label for="lastName">{{__('Your last name')}}</label>
                            </div>
                            <div class="material-input">
                                <input type="email" id="email" placeholder=" " required autocomplete="email" name="email" x-model="email">
                                <label for="email">{{__('Your email address')}}</label>
                            </div>
                            <div class="material-input">
                                <input type="phone" id="phone" placeholder=" " required autocomplete="tel" name="phone" x-model="phone">
                                <label for="phone">{{__('Your phone number')}}</label>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-slate-50 dark:bg-slate-800/40 mt-12 p-16">
                        <h2 class="text-3xl font-medium">{{__('Tell us about your project...')}}</h2>
                        <textarea required placeholder="{{__('Your project goals in a snapshot... Give some words that we might know for this project :)')}}" name="content" x-model="content" id="content"
                                  class="w-full mt-8 border-b border-b-slate-300 bg-transparent outline-none text-2xl placeholder-slate-500" cols="30" rows="10"></textarea>
                    </div>

                    <div class="rounded-2xl bg-slate-50 dark:bg-slate-800/40 mt-12 p-16">
                        <h2 class="text-3xl font-medium">{{__('Project budget (EUR)...')}}</h2>
                        <ul class="mt-12 flex flex-wrap gap-x-4 gap-y-8">
                            <template x-for="(label, value) in budgets" :key="value">
                                <li class="cursor-pointer flex items-center gap-3 font-medium rounded-full border border-slate-300 px-6 py-2 text-2xl inline-block duration-500"
                                    :class="{
                                    'bg-sky-900 hover:bg-sky-800 border-sky-900 text-white font-semibold': selectedBudget === value,
                                    'text-slate-500 hover:text-slate-900': selectedBudget !== value
                                }"
                                    @click="toggleBudget(value)">
                                    <i class="fa-regular fa-circle-check text-xl opacity-70" x-show="selectedBudget === value"></i>
                                    <span x-text="label"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="text-right mt-12">
                        <button type="submit" class="btn-primary text-2xl" :disabled="!submitEnabled">{{__('Send request')}}</button>
                    </div>
                </form>
            </div>
            <hr class="my-24 border-slate-900 border-[1px]">
            <div class="grid grid-cols-3 mt-20 gap-x-8 gap-y-24">
                <h2 class="text-5xl col-span-2 font-semibold">If you prefer, send us an email for new business opportunities or job openings.</h2>
                <div class="col-start-2 row-start-2">
                    <a href="mailto:ciao@coine.it" class="text-4xl font-semibold style-none inline-block">ciao@coine.it</a>
                    <p class="text-xl mt-2 text-slate-400">New business and General</p>
                    <a href="tel:003934576837" class="text-4xl font-semibold style-none inline-block mt-9">+39 345 447 6837</a>
                    <p class="text-xl mt-2 text-slate-400">Marketing and Developing</p>
                    <a href="tel:00393292130462" class="text-4xl font-semibold style-none inline-block mt-9">+39 329 213 0462</a>
                    <p class="text-xl mt-2 text-slate-400">Content Writing and Translations</p>
                </div>
                <div class="col-start-3 row-start-2">
                    <h3 class="text-4xl font-semibold">Head Office</h3>
                    <a href="https://goo.gl/maps/Nzen6mimbRcrj6fb8" class="style-none block mt-8 text-xl text-slate-400 leading-relaxed">
                        via San Martino Carano 50/A<br>
                        41037 - Mirandola<br>
                        Modena<br>
                        Italy
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-sky-900 dark:bg-gradient-to-b dark:from-slate-900 dark:to-slate-800 py-24 my-24 dark:mb-0">
            <div class="container w-5/6 mx-auto grid grid-cols-3 gap-8">
                <h2 id="faq-title" class="text-5xl font-semibold text-white text-left">Frequently Asked Questions</h2>
                <div class="col-start-1 row-start-2">
                    <img src="{{asset('images/new-project/high-five.png')}}" alt="High Five Image" class="mt-8 mix-blend-luminosity">
                </div>
                <section class="col-span-2 row-start-2" aria-labelledby="faq-title">
                    <ul class="text-white text-3xl">
                        <template x-for="(faq, index) in faqs" :key="index">
                            <li class="mt-12 first:mt-0">
                                <div class="question cursor-pointer flex justify-between items-center" @click="toggleFaq(index)">
                                    <h3 x-text="faq.question"></h3>
                                    <div class="accordion-icon" :class="{'open' : openFaq === index}"></div>
                                </div>
                                <p x-text="faq.answer" class="p-8 text-xl bg-white/10 mt-6 rounded-2xl" x-show="openFaq === index" x-collapse></p>
                            </li>
                        </template>

                    </ul>
                </section>
            </div>
        </div>
        <div class="dark:bg-gradient-to-b dark:from-slate-800 dark:to-slate-900 dark:pt-24">
            <div class="container ">
                <div class="w-4/6 mx-auto text-center">
                    <h2 id="page-title" class="text-7xl font-semibold">{{__('Get a better understanding of our knowledge')}}</h2>
                    <p class="text-4xl mt-8">BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.</p>

                    <a href="" class="btn-secondary mt-24 inline-block">{{__('Latest articles')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
