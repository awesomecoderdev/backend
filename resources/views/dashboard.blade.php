<x-app-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    {{-- diclare variables --}}
    <script>
        var ordersArr = {{ $ordersArr }};
        var orders = @json($orders);
        var users = @json($users);
        var last12MonthsOrders = orders.map((order) => {
            var tday = new Date(order.year + "-" + order.month + "-1");
            return tday.toLocaleDateString('en-us', {
                /* year: "numeric", */
                month: "short",
            });
        });

        var last12MonthsUsersData = [];
        users.map((user) => {
            var tday = new Date(user.year + "-" + user.month + "-1");
            var key = tday.toLocaleDateString('en-us', {
                /* year: "numeric", */
                year: "numeric",
                month: "short",
            });
            last12MonthsUsersData[key] = user.count;
        });

        var getLast12Months = (arr = false) => {
            var months = [];
            var currentDate = new Date();
            for (let i = 0; i < 12; i++) {
                var month = new Date(currentDate.getFullYear(), currentDate.getMonth() - i, 1);
                month = month.toLocaleDateString('en-us', {
                    /* year: "numeric", */
                    year: "numeric",
                    month: "short",
                });

                if (arr) {
                    months.push({
                        date: month,
                        value: 0,
                    });
                } else {
                    months.push(month);
                }
            }
            return months.reverse();
        };

        const getLast12MonthsNames = () => {
            var months = [];
            var currentDate = new Date();
            for (let i = 0; i < 12; i++) {
                var month = new Date(currentDate.getFullYear(), currentDate.getMonth() - i, 1);
                month = month.toLocaleDateString('en-us', {
                    /* year: "numeric", */
                    month: "short",
                });

                months.push(month);
            }
            return months.reverse();
        };

        var usersData = getLast12Months(true).map((month) => {
            if (last12MonthsUsersData[month.date] !== undefined) {
                return last12MonthsUsersData[month.date];
            } else {
                return 0;
            }
        });
    </script>
    <x-content>
        <div class="w-full relative mx-auto">
            <div class="relative">
                <div class=" grid xl:grid-cols-6 lg:grid-cols-3 md:grid-cols-2 gap-6 ">
                    <div
                        class=" relative transition-all cursor-pointer bg-white dark:bg-gray-900 hover:bg-zinc-50 dark:hover:bg-gray-800 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div class="relative overflow-hidden rounded-xl xl:p-3 lg:p-4 p-6">
                            <span class="absolute text-emerald-400 right-3 top-3 text-2xl font-bold">
                                +42%
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8 text-transparent">
                                <defs>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient"
                                        gradientTransform="matrix(0 21 -21 0 12 11)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient-dark"
                                        gradientTransform="matrix(0 24.5 -24.5 0 16 5.5)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                </defs>
                                <path stroke-linecap="round" stroke-linejoin="round" fill="url(#:r4:-gradient-dark)"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />

                            </svg>

                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Clients') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ $totalUsers }}
                            </p>
                        </div>
                    </div>
                    <div
                        class=" relative transition-all cursor-pointer bg-white dark:bg-gray-900 hover:bg-zinc-50 dark:hover:bg-gray-800 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div class="relative overflow-hidden rounded-xl xl:p-3 lg:p-4 p-6">
                            <span class="absolute text-red-500 right-3 top-3 text-2xl font-bold">
                                -22%
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-transparent">
                                <defs>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient"
                                        gradientTransform="matrix(0 21 -21 0 12 11)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient-dark"
                                        gradientTransform="matrix(0 24.5 -24.5 0 16 5.5)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                </defs>
                                <path stroke-linecap="round" stroke-linejoin="round" fill="url(#:r4:-gradient)"
                                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                            </svg>
                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('New') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ $newUsers }}
                            </p>
                        </div>
                    </div>
                    <div
                        class=" relative transition-all cursor-pointer bg-white dark:bg-gray-900 hover:bg-zinc-50 dark:hover:bg-gray-800 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div class="relative overflow-hidden rounded-xl xl:p-3 lg:p-4 p-6">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-transparent">
                                <defs>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient"
                                        gradientTransform="matrix(0 21 -21 0 12 11)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient-dark"
                                        gradientTransform="matrix(0 24.5 -24.5 0 16 5.5)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                </defs>
                                <path stroke-linecap="round" stroke-linejoin="round" fill="url(#:r4:-gradient)"
                                    d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                            </svg>
                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Admins') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ $newUsers }}
                            </p>
                        </div>
                    </div>
                    <div
                        class=" relative transition-all cursor-pointer bg-white dark:bg-gray-900 hover:bg-zinc-50 dark:hover:bg-gray-800 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div class="relative overflow-hidden rounded-xl xl:p-3 lg:p-4 p-6">
                            <span class="absolute text-emerald-400 right-3 top-3 text-2xl font-bold">
                                +42%
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-transparent">
                                <defs>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient"
                                        gradientTransform="matrix(0 21 -21 0 12 11)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient-dark"
                                        gradientTransform="matrix(0 24.5 -24.5 0 16 5.5)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                </defs>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke="url(#:r4:-gradient-dark)"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />

                            </svg>



                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Websites') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ $totalUsers }}
                            </p>
                        </div>
                    </div>
                    <div
                        class=" relative transition-all cursor-pointer bg-white dark:bg-gray-900 hover:bg-zinc-50 dark:hover:bg-gray-800 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div class="relative overflow-hidden rounded-xl xl:p-3 lg:p-4 p-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-transparent">
                                <defs>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient"
                                        gradientTransform="matrix(0 21 -21 0 12 11)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                    <radialGradient cx="0" cy="0" r="1"
                                        gradientUnits="userSpaceOnUse" id=":r4:-gradient-dark"
                                        gradientTransform="matrix(0 24.5 -24.5 0 16 5.5)">
                                        <stop stop-color="#0EA5E9"></stop>
                                        <stop stop-color="#22D3EE" offset=".527"></stop>
                                        <stop stop-color="#818CF8" offset="1"></stop>
                                    </radialGradient>
                                </defs>
                                <path stroke-linecap="round" fill="url(#:r4:-gradient)" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>


                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Sales') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                ${{ number_format(2300.5454, 2) }}
                            </p>
                        </div>
                    </div>
                    <div
                        class=" relative transition-all cursor-pointer bg-white dark:bg-gray-900 hover:bg-zinc-50 dark:hover:bg-gray-800 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div class="relative overflow-hidden rounded-xl xl:p-3 lg:p-4 p-6">
                            <span
                                class="absolute {{ $orderPercentageIncrease >= 0 ? 'text-emerald-400' : 'text-red-400' }} right-3 top-3 text-2xl font-bold">
                                {{ $orderPercentageIncrease >= 0 ? "+$orderPercentageIncrease%" : "$orderPercentageIncrease%" }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" class="w-8 h-8 text-[#0EA5E9]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                            </svg>


                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Orders') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ number_format($lastWeekOrders, 0) }}
                            </p>
                        </div>
                    </div>

                </div>
                {{-- charts --}}
                <div
                    class="relative w-full h-full grid xl:grid-cols-2 md:grid-cols-1 grid-cols-1 py-6 gap-6 dark:text-zinc-100">
                    <div
                        class="border border-slate-200 dark:border-slate-800 relative w-full h-full rounded-2xl border-solid bg-gradient-to-tl from-[rgba(155,102,255,0.03)] to-[rgba(89,216,210,0.03)] dark:from-[rgba(156,102,255,0.01)] dark:to-[rgba(17,239,228,0.01)] bg-clip-border ">

                        <div class=" relative gird break-words ">
                            <div class=" border-slate-600 rounded-t-2xl border-b-0 border-solid p-4 pb-8">
                                <h4 class="font-semibold text-lg">{{ __('Users overview') }}</h4>
                                <p class="leading-normal text-xs font-medium">
                                    <i class="fa fa-arrow-up text-emerald-400" aria-hidden="true"></i>
                                    <span class="font-semibold ">{{ $totalUsersLast12Months }}</span>
                                    {{ __('users in last 12 months') }}
                                </p>
                            </div>
                            <div class="relative">
                                <div class=" pr-1  rounded-b-xl">
                                    <div>
                                        <canvas id="chart-bars" height="340"
                                            style="display: block; box-sizing: border-box;height: var(--canvas-height); width: 415.8px;"
                                            width="831"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="border border-slate-200 dark:border-slate-800 relative w-full h-full rounded-2xl border-solid bg-gradient-to-tl from-[rgba(155,102,255,0.03)] to-[rgba(89,216,210,0.03)] dark:from-[rgba(156,102,255,0.01)] dark:to-[rgba(17,239,228,0.01)] bg-clip-border">

                        <div class=" relative flex min-w-0 flex-col break-words z-50 ">
                            <div class="border-slate-600 mb-0 rounded-t-2xl border-b-0 border-solid p-4 pb-0">
                                <h4 class="font-semibold text-lg">{{ __('Orders overview') }}</h4>
                                <p class="leading-normal text-xs font-medium">
                                    <i class="fa fa-arrow-up text-emerald-400" aria-hidden="true"></i>
                                    <span class="font-semibold ">{{ $totalOrders }}</span>
                                    {{ __('orders in last 12 months') }}
                                </p>
                            </div>
                            <div class="flex-auto p-4 ">
                                <div id="chart">
                                    <div class="relative opacity-30 animate-pulse "
                                        style="height: var(--canvas-height);">
                                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                                        <div class="mb-5 w-2/5 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-4/6 mb-2.5">
                                        </div>
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
        </div>

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
                        labels: getLast12MonthsNames(),
                        datasets: [{
                            label: "{{ __('Users') }}",
                            tension: 0.4,
                            borderWidth: 0,
                            borderRadius: 4,
                            borderSkipped: false,
                            backgroundColor: isDarkMode ? "#6366f1" : "#3A416F",
                            backgroundColor: isDarkMode ? "#a5b4fc" : "#818cf8",
                            data: usersData,
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
                                    suggestedMin: 0,
                                    suggestedMax: 1000,
                                    beginAtZero: true,
                                    padding: 25,

                                    font: {
                                        size: 11,
                                        family: "'Poppins', sans-serif",
                                        style: "normal",
                                        lineHeight: 2,
                                    },
                                    color: isDarkMode ? "#b2b9bf" : "#3A416F",

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

                var ctx2 = document.getElementById("chart-line").getContext("2d");

                var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
                gradientStroke1.addColorStop(1, "rgba(99,102,241,0.1)");
                gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
                gradientStroke1.addColorStop(0, "rgba(203,12,159,0)");

                var color = ctx2.createLinearGradient(0, 230, 0, 50);
                color.addColorStop(1, "rgba(129,140,248,0.2)");
                color.addColorStop(0.2, "rgba(129,140,248,0.1)");
                color.addColorStop(0, "rgba(129,140,248,0.05)");

                /*
                ordersArr = [
                    1, 2, 3, 2, 5, 6, 7, 5, 8, 10, 11, 30,
                    1, 2, 3, 2, 3, 2, 1, 2, 3, 4, 2, 3,
                    30, 40, 45, 50, 55, 50, 40, 35, 45, 60, 55, 65,

                ];
                ordersArr = [
                    30, 40, 45, 50, 55, 50, 40, 35, 45, 60, 55, 65,
                    30, 40, 45, 50, 55, 50, 40, 35, 45, 60, 55, 65,
                    30, 40, 45, 50, 55, 50, 40, 35, 45, 60, 55, 65,
                ];

                last12MonthsOrders = [
                    30, 40, 45, 50, 55, 50, 40, 35, 45, 60, 55, 65,
                    30, 40, 45, 50, 55, 50, 40, 35, 45, 60, 55, 65,
                    30, 40, 45, 50, 55, 50, 40, 35, 45, 60, 55, 65,
                ];
                */


                new Chart(ctx2, {
                    type: "line",
                    data: {
                        labels: last12MonthsOrders,
                        datasets: [{
                            label: "{{ __('Orders ') }}",
                            tension: 0.4,
                            borderWidth: 0,
                            pointRadius: 0,
                            borderColor: isDarkMode ? "#a5b4fc" : "#818cf8",
                            borderWidth: 2,
                            backgroundColor: color,
                            fill: true,
                            data: ordersArr,
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

            } else {
                window.location.reload();
            };
        </script>
    </x-content>
</x-app-layout>
