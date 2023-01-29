<x-client-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>

        <div class="w-full relative mx-auto">

            <div class="flex flex-wrap -mx-3">

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow drop-shadow-lg rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm">Today's Money</p>
                                        <h5 class="mb-0 font-bold">
                                            $53,000
                                            <span
                                                class="leading-normal text-sm font-weight-bolder text-lime-500">+55%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-primary-700 to-blue-500">
                                        <i
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow drop-shadow-lg rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm">Today's Users</p>
                                        <h5 class="mb-0 font-bold">
                                            2,300
                                            <span
                                                class="leading-normal text-sm font-weight-bolder text-lime-500">+3%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-primary-700 to-blue-500">
                                        <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow drop-shadow-lg rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm">New Clients</p>
                                        <h5 class="mb-0 font-bold">
                                            +3,462
                                            <span
                                                class="leading-normal text-red-600 text-sm font-weight-bolder">-2%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-primary-700 to-blue-500">
                                        <i
                                            class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 dark:border-gray-700 shadow drop-shadow-lg rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans font-semibold leading-normal text-sm">Sales</p>
                                        <h5 class="mb-0 font-bold">
                                            $103,430
                                            <span
                                                class="leading-normal text-sm font-weight-bolder text-lime-500">+5%</span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-primary-700 to-blue-500">
                                        <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="relative w-full h-full grid lg:grid-cols-2 md:grid-cols-1 grid-cols-1 mt-6 gap-6">
                <div
                    class="relative w-full h-full border-slate-400 dark:border-gray-700 shadow drop-shadow-lg rounded-2xl border-0 border-solid bg-gray-50 dark:bg-gray-800 bg-clip-border">
                    <div class=" relative flex min-w-0 flex-col break-words ">
                        <div class="flex-auto p-4">
                            <div class="py-4 pr-1 mb-4 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-xl">
                                <div>
                                    <canvas id="chart-bars" height="340"
                                        style="display: block; box-sizing: border-box; height: 170px; width: 415.8px;"
                                        width="831"></canvas>
                                </div>
                            </div>
                            <h6 class="mt-6 mb-0 ml-2">Active Users</h6>
                            <p class="ml-2 leading-normal text-sm">(<span class="font-bold">+23%</span>) than last
                                week</p>
                            <div class="w-full px-6 mx-auto max-w-screen-2xl rounded-xl">
                                <div class="flex flex-wrap mt-0 -mx-3">
                                    <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
                                        <div class="flex mb-2">
                                            <div
                                                class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-primary-700 to-blue-500 text-neutral-900">
                                                <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>document</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-1870.000000, -591.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(154.000000, 300.000000)">
                                                                    <path class="color-background"
                                                                        d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                                        opacity="0.603585379"></path>
                                                                    <path class="color-background"
                                                                        d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <p class="mt-1 mb-0 font-semibold leading-tight text-xs">Users</p>
                                        </div>
                                        <h4 class="font-bold">36K</h4>
                                        <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                            <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                                role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
                                        <div class="flex mb-2">
                                            <div
                                                class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-blue-600 to-cyan-400 text-neutral-900">
                                                <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>spaceship</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-1720.000000, -592.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(4.000000, 301.000000)">
                                                                    <path class="color-background"
                                                                        d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                                                    </path>
                                                                    <path class="color-background"
                                                                        d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                                                    </path>
                                                                    <path class="color-background"
                                                                        d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"
                                                                        opacity="0.598539807"></path>
                                                                    <path class="color-background"
                                                                        d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"
                                                                        opacity="0.598539807"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <p class="mt-1 mb-0 font-semibold leading-tight text-xs">Clicks</p>
                                        </div>
                                        <h4 class="font-bold">2m</h4>
                                        <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                            <div class="duration-600 ease-soft -mt-0.38 w-9/10 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                                role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
                                        <div class="flex mb-2">
                                            <div
                                                class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-red-500 to-yellow-400 text-neutral-900">
                                                <svg width="10px" height="10px" viewBox="0 0 43 36"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <p class="mt-1 mb-0 font-semibold leading-tight text-xs">Sales</p>
                                        </div>
                                        <h4 class="font-bold">435$</h4>
                                        <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                            <div class="duration-600 ease-soft -mt-0.38 w-3/10 -ml-px flex h-1.5 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                                role="progressbar" aria-valuenow="30" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
                                        <div class="flex mb-2">
                                            <div
                                                class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-red-600 to-rose-400 text-neutral-900">
                                                <svg width="10px" height="10px" viewBox="0 0 40 40"
                                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>settings</title>
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g transform="translate(-2020.000000, -442.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(304.000000, 151.000000)">
                                                                    <polygon class="color-background"
                                                                        opacity="0.596981957"
                                                                        points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                                    </polygon>
                                                                    <path class="color-background"
                                                                        d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                                        opacity="0.596981957"></path>
                                                                    <path class="color-background"
                                                                        d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <p class="mt-1 mb-0 font-semibold leading-tight text-xs">Items</p>
                                        </div>
                                        <h4 class="font-bold">43</h4>
                                        <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                            <div class="duration-600 ease-soft -mt-0.38 -ml-px flex h-1.5 w-1/2 flex-col justify-center overflow-hidden whitespace-nowrap rounded-lg bg-slate-700 text-center text-white transition-all"
                                                role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="relative w-full h-full border-slate-400 dark:border-gray-700 shadow drop-shadow-lg rounded-2xl border-0 border-solid bg-gray-50 dark:bg-gray-800 bg-clip-border">
                    <div class=" relative flex min-w-0 flex-col break-words ">
                        <div
                            class="border-slate-600 mb-0 rounded-t-2xl border-b-0 border-solid bg-gray-50 dark:bg-gray-800 p-4 pb-0">
                            <h4 class="font-semibold text-md">Sales overview</h4>
                            <p class="leading-normal text-xs font-medium">
                                <i class="fa fa-arrow-up text-lime-500" aria-hidden="true"></i>
                                <span class="font-semibold ">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="flex-auto p-4 ">
                            <div id="chart">
                                <div class="relative opacity-30 animate-pulse " style="height: var(--canvas-height);">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                                    <div class="mb-5 w-2/5 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-4/6 mb-2.5"></div>
                                    <div class="mb-5 w-4/5 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                                    <div class="mb-10 w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                    <div class="flex items-baseline mt-4 space-x-6">
                                        <div class="w-full h-40 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-28 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-40 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-30 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-28 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-40 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-30 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-40 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-40 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                        <div class="w-full h-24 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        {{-- for charts --}}
        <script>
            if (typeof Chart !== 'undefined') {

                if (document.getElementById("chart")) {
                    document.getElementById("chart").innerHTML =
                        '<canvas id="chart-line" height="600" style = "display: block; box-sizing: border-box; height: var(--canvas-height); width: 610.2px;" width = "1220" > < /canvas > ';
                }

                var ctx = document.getElementById("chart-bars").getContext("2d");
                new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Sales",
                            tension: 0.4,
                            borderWidth: 0,
                            borderRadius: 4,
                            borderSkipped: false,
                            backgroundColor: "#fff",
                            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                            maxBarThickness: 6,
                        }, ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                        },
                        interaction: {
                            intersect: false,
                            mode: "index",
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    suggestedMin: 0,
                                    suggestedMax: 600,
                                    beginAtZero: true,
                                    padding: 15,
                                    font: {
                                        size: 14,
                                        family: "Open Sans",
                                        style: "normal",
                                        lineHeight: 2,
                                    },
                                    color: "#fff",
                                },
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                },
                                ticks: {
                                    display: false,
                                },
                            },
                        },
                    },
                });

                var ctx2 = document.getElementById("chart-line").getContext("2d");

                var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
                gradientStroke1.addColorStop(1, "rgba(99,102,241,0.1)");
                gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
                gradientStroke1.addColorStop(0, "rgba(203,12,159,0)");

                var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
                gradientStroke2.addColorStop(1, "rgba(20,23,39,0.1)");
                gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
                gradientStroke2.addColorStop(0, "rgba(20,23,39,0)");


                new Chart(ctx2, {
                    type: "line",
                    data: {
                        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Mobile apps",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: "#6366f1",
                            borderWidth: 3,
                            backgroundColor: gradientStroke1,
                            fill: true,
                            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                            maxBarThickness: 6,
                        }, ],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                        },
                        interaction: {
                            intersect: false,
                            mode: "index",
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                    borderDash: [5, 5],
                                },
                                ticks: {
                                    display: true,
                                    padding: 0,
                                    color: isDarkMode ? "#b2b9bf" : "#3A416F",
                                    font: {
                                        size: 11,
                                        family: "'Poppins', sans-serif",
                                        style: "normal",
                                        lineHeight: 2,
                                    },
                                },
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [5, 5],
                                },
                                ticks: {
                                    display: true,
                                    color: isDarkMode ? "#b2b9bf" : "#3A416F",
                                    padding: 0,
                                    font: {
                                        size: 11,
                                        family: "'Poppins', sans-serif",
                                        style: "normal",
                                        lineHeight: 2,
                                    },
                                },
                            },
                        },
                    },
                });
            };
        </script>
    </x-client>
</x-client-layout>
