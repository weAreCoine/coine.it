@extends('layouts.page', ['isLandingPage' => true])
<script>
    function getStartProjectData() {
        return {
            submitEnabled: false,
            openFaq: -1,
            showErrors: <?= json_encode($errors->any()) ?>,
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
            init() {
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
                console.log({
                    firstName: this.firstName,
                    lastName: this.lastName,
                    email: this.email,
                    phone: this.phone,
                    content: this.content,
                    selectedServices: this.selectedServices,
                    selectedBudget: this.selectedBudget
                });

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

                <form action="{{route('contact.store')}}" method="POST">
                    <div
                        x-show="showErrors"
                        x-collapse
                        class="form__field border border-red-500 relative">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                             class="h-6 w-auto hover:fill-accent-500 duration-500 top-4 right-4 absolute cursor-pointer"
                             @click="showErrors = false"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1030_2534)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M19.57 11.73C20.23 11.16 20.95 10.49 21.62 9.79999C22.0674 9.34825 22.4882 8.87077 22.88 8.36999C23.2709 7.96566 23.6071 7.51179 23.88 7.01999C24.0439 6.6755 24.0655 6.28027 23.94 5.91999C23.7768 5.50416 23.5396 5.12131 23.24 4.78999C22.8471 4.36934 22.4333 3.96883 22 3.58999C21.45 3.07999 20.9 2.21999 20.26 1.58999C19.9343 1.25583 19.5472 0.987606 19.12 0.799991C18.8207 0.704956 18.4993 0.704956 18.2 0.799991C17.7769 0.958625 17.3741 1.16674 17 1.41999C16.3719 1.79617 15.7765 2.22434 15.22 2.69999C14.43 3.41675 13.6883 4.1851 13 4.99999C11.43 6.77999 12.66 6.92999 10.44 4.44999L7.99998 1.92999C7.64311 1.52082 7.2553 1.13969 6.83998 0.789991C6.47216 0.522632 6.02421 0.388599 5.56998 0.409991C5.25429 0.428124 4.94671 0.516981 4.66998 0.669991C4.32548 0.858073 3.99164 1.06506 3.66998 1.28999C3.41025 1.44767 3.16287 1.62484 2.92998 1.81999L2.28998 2.42999C1.76899 3.00762 1.33448 3.65771 0.999982 4.35999C0.747279 4.84903 0.610419 5.38962 0.599982 5.93999C0.61782 6.15308 0.686396 6.35881 0.799982 6.53999C1.0258 6.83769 1.27313 7.11844 1.53998 7.37999L5.30998 11.24C5.37371 11.3035 5.46001 11.3392 5.54998 11.3392C5.63995 11.3392 5.72625 11.3035 5.78998 11.24C5.85184 11.1734 5.88621 11.0859 5.88621 10.995C5.88621 10.9041 5.85184 10.8166 5.78998 10.75L2.10998 6.86999C1.94998 6.67999 1.70998 6.46999 1.53998 6.22999C1.45822 6.13739 1.40599 6.02248 1.38998 5.89999C1.42095 5.48167 1.54387 5.07533 1.74998 4.70999C2.05029 4.08835 2.43751 3.51258 2.89998 2.99999C3.64567 2.21407 4.57786 1.62931 5.60998 1.29999C5.85663 1.29439 6.09738 1.37582 6.28998 1.52999C6.64746 1.85974 6.9816 2.21393 7.28998 2.58999L9.58998 5.07999C9.77998 5.29999 10.45 6.31999 10.95 6.83999C11.1523 7.08866 11.4354 7.25851 11.75 7.31999C12.0251 7.32005 12.2925 7.22858 12.51 7.05999C12.9668 6.64219 13.3882 6.18731 13.77 5.69999C14.3337 5.06495 14.9312 4.46074 15.56 3.88999C16.1766 3.33823 16.8466 2.84915 17.56 2.42999C18.88 1.63999 19.25 2.42999 19.33 2.42999C19.96 3.05999 20.52 3.92999 21.07 4.42999C21.41 4.74999 21.84 5.12999 22.2 5.53999C22.3938 5.75531 22.5494 6.0022 22.66 6.26999C22.71 6.40999 22.58 6.53999 22.48 6.67999C22.27 6.97999 22 7.25999 21.82 7.47999C21.4495 7.93986 21.0556 8.38043 20.64 8.79999C20 9.45999 19.3 10.11 18.64 10.66C18.37 10.89 17.9 11.18 17.54 11.48C17.3249 11.6483 17.139 11.8511 16.99 12.08C16.9142 12.207 16.8743 12.3521 16.8743 12.5C16.8743 12.6479 16.9142 12.793 16.99 12.92C17.1853 13.1786 17.4101 13.4136 17.66 13.62C18.2 14.23 18.81 14.81 19.37 15.43C19.5969 15.675 19.8106 15.9321 20.01 16.2C20.4748 16.7664 20.8897 17.372 21.25 18.01C21.4547 18.359 21.565 18.7554 21.57 19.16C21.57 19.29 21.39 19.35 21.26 19.45C21.13 19.55 20.88 19.71 20.74 19.81C20.0627 20.3407 19.415 20.9082 18.8 21.51C18.5472 21.7298 18.2835 21.9367 18.01 22.13C17.45 22.51 16.81 22.25 16.16 21.86C15.1082 21.1041 14.1274 20.2539 13.23 19.32C12.9 18.9252 12.5495 18.548 12.18 18.19C11.8968 17.9674 11.5383 17.8634 11.18 17.9C10.8815 17.9559 10.5943 18.0606 10.33 18.21C9.83146 18.5109 9.35371 18.845 8.89998 19.21C8.33998 19.61 7.73998 20.02 7.11998 20.4C6.49998 20.78 5.99998 21.22 5.33998 21.55L3.99998 22.33C3.81962 22.1886 3.65229 22.0313 3.49998 21.86C3.09998 21.39 2.68998 20.79 2.49998 20.6C2.03647 20.1274 1.61489 19.6155 1.23998 19.07C1.03199 18.7752 0.907596 18.4297 0.879982 18.07C0.902843 17.8658 0.974905 17.6702 1.08998 17.5C1.33123 17.1779 1.59171 16.8707 1.86998 16.58C2.4012 15.9097 2.99377 15.2903 3.63998 14.73C4.28535 14.1576 4.97408 13.636 5.69998 13.17C5.74984 13.146 5.79403 13.1117 5.82961 13.0693C5.86518 13.0269 5.89134 12.9775 5.90633 12.9242C5.92132 12.871 5.92481 12.8151 5.91656 12.7604C5.90831 12.7057 5.88851 12.6534 5.85848 12.6069C5.82845 12.5604 5.78888 12.5209 5.74239 12.4909C5.6959 12.4609 5.64356 12.4411 5.58884 12.4329C5.53413 12.4247 5.47829 12.4282 5.42504 12.4432C5.37178 12.4582 5.32234 12.4844 5.27998 12.52C4.51382 12.9825 3.78493 13.504 3.09998 14.08C2.41367 14.662 1.78112 15.3046 1.20998 16C0.908052 16.3171 0.624267 16.6509 0.359982 17C0.156621 17.2971 0.0326899 17.6414 -1.75539e-05 18C-0.0031279 18.5522 0.160698 19.0925 0.469982 19.55C0.86459 20.1407 1.30958 20.6961 1.79998 21.21C2.21339 21.7989 2.66081 22.3632 3.13998 22.9C3.33806 23.1102 3.59671 23.2535 3.87998 23.31C4.08343 23.3071 4.28417 23.2629 4.46998 23.18C4.90998 22.99 5.46998 22.56 5.79998 22.42C6.43998 22.1 7.08998 21.74 7.72998 21.35C8.36998 20.96 9.00998 20.55 9.58998 20.14C9.88998 19.93 10.31 19.6 10.74 19.35C10.9408 19.21 11.1693 19.1146 11.41 19.07C11.53 19.07 11.62 19.16 11.72 19.26C12.04 19.57 12.32 20.02 12.56 20.26C13.643 21.4571 14.8965 22.4882 16.28 23.32C16.6646 23.5295 17.0981 23.6326 17.5359 23.6185C17.9736 23.6044 18.3996 23.4738 18.77 23.24C19.0856 23.023 19.3893 22.7894 19.68 22.54C20.2754 21.9748 20.8995 21.4408 21.55 20.94C21.9117 20.7186 22.2472 20.457 22.55 20.16C22.7558 19.9369 22.8823 19.6522 22.91 19.35C22.9251 18.7204 22.7696 18.0984 22.46 17.55C22.0756 16.8436 21.627 16.1741 21.12 15.55C20.8964 15.25 20.656 14.9629 20.4 14.69C19.85 14.07 19.24 13.5 18.71 12.89L18.42 12.62C18.81 12.27 19.3 12 19.57 11.73Z"
                                      fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1030_2534">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>


                        <h2 class="title">
                            {{__('Correggi i seguenti errori...')}}

                        </h2>
                        <ul class="text-xl text-red-500 font-medium mt-8 list-square ml-4">
                            @foreach($errors->all() as $error )
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
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

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         x-show="selectedServices.includes(value)"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1030_2115)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M23.89 6.91001C23.8736 5.18699 23.7467 3.46679 23.51 1.76001C23.4665 1.48448 23.3567 1.22365 23.19 1.00001C22.8205 0.715003 22.3825 0.532219 21.92 0.470013C18.5858 0.0307538 15.2206 -0.12647 11.86 1.30795e-05C8.51535 0.00679505 5.17478 0.233954 1.86 0.680013C1.40221 0.730348 0.968421 0.910803 0.61 1.20001C0.2 1.79001 0 5.58001 0 9.84001C0 15.53 0.37 22.05 0.72 22.74C0.997803 23.0631 1.38682 23.2701 1.81 23.32C4.41277 23.7348 7.04439 23.9421 9.68 23.94C13.42 24.03 17.53 23.94 20.14 23.75C21.0941 23.7255 22.0386 23.5534 22.94 23.24C23.2996 23.005 23.5651 22.651 23.69 22.24C23.8948 21.5519 23.9992 20.8379 24 20.12C24 18.86 24.06 12 23.89 6.91001ZM22.82 20.1C22.8324 20.5452 22.8022 20.9906 22.73 21.43C22.67 21.76 22.6 22.11 22.36 22.25C21.7488 22.4475 21.1122 22.5553 20.47 22.57C18.39 22.77 15.12 22.87 11.86 22.87C8.64009 22.9458 5.41884 22.7954 2.22 22.42C1.98563 22.3738 1.755 22.3103 1.53 22.23C1.18 21.29 0.82 15.23 0.73 9.83001C0.65 5.76001 0.73 2.13001 1.11 1.59001C1.18 1.49001 1.49 1.46001 1.94 1.38001C5.23517 0.990866 8.55221 0.817164 11.87 0.860013C14.8081 0.805551 17.7468 0.929111 20.67 1.23001C21.289 1.25548 21.8985 1.39092 22.47 1.63001C22.5364 1.90683 22.5865 2.18731 22.62 2.47001C22.74 3.47001 22.81 5.09001 22.85 6.94001C23 12 22.86 18.84 22.82 20.1Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M18.14 5.18999C18.0717 5.18882 18.0047 5.20823 17.9476 5.24569C17.8905 5.28314 17.8461 5.33691 17.82 5.39999L17.4 5.99999C16.58 7.14999 14.75 9.53999 13.02 11.89C11.79 13.56 10.62 15.2 9.80997 16.26C9.56574 16.6481 9.2951 17.019 8.99997 17.37C8.99997 17.37 8.88997 17.37 8.80997 17.37C8.63447 17.2934 8.46699 17.1996 8.30997 17.09C7.49501 16.4319 6.757 15.6838 6.10997 14.86C5.87997 14.58 5.74997 14.27 5.51997 14.47C5.34997 14.47 5.17997 14.62 5.32997 14.84L5.48997 15.07C6.02492 15.8518 6.62006 16.5907 7.26997 17.28C7.6276 17.6892 8.05826 18.0283 8.53997 18.28C8.70009 18.3512 8.87548 18.3811 9.05014 18.3671C9.22481 18.3532 9.3932 18.2957 9.53997 18.2C10.1649 17.6177 10.7341 16.9783 11.24 16.29C11.88 15.48 12.64 14.46 13.41 13.37C15.22 10.83 17.1 7.91999 17.96 6.55999C18.1754 6.25027 18.3501 5.91419 18.48 5.55999C18.4841 5.51289 18.4784 5.46543 18.4632 5.42065C18.448 5.37587 18.4236 5.33476 18.3916 5.29994C18.3597 5.26511 18.3207 5.23735 18.2774 5.21842C18.2341 5.19949 18.1873 5.18981 18.14 5.18999Z"
                                                  fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1030_2115">
                                                <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
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
                        <input type="hidden" name="budget" x-model="budgets[selectedBudget]">
                        <ul class="chips__container">
                            <template x-for="(label, value) in budgets" :key="value">
                                <li class="chip"
                                    :class="{
                                    'selected': selectedBudget === value,
                                    'not__selected': selectedBudget !== value
                                }"
                                    @click="toggleBudget(value)">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         x-show="selectedBudget === value"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1030_2115)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M23.89 6.91001C23.8736 5.18699 23.7467 3.46679 23.51 1.76001C23.4665 1.48448 23.3567 1.22365 23.19 1.00001C22.8205 0.715003 22.3825 0.532219 21.92 0.470013C18.5858 0.0307538 15.2206 -0.12647 11.86 1.30795e-05C8.51535 0.00679505 5.17478 0.233954 1.86 0.680013C1.40221 0.730348 0.968421 0.910803 0.61 1.20001C0.2 1.79001 0 5.58001 0 9.84001C0 15.53 0.37 22.05 0.72 22.74C0.997803 23.0631 1.38682 23.2701 1.81 23.32C4.41277 23.7348 7.04439 23.9421 9.68 23.94C13.42 24.03 17.53 23.94 20.14 23.75C21.0941 23.7255 22.0386 23.5534 22.94 23.24C23.2996 23.005 23.5651 22.651 23.69 22.24C23.8948 21.5519 23.9992 20.8379 24 20.12C24 18.86 24.06 12 23.89 6.91001ZM22.82 20.1C22.8324 20.5452 22.8022 20.9906 22.73 21.43C22.67 21.76 22.6 22.11 22.36 22.25C21.7488 22.4475 21.1122 22.5553 20.47 22.57C18.39 22.77 15.12 22.87 11.86 22.87C8.64009 22.9458 5.41884 22.7954 2.22 22.42C1.98563 22.3738 1.755 22.3103 1.53 22.23C1.18 21.29 0.82 15.23 0.73 9.83001C0.65 5.76001 0.73 2.13001 1.11 1.59001C1.18 1.49001 1.49 1.46001 1.94 1.38001C5.23517 0.990866 8.55221 0.817164 11.87 0.860013C14.8081 0.805551 17.7468 0.929111 20.67 1.23001C21.289 1.25548 21.8985 1.39092 22.47 1.63001C22.5364 1.90683 22.5865 2.18731 22.62 2.47001C22.74 3.47001 22.81 5.09001 22.85 6.94001C23 12 22.86 18.84 22.82 20.1Z"
                                                  fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M18.14 5.18999C18.0717 5.18882 18.0047 5.20823 17.9476 5.24569C17.8905 5.28314 17.8461 5.33691 17.82 5.39999L17.4 5.99999C16.58 7.14999 14.75 9.53999 13.02 11.89C11.79 13.56 10.62 15.2 9.80997 16.26C9.56574 16.6481 9.2951 17.019 8.99997 17.37C8.99997 17.37 8.88997 17.37 8.80997 17.37C8.63447 17.2934 8.46699 17.1996 8.30997 17.09C7.49501 16.4319 6.757 15.6838 6.10997 14.86C5.87997 14.58 5.74997 14.27 5.51997 14.47C5.34997 14.47 5.17997 14.62 5.32997 14.84L5.48997 15.07C6.02492 15.8518 6.62006 16.5907 7.26997 17.28C7.6276 17.6892 8.05826 18.0283 8.53997 18.28C8.70009 18.3512 8.87548 18.3811 9.05014 18.3671C9.22481 18.3532 9.3932 18.2957 9.53997 18.2C10.1649 17.6177 10.7341 16.9783 11.24 16.29C11.88 15.48 12.64 14.46 13.41 13.37C15.22 10.83 17.1 7.91999 17.96 6.55999C18.1754 6.25027 18.3501 5.91419 18.48 5.55999C18.4841 5.51289 18.4784 5.46543 18.4632 5.42065C18.448 5.37587 18.4236 5.33476 18.3916 5.29994C18.3597 5.26511 18.3207 5.23735 18.2774 5.21842C18.2341 5.19949 18.1873 5.18981 18.14 5.18999Z"
                                                  fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1030_2115">
                                                <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
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
