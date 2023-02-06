@php
    $orderPercentageIncrease = 2000;
    $totalUsers = 499;
    $newUsers = 1;
    $lastWeekOrders = 343;
@endphp
<x-client-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    {{-- diclare variables --}}
    <script>
        var ordersArr = [];
        var orders = [];
        var last12MonthsOrders = [];
    </script>
    <x-client>
        <div class="w-full relative mx-auto">
            <div class="relative">
                <div class=" grid lg:grid-cols-4 md:grid-cols-2 gap-6 ">
                    <a href="{{ base(route('client.websites.index')) }}"
                        class=" relative transition-all cursor-pointer bg-white dark:bg-gray-900 hover:bg-zinc-50 dark:hover:bg-gray-800 rounded-xl border border-slate-200 dark:border-slate-800">
                        <div class="relative overflow-hidden rounded-xl xl:p-3 lg:p-4 p-6">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke="url(#:r4:-gradient-dark)"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />

                            </svg>



                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Websites') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ $totalUsers }}
                            </p>
                        </div>
                    </a>
                    <a href="{{ base(route('client.websites.index', ['status' => 'approved'])) }}"
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke="url(#:r4:-gradient-dark)"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />

                            </svg>



                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Approved') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ $totalUsers }}
                            </p>
                        </div>
                    </a>
                    <a href="{{ base(route('client.websites.index', ['status' => 'blocked'])) }}"
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
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke="url(#:r4:-gradient-dark)"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />

                            </svg>



                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Blocked') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ $totalUsers }}
                            </p>
                        </div>
                    </a>

                    <a href="{{ base(route('client.orders.index')) }}"
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
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke="url(#:r4:-gradient-dark)"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>

                            <h2 class="mt-4 font-display text-base font-semibold text-slate-900 dark:text-white">
                                {{ __('Orders') }}
                            </h2>
                            <p class="mt-1 text-2xl font-bold text-slate-700 dark:text-slate-400">
                                {{ number_format($lastWeekOrders, 0) }}
                            </p>
                        </div>
                    </a>

                </div>
            </div>
        </div>

    </x-client>
</x-client-layout>
