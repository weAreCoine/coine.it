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
            <div class="bg-white/5 backdrop-blur rounded-full px-12 py-4 hidden lg:block">
                <navigation @class([
            'text-white' => !$light,
            ])>
                    <ul class="flex gap-x-16 items-center">
                        <li @class(['current' => request()->routeIs('home'), 'navigation__item']) >
                            <a href="{{route('home')}}">
                                <svg width="24" height="24" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g clip-path="url(#clip0_1030_2183)">
                                        <path
                                            d="M24 14.05C23.1268 12.5918 22.1227 11.2161 21 9.93999C20.66 9.55333 20.31 9.17333 19.95 8.8C19.95 8.42 19.95 8.05 20.02 7.67C20.09 6.88 20.19 6.09 20.28 5.32C20.304 4.88006 20.2973 4.439 20.26 4C20.2613 3.62115 20.1722 3.24746 20 2.91C19.8743 2.69403 19.681 2.52538 19.45 2.43C19.225 2.36126 18.994 2.31438 18.76 2.29C18.3817 2.24509 18.0009 2.22504 17.62 2.23C17.2339 2.23527 16.8489 2.27543 16.47 2.35C16.2723 2.38593 16.0782 2.43948 15.89 2.51C15.7238 2.57778 15.5738 2.68002 15.45 2.81C15.285 3.03203 15.2004 3.30354 15.21 3.58V3.93L13.48 2C13.2647 1.76241 13.0193 1.55398 12.75 1.38C12.5027 1.22277 12.2128 1.14592 11.92 1.16C11.6743 1.16583 11.4394 1.26195 11.26 1.43C11.0437 1.64693 10.8494 1.88476 10.68 2.14L8.56002 4.54C7.71002 5.54 6.84002 6.54 5.96002 7.54C5.08002 8.54 4.18002 9.54 3.25002 10.45C2.49002 11.24 1.66002 11.9 0.940016 12.69C0.613676 13.0423 0.316059 13.4202 0.0500159 13.82C0.00688366 13.8869 -0.00886729 13.9678 0.0060254 14.046C0.0209181 14.1242 0.0653133 14.1936 0.130016 14.24C0.198096 14.2821 0.27984 14.2963 0.35813 14.2795C0.436419 14.2627 0.505181 14.2163 0.550016 14.15C0.898134 13.6746 1.29348 13.2357 1.73002 12.84C2.40002 12.21 3.12002 11.66 3.81002 11.01C4.81002 10.09 5.73002 9.16 6.67002 8.2C7.61002 7.24 8.51002 6.27 9.40002 5.27C9.40002 5.27 11.99 2.32 11.97 2.32C11.95 2.32 14.87 5.23 14.87 5.23C16.32 6.65 17.81 7.99999 19.23 9.43999L19.29 9.51C19.63 9.84 19.96 10.17 20.29 10.51C21.4365 11.7133 22.4708 13.0187 23.38 14.41C23.4037 14.4481 23.4346 14.4811 23.471 14.5073C23.5074 14.5334 23.5486 14.5521 23.5922 14.5623C23.6359 14.5725 23.6811 14.5741 23.7253 14.5668C23.7696 14.5595 23.8119 14.5436 23.85 14.52C23.8881 14.4964 23.9212 14.4654 23.9473 14.429C23.9734 14.3926 23.9921 14.3514 24.0024 14.3078C24.0126 14.2641 24.0141 14.2189 24.0068 14.1747C23.9996 14.1304 23.9837 14.0881 23.96 14.05H24ZM16 4.71V3.8C16 3.48 16 3.45 16.1 3.38L16.67 3.27C16.9298 3.255 17.1902 3.255 17.45 3.27C17.8528 3.2941 18.2537 3.34421 18.65 3.42L19 3.5C19.0943 3.6719 19.1457 3.86399 19.15 4.06C19.1751 4.45627 19.1751 4.85372 19.15 5.25V7.64V7.99C18 6.89 17 5.81 15.91 4.71H16Z"
                                        />
                                        <path
                                            d="M11.44 10.59C11.7022 10.6613 11.9762 10.6784 12.2452 10.6402C12.5142 10.6021 12.7726 10.5096 13.0047 10.3683C13.2368 10.227 13.4376 10.0399 13.595 9.81837C13.7524 9.59688 13.8629 9.34564 13.92 9.07999C14.36 7.45999 13 6.07999 10.92 6.87999C10.503 7.05685 10.1529 7.36147 9.91999 7.74999C9.76297 8.03264 9.68732 8.35326 9.70144 8.67629C9.71556 8.99932 9.8189 9.31212 9.99999 9.57999C10.3363 10.0854 10.8503 10.4458 11.44 10.59ZM10.8 8.17999C10.9447 7.87225 11.2026 7.63224 11.52 7.50999C12.52 7.05999 13.4 7.75999 13.01 8.78999C12.9737 8.92174 12.9108 9.04466 12.8252 9.15115C12.7396 9.25765 12.6331 9.34547 12.5122 9.40919C12.3913 9.47292 12.2586 9.51119 12.1224 9.52164C11.9861 9.5321 11.8492 9.51452 11.72 9.46999C11.4256 9.38245 11.171 9.19503 11 8.93999C10.9006 8.84356 10.8294 8.72179 10.7941 8.58785C10.7589 8.4539 10.7609 8.31287 10.8 8.17999Z"
                                        />
                                        <path
                                            d="M20.63 14.14V12.14C20.63 12.0953 20.6212 12.0511 20.6041 12.0099C20.587 11.9686 20.562 11.9311 20.5304 11.8996C20.4988 11.868 20.4614 11.843 20.4201 11.8259C20.3789 11.8088 20.3346 11.8 20.29 11.8C20.2453 11.8 20.2011 11.8088 20.1599 11.8259C20.1186 11.843 20.0811 11.868 20.0496 11.8996C20.018 11.9311 19.993 11.9686 19.9759 12.0099C19.9588 12.0511 19.95 12.0953 19.95 12.14V14.14C19.88 15.71 19.73 17.28 19.7 18.84C19.7389 19.4694 19.7389 20.1006 19.7 20.73C19.6758 21.0704 19.5544 21.3967 19.35 21.67C19.26 21.77 19.07 21.67 18.89 21.67C18.55 21.67 18.2 21.6 18 21.59C17.3 21.59 13.5 21.32 12.93 21.32H11.37H11.29H9.98999H9.28999C8.62999 21.32 7.95999 21.39 7.28999 21.47C6.79999 21.53 6.20999 21.67 5.64999 21.7C5.35708 21.7252 5.06236 21.6807 4.78999 21.57C4.63999 21.5 4.58999 21.3 4.53999 21.1C4.45785 20.6376 4.41105 20.1695 4.39999 19.7C4.30999 18.7 4.24999 17.77 4.20999 16.81C4.20999 15.35 4.14999 13.9 4.13999 12.44C4.14133 12.4006 4.13488 12.3613 4.12103 12.3244C4.10717 12.2875 4.08618 12.2537 4.05925 12.2249C4.03231 12.1961 3.99997 12.1729 3.96406 12.1566C3.92816 12.1403 3.8894 12.1313 3.84999 12.13C3.80976 12.1286 3.76967 12.1354 3.73211 12.1499C3.69455 12.1644 3.66029 12.1862 3.63137 12.2142C3.60244 12.2422 3.57944 12.2758 3.56375 12.3128C3.54805 12.3499 3.53997 12.3897 3.53999 12.43C3.48999 13.9 3.43999 15.36 3.42999 16.82C3.42999 17.82 3.42999 18.82 3.49999 19.77C3.48586 20.3812 3.54292 20.992 3.66999 21.59C3.76487 21.9591 4.00221 22.2755 4.32999 22.47C4.64241 22.6246 4.98219 22.7164 5.32999 22.74C6.01997 22.7355 6.70862 22.6787 7.38999 22.57C8.10999 22.5 8.83999 22.47 9.57999 22.45H12.91L17.91 22.63C18.3657 22.6716 18.8243 22.6716 19.28 22.63C19.5896 22.5995 19.8776 22.4573 20.09 22.23C20.341 21.9063 20.5061 21.5245 20.57 21.12C20.6441 20.3317 20.6441 19.5382 20.57 18.75C20.53 17.27 20.61 15.7 20.63 14.14Z"
                                        />
                                        <path
                                            d="M9.75002 20.87C9.75002 20.35 9.61002 19.8 9.65002 19.25C9.71157 18.3786 9.99001 17.5364 10.46 16.8C10.625 16.5442 10.8538 16.3359 11.1239 16.1956C11.3939 16.0553 11.6959 15.9879 12 16C12.3171 15.9931 12.6319 16.0557 12.9221 16.1836C13.2124 16.3114 13.4711 16.5014 13.68 16.74C14.1293 17.2556 14.4056 17.8991 14.47 18.58C14.5336 19.3382 14.557 20.0993 14.54 20.86C14.54 21.15 15.16 21.31 15.29 20.86C15.4097 19.8468 15.4097 18.8231 15.29 17.81C15.1792 17.1492 14.9041 16.5268 14.49 16C14.1868 15.6329 13.8065 15.3369 13.3763 15.133C12.946 14.9291 12.4762 14.8223 12 14.82C11.5051 14.8196 11.0186 14.9486 10.5888 15.1942C10.1591 15.4397 9.80099 15.7934 9.55002 16.22C9.06705 17.1456 8.81975 18.176 8.83002 19.22C8.83598 19.7921 8.92009 20.3607 9.08002 20.91C9.20002 21.2 9.72002 21.2 9.75002 20.87Z"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1030_2183">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                {{__('Home')}}
                            </a>
                        </li>
                        <li @class(['current' => request()->routeIs('blog'), 'navigation__item']) >
                            <a href="{{route('blog')}}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1048_7469)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M22.46 11.11C22.22 10.73 21.74 10.72 21.29 10.78C19.4299 11.0784 17.6945 11.9044 16.29 13.16C15.3495 13.8068 14.589 14.6822 14.0799 15.7038C13.5709 16.7254 13.33 17.8597 13.38 19C13.3644 19.7486 13.4969 20.4929 13.77 21.19C13.1199 21.9826 12.5283 22.8215 12 23.7C12 23.93 12.29 24.12 12.62 23.91C13.7906 22.6924 14.8923 21.4104 15.92 20.07C16.8048 18.7595 17.6161 17.4007 18.35 16C18.3796 15.9344 18.3846 15.8603 18.3641 15.7912C18.3435 15.7222 18.2989 15.6629 18.2382 15.624C18.1776 15.5852 18.105 15.5695 18.0337 15.5798C17.9624 15.5901 17.8972 15.6256 17.85 15.68C13.98 20.79 14.53 20.08 14.1 20.68C14.0893 20.5135 14.0893 20.3465 14.1 20.18C13.9244 19.2338 13.9791 18.2592 14.2593 17.3385C14.5395 16.4178 15.0371 15.578 15.71 14.89C17.71 12.89 20.62 11.8 21.44 11.89C21.44 15.04 21.44 14.74 21.37 15.24L19.83 16.24C19.65 16.34 19.2 16.46 19.07 16.84C18.85 17.5 19.66 17.56 20.19 18.09C18.92 18.83 18.76 18.59 18.37 18.87C18.3029 18.9066 18.2436 18.9561 18.1957 19.0157C18.1477 19.0753 18.112 19.1437 18.0907 19.2172C18.0693 19.2906 18.0626 19.3675 18.0711 19.4435C18.0796 19.5195 18.103 19.5931 18.14 19.66C18.4568 19.9654 18.7906 20.2525 19.14 20.52C16.46 22.77 15.71 21.99 15.26 22.29C15.1994 22.3306 15.1529 22.3891 15.1272 22.4574C15.1014 22.5256 15.0977 22.6002 15.1164 22.6707C15.1351 22.7412 15.1754 22.8041 15.2316 22.8506C15.2879 22.8971 15.3572 22.9249 15.43 22.93C17.43 23.25 20.03 20.93 20.12 20.7C20.28 20.28 19.79 19.95 19.33 19.53C19.9934 19.2712 20.6411 18.9741 21.27 18.64C21.3518 18.6002 21.4224 18.5408 21.4756 18.467C21.5288 18.3933 21.5629 18.3075 21.5748 18.2173C21.5867 18.1271 21.576 18.0354 21.5438 17.9504C21.5115 17.8653 21.4587 17.7896 21.39 17.73L20.57 17C21.7 16.38 22.27 16.08 22.47 15.53C22.59 15.23 22.78 11.6 22.46 11.11Z"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M11.06 19C3.59999 19.11 6.76999 19.12 3.50999 18.73C3.01999 18.68 2.79999 18.31 2.65999 17.88C2.39999 17.03 2.46999 16.88 2.58999 8.55001C2.44715 6.88119 2.51772 5.20097 2.79999 3.55001C3.04999 2.55001 2.79999 2.17001 4.21999 2.19001C4.21999 2.53001 4.08999 3.82001 4.11999 4.04001C4.20999 4.80001 4.95999 4.69001 5.24999 4.77001C6.76999 5.13001 7.33999 3.99001 7.24999 2.40001C7.72608 2.54348 8.23389 2.54348 8.70999 2.40001C8.70999 2.51001 8.60999 3.78001 8.63999 3.96001C8.72999 4.72001 9.46999 4.60001 9.76999 4.68001C11.27 5.04001 11.84 3.94001 11.77 2.38001C12.45 2.58001 12.5 2.55001 13.5 2.32001C13.5 2.42001 13.42 3.70001 13.44 3.82001C13.4483 3.9667 13.5032 4.10691 13.5967 4.22023C13.6903 4.33354 13.8175 4.41404 13.96 4.45001C15.56 4.88001 16.5 4.45001 16.55 2.72001C16.8849 2.72927 17.2188 2.75933 17.55 2.81001C17.79 2.81001 17.99 2.89001 18.01 3.09001L18.38 10.02C18.372 10.0633 18.3736 10.1078 18.3847 10.1504C18.3959 10.193 18.4162 10.2326 18.4444 10.2664C18.4725 10.3003 18.5078 10.3275 18.5476 10.3462C18.5875 10.3649 18.631 10.3746 18.675 10.3746C18.719 10.3746 18.7625 10.3649 18.8023 10.3462C18.8422 10.3275 18.8774 10.3003 18.9056 10.2664C18.9338 10.2326 18.9541 10.193 18.9652 10.1504C18.9764 10.1078 18.978 10.0633 18.97 10.02C19.4101 7.67044 19.4101 5.25958 18.97 2.91001C18.73 1.91001 17.65 1.91001 16.59 2.00001C16.4949 1.4385 16.3127 0.895291 16.05 0.390008C15.9076 0.261696 15.7408 0.163324 15.5597 0.100739C15.3785 0.0381534 15.1866 0.0126324 14.9953 0.0256925C14.8041 0.0387527 14.6174 0.0901276 14.4464 0.176763C14.2754 0.263399 14.1236 0.383527 14 0.530008C13.8052 0.835332 13.6695 1.17455 13.6 1.53001C12.9338 1.37263 12.2352 1.42502 11.6 1.68001C11.5689 1.27637 11.4602 0.882519 11.28 0.520008C11.1353 0.385633 10.9646 0.282447 10.7783 0.21686C10.5921 0.151274 10.3943 0.124688 10.1974 0.138756C10.0004 0.152824 9.8085 0.207244 9.63347 0.298635C9.45845 0.390026 9.30409 0.516435 9.17999 0.670008C9.01679 0.93187 8.8985 1.21916 8.82999 1.52001C8.25618 1.40639 7.66246 1.44781 7.10999 1.64001C7.06707 1.2673 6.95874 0.905082 6.78999 0.570008C6.64816 0.400507 6.46049 0.275464 6.24945 0.209845C6.0384 0.144226 5.81292 0.140811 5.59999 0.200008C4.79999 0.320008 4.49999 0.870008 4.31999 1.65001C3.78674 1.54912 3.235 1.63754 2.75999 1.90001C2.24999 2.24001 2.21999 2.96001 2.07999 3.42001C1.69131 5.11133 1.51992 6.84532 1.56999 8.58001C1.37999 13.27 1.42999 11.77 1.35999 15.27C1.35999 17.17 1.35999 19.6 3.41999 19.75C6.75998 20 3.53999 20.12 11.07 19.7C11.1628 19.6987 11.2513 19.6605 11.316 19.594C11.3807 19.5274 11.4163 19.4378 11.415 19.345C11.4137 19.2522 11.3755 19.1637 11.3089 19.099C11.2424 19.0343 11.1528 18.9987 11.06 19ZM14.44 1.76001C14.52 0.270008 15.44 0.640008 15.5 0.930008C15.6164 1.66703 15.5995 2.41897 15.45 3.15001C15.29 3.70001 15.01 3.57001 14.45 3.56001C14.4768 2.96022 14.4735 2.35946 14.44 1.76001ZM9.83999 1.05001C10.04 0.650008 10.62 0.920008 10.7 0.890008C10.8555 1.68245 10.8555 2.49757 10.7 3.29001C10.61 3.59001 10.43 3.80001 10.05 3.69001H9.68999C9.68999 3.57001 9.74999 3.44001 9.74999 3.39001C9.61565 2.61232 9.64631 1.81508 9.83999 1.05001ZM5.34999 1.10001C5.54998 0.700008 6.12999 0.970008 6.20999 0.940008C6.36054 1.72956 6.36054 2.54045 6.20999 3.33001C6.11999 3.63001 5.93999 3.85001 5.55999 3.73001H5.19999C5.19999 3.61001 5.25999 3.48001 5.25999 3.43001C5.12676 2.65559 5.15742 1.86184 5.34999 1.10001Z"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M15.13 8.26C15.1699 8.22882 15.2031 8.19 15.2278 8.1458C15.2524 8.1016 15.268 8.05292 15.2736 8.00262C15.2792 7.95232 15.2747 7.90141 15.2603 7.85288C15.246 7.80434 15.222 7.75917 15.19 7.72C15 7.41 9.51999 7 6.85999 7.11C3.85999 7.31 4.28999 7.81 4.76999 7.92C5.80999 8.24 15.11 8.28 15.13 8.26Z"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M12 11.36C11.69 11.28 9.26 11.15 8.8 11.15C8.34 11.15 4.96 11.25 4.8 11.63C4.79095 11.6719 4.79166 11.7154 4.80206 11.757C4.81246 11.7986 4.83229 11.8373 4.86 11.87C5.46614 12.0898 6.10527 12.2048 6.75 12.21C8.50018 12.3327 10.258 12.2891 12 12.08C12.41 12.08 12.54 11.49 12 11.36Z"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M5.08001 16C6.5857 16.3349 8.14354 16.3621 9.66001 16.08C9.72352 16.0163 9.75918 15.93 9.75918 15.84C9.75918 15.75 9.72352 15.6637 9.66001 15.6C8.7244 15.2955 7.74356 15.1535 6.76001 15.18C4.47001 15.32 4.00001 15.82 5.08001 16Z"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1048_7469">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>


                                {{__('Blog')}}
                            </a>
                        </li>
                        @if(auth()->user() !== null)
                            <li @class(['current' => request()->routeIs('dashboard'), 'navigation__item'])
                            ><a href="{{route('dashboard')}}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1030_1911)">
                                            <path
                                                d="M3.48998 6.99995V5.54995C3.48998 5.09995 3.48998 4.54995 3.42998 4.09995C3.33998 2.92995 3.18998 1.81995 3.05998 0.699949C3.05869 0.653981 3.04835 0.608718 3.02955 0.566748C3.01076 0.524778 2.98387 0.486923 2.95044 0.455348C2.91701 0.423772 2.87768 0.399095 2.8347 0.382726C2.79173 0.366357 2.74595 0.358617 2.69998 0.359949C2.65401 0.361244 2.60875 0.371585 2.56678 0.390381C2.52481 0.409177 2.48696 0.436059 2.45538 0.469492C2.42381 0.502925 2.39913 0.542253 2.38276 0.585228C2.36639 0.628202 2.35865 0.673982 2.35998 0.719949C2.29998 1.84995 2.20998 2.99995 2.16998 4.09995V5.53995C2.16998 5.97995 2.23998 6.53995 2.23998 6.97995C2.23998 9.18995 3.23998 9.21995 3.41998 8.62995C3.49262 8.08986 3.51605 7.54428 3.48998 6.99995Z"
                                            />
                                            <path
                                                d="M11.41 7.26995C11.33 7.68995 11.34 11.27 11.26 13.36C11.19 14.95 11.16 16.54 11.15 18.13C11.14 19.72 11.15 21.57 11.29 23.29C11.2926 23.3943 11.3359 23.4935 11.4106 23.5664C11.4854 23.6392 11.5856 23.68 11.69 23.68C11.7952 23.6748 11.8944 23.6294 11.9671 23.553C12.0397 23.4767 12.0801 23.3753 12.08 23.27C12.08 21.27 12.29 19.19 12.41 17.15C12.5 15.79 12.57 14.41 12.57 13.04C12.5399 11.0809 12.4064 9.12488 12.17 7.17995C12.1 6.83995 11.47 6.90995 11.41 7.26995Z"
                                            />
                                            <path
                                                d="M3.21998 18.1099C3.22002 18.0188 3.18452 17.9313 3.12103 17.8659C3.05754 17.8006 2.97106 17.7626 2.87998 17.7599C2.78715 17.7599 2.69813 17.7968 2.63249 17.8625C2.56686 17.9281 2.52998 18.0171 2.52998 18.1099C2.42998 18.7699 2.29998 19.3999 2.22998 20.0599V20.8999V21.7399C2.28998 22.3899 2.38998 23.0299 2.45998 23.7399C2.47498 23.8339 2.52299 23.9195 2.59538 23.9812C2.66778 24.043 2.75982 24.0769 2.85498 24.0769C2.95014 24.0769 3.04218 24.043 3.11458 23.9812C3.18697 23.9195 3.23498 23.8339 3.24998 23.7399C3.31998 23.0799 3.42998 22.4399 3.47998 21.7399V20.8999C3.49994 20.6203 3.49994 20.3396 3.47998 20.0599C3.44998 19.3999 3.31998 18.7699 3.21998 18.1099Z"
                                            />
                                            <path
                                                d="M20.84 6.50997V5.06997C20.84 4.62997 20.84 4.06997 20.78 3.61997C20.68 2.48997 20.53 1.37997 20.4 0.259973C20.4 0.167147 20.3631 0.0781235 20.2975 0.0124858C20.2319 -0.053152 20.1428 -0.0900269 20.05 -0.0900269C19.9572 -0.0900269 19.8682 -0.053152 19.8025 0.0124858C19.7369 0.0781235 19.7 0.167147 19.7 0.259973C19.64 1.38997 19.54 2.49997 19.51 3.62997V5.07997C19.51 5.52997 19.58 6.07997 19.58 6.51997C19.58 8.72997 20.58 8.75997 20.75 8.16997C20.8376 7.62127 20.8677 7.06493 20.84 6.50997Z"
                                            />
                                            <path
                                                d="M3.35 9.65999C3.05926 9.62701 2.76504 9.64392 2.48 9.70999C0.349996 10.12 -0.440004 11.71 -0.140004 13.11C0.659996 16.85 8 16.63 6.7 12.18C6.46694 11.4674 6.02066 10.8436 5.42151 10.3929C4.82237 9.94218 4.09927 9.68635 3.35 9.65999ZM0.999996 12.93C0.869996 11.93 1.49 11.02 3 10.93C3.56061 10.8537 4.1305 10.9705 4.61582 11.2614C5.10114 11.5522 5.47294 11.9996 5.67 12.53C6.81 15.72 1.35 15.87 0.999996 12.93Z"
                                            />
                                            <path
                                                d="M11.29 0.419991C8.83997 0.689991 7.97997 2.41999 8.28997 3.92999C8.44537 4.6152 8.82471 5.22907 9.36801 5.67457C9.91131 6.12008 10.5876 6.37182 11.29 6.38999C13.35 6.54999 16 6.14999 15.08 2.99999C14.8287 2.20747 14.3185 1.52233 13.6312 1.05448C12.9439 0.586623 12.1194 0.363179 11.29 0.419991ZM12 5.72999C11.3995 5.78765 10.7998 5.61216 10.3251 5.23986C9.85039 4.86755 9.53706 4.32695 9.44997 3.72999C9.31997 2.72999 9.93997 1.81999 11.45 1.72999C12.0114 1.65802 12.5806 1.77789 13.0653 2.07015C13.5499 2.36241 13.9216 2.80991 14.12 3.33999C15.05 5.99999 12 5.71999 12 5.72999Z"
                                            />
                                            <path
                                                d="M20.7 9.20996C20.4086 9.18537 20.1152 9.20561 19.83 9.26996C17.7 9.67996 16.91 11.27 17.21 12.67C18.01 16.41 25.35 16.19 24.05 11.74C23.8173 11.0263 23.3715 10.4011 22.7724 9.94868C22.1734 9.49628 21.4501 9.23846 20.7 9.20996ZM18.31 12.48C18.18 11.48 18.8 10.57 20.31 10.48C20.8745 10.4032 21.4484 10.5208 21.9372 10.8133C22.4261 11.1059 22.8009 11.5561 23 12.09C24.16 15.28 18.7 15.43 18.31 12.48Z"
                                            />
                                            <path
                                                d="M20.57 17.6699C20.5701 17.5788 20.5346 17.4913 20.4711 17.4259C20.4076 17.3606 20.3211 17.3225 20.23 17.3199C20.1841 17.3199 20.1385 17.329 20.0961 17.3466C20.0536 17.3642 20.015 17.39 19.9825 17.4225C19.95 17.455 19.9242 17.4935 19.9067 17.536C19.8891 17.5785 19.88 17.624 19.88 17.6699C19.78 18.3199 19.65 18.9599 19.58 19.6199V20.4599V21.2899C19.64 21.9499 19.74 22.5899 19.81 23.2899C19.825 23.3839 19.873 23.4695 19.9454 23.5312C20.0178 23.593 20.1099 23.6269 20.205 23.6269C20.3002 23.6269 20.3922 23.593 20.4646 23.5312C20.537 23.4695 20.585 23.3839 20.6 23.2899C20.67 22.6299 20.78 21.9899 20.83 21.2899V20.4599C20.85 20.1803 20.85 19.8996 20.83 19.6199C20.8 18.9999 20.67 18.3299 20.57 17.6699Z"
                                            />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1030_1911">
                                                <rect width="24" height="24" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                    Dashboard</a></li>
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
