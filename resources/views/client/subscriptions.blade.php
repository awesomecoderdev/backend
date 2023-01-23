@php
    $key = time();
@endphp
<x-client-layout>
    @section('head')
        <title>{{ __('Subscriptions') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <div class="relative">
            <form action="{{ route('client.subscriptions.payment') }}" id="checkout" method="post">
                @csrf
                <div class="grid w-full gap-6 md:grid-cols-3">
                    <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                        <input type="radio" id="free" name="plan" @checked(true) value="free"
                            class="hidden peer">
                        <label for="free"
                            class="inline-flex max-w-sm mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700">
                            <div class="relative" @click="open = !open">
                                <div class="p-3">
                                    <h1
                                        class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                                        {{ __('Free') }}
                                    </h1>

                                    <p class="mt-4 text-gray-500 dark:text-gray-300">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quam
                                        voluptatibus
                                    </p>

                                    <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-4xl dark:text-gray-300">
                                        $0.00
                                        <span class="text-base font-medium">/Month</span>
                                    </h2>

                                    <p class="mt-1 text-gray-500 dark:text-gray-300">
                                        Monthly payment
                                    </p>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700" style="display: none;" x-show="open"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95">

                                <div class="p-3 " style="display: none;" x-show="open"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95">
                                    <h1 class="text-lg font-medium text-gray-700 capitalize lg:text-xl dark:text-white">
                                        What’s included:</h1>

                                    <div class="mt-8 space-y-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">All limited links</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Own analytics
                                                platform</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Chat support</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Optimize hashtags</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Mobile app</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Unlimited users</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">

                        <input type="radio" id="essential" name="plan" value="price_1MTSfvIX4CRni5u3wdGvV2c2"
                            class="hidden peer">
                        <label for="essential"
                            class="inline-flex max-w-sm mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700">

                            <div class="relative" @click="open = !open">
                                <div class="p-3">
                                    <h1
                                        class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                                        {{ __('Essential') }}
                                    </h1>

                                    <p class="mt-4 text-gray-500 dark:text-gray-300">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quam
                                        voluptatibus
                                    </p>

                                    <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-4xl dark:text-gray-300">
                                        $30.00
                                        <span class="text-base font-medium">/Month</span>
                                    </h2>

                                    <p class="mt-1 text-gray-500 dark:text-gray-300">
                                        Monthly payment
                                    </p>

                                </div>

                                <hr class="border-gray-200 dark:border-gray-700" style="display: none;"
                                    x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95">

                                <div class="p-3 " style="display: none;" x-show="open"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95">
                                    <h1
                                        class="text-lg font-medium text-gray-700 capitalize lg:text-xl dark:text-white">
                                        What’s included:</h1>

                                    <div class="mt-8 space-y-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">All limited
                                                links</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Own analytics
                                                platform</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Chat support</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Optimize
                                                hashtags</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Mobile app</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Unlimited users</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
                        <input type="radio" id="premium" name="plan" value="price_1MTSfvIX4CRni5u37Kpj3wLK"
                            class="hidden peer">
                        <label for="premium"
                            class="inline-flex max-w-sm mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700">

                            <div class="relative" @click="open = !open">

                                <div class="p-3 hi">
                                    <h1
                                        class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                                        <h1
                                            class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                                            {{ __('Premium') }}</h1>
                                    </h1>

                                    <p class="mt-4 text-gray-500 dark:text-gray-300">
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum quam
                                        voluptatibus
                                    </p>

                                    <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-4xl dark:text-gray-300">
                                        $59.00
                                        <span class="text-base font-medium">/Month</span>
                                    </h2>

                                    <p class="mt-1 text-gray-500 dark:text-gray-300">
                                        Monthly payment
                                    </p>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700" style="display: none;"
                                    x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95">

                                <div class="p-3 " style="display: none;" x-show="open"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95">
                                    <h1
                                        class="text-lg font-medium text-gray-700 capitalize lg:text-xl dark:text-white">
                                        What’s included:</h1>

                                    <div class="mt-8 space-y-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">All limited
                                                links</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Own analytics
                                                platform</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Chat support</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Optimize
                                                hashtags</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Mobile app</span>
                                        </div>

                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                            <span class="mx-4 text-gray-700 dark:text-gray-300">Unlimited users</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="grid w-full gap-6 md:grid-cols-3">
                    <div class="col-span-2 relative p-5">
                    </div>
                    <div class="relative my-2 p-1 text-gray-900 dark:text-white">
                        <div class="relative">
                            <label for="card-holder-name"
                                class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Cardholder\'s name') }}</label>
                            <input type="text" name="card-holder-name" id="card-holder-name"
                                autocomplete="address" placeholder="{{ __('Cardholder\'s name') }}"
                                class="my-1 p-2 block w-full rounded-md @error('card-holder-name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                        </div>

                        <label for="card" class="contents text-base font-medium py-2">
                            {{ __('Credit or debit card') }}
                        </label>
                        <div id="card"
                            class=" bg-white dark:bg-slate-800 border text-red p-2.5 mt-2 block w-full rounded-md focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 shadow-sm sm:text-sm">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display Element errors. -->
                        <div role="alert">
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                <span id="card-errors" class="font-medium">
                                </span>
                            </p>
                        </div>


                        <div class="relative">
                            <button type="submit" id="checkoutBtn"
                                class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-300 transform bg-primary-600 rounded-md hover:bg-primary-500 focus:outline-none focus:bg-primary-500 focus:ring focus:ring-primary-300 focus:ring-opacity-80"
                                data-secret="{{ $intent->client_secret }}">{{ __('Subscribe Now') }}</button>
                        </div>

                    </div>

                </div>
            </form>
        </div>
        <script>
            let stripe{{ $key }} = Stripe("{{ config('cashier.key') }}");
            let elements{{ $key }} = stripe{{ $key }}.elements();
            var cardHolderName = document.getElementById('card-holder-name');
            var clientSecret = document.getElementById('checkoutBtn').dataset.secret;
            console.log('darkMode', isDarkMode);

            // Create an instance of the card Element.
            let card{{ $key }} = elements{{ $key }}.create('card', {
                style: {
                    base: {
                        iconColor: isDarkMode ? '#fff' : "#1e293b",
                        color: isDarkMode ? '#fff' : "#1e293b",
                        fontWeight: '500',
                        fontFamily: '"Poppins",Roboto, Open Sans, Segoe UI, sans-serif',
                        fontSize: '14px',
                        fontSmoothing: 'antialiased',
                        ':-webkit-autofill': {
                            color: isDarkMode ? '#fff' : "#fce883",
                        },
                        '::placeholder': {
                            color: isDarkMode ? '#fff' : "#1e293b",
                        },
                    },
                    invalid: {
                        // iconColor: '#FFC7EE',
                        // color: '#FFC7EE',
                    },
                },
            });
            // Add an instance of the card Element into the `card` <div>.
            card{{ $key }}.mount('#card');

            // Create a token or display an error when the form is submitted.
            let form{{ $key }} = document.getElementById('checkout');
            form{{ $key }}
                .addEventListener('submit', async (event) => {
                    event.preventDefault();

                    const {
                        setupIntent,
                        error
                    } = await stripe{{ $key }}.confirmCardSetup(
                        clientSecret, {
                            payment_method: {
                                card: card{{ $key }},
                                billing_details: {
                                    name: cardHolderName.value
                                }
                            }
                        }
                    );

                    if (error) {
                        // Inform the customer that there was an error.
                        let errorElement{{ $key }} = document.getElementById('card-errors');
                        let notifications{{ $key }} = document.getElementById('notifications');
                        errorElement{{ $key }}.innerText = `{{ __('Oops!') }} ${error.message}`;
                    } else {
                        // The card has been verified successfully...
                    }
                });


            let stripe{{ $key }}TokenHandler = (token) => {
                // Insert the token ID into the form so it gets submitted to the server
                let form{{ $key }} = document.getElementById('checkout');
                let hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form{{ $key }}.appendChild(hiddenInput);

                // Submit the form
                form{{ $key }}.submit();
            }
        </script>
    </x-client>

</x-client-layout>

@php
    return false;
@endphp
<script>
    // let {
    //     token,
    //     error
    // } = await stripe{{ $key }}.createToken(card{{ $key }});

    // if (error) {
    //     // Inform the customer that there was an error.
    //     let errorElement{{ $key }} = document.getElementById('card-errors');
    //     let notifications{{ $key }} = document.getElementById('notifications');
    //     errorElement{{ $key }}.innerText = `{{ __('Oops!') }} ${error.message}`;
    //     notifications{{ $key }}.innerHTML =
    //         `<x-alert delay="4" end="4" autoclose='true' type="error" title="Error!" message="${error.message}" />`;
    // } else {
    //     // Send the token to your server.
    //     stripe{{ $key }}TokenHandler(token);

    // }

    // const {
    //     setupIntent,
    //     error
    // } = await stripe.confirmCardSetup(
    //     clientSecret, {
    //         payment_method: {
    //             card: cardElement,
    //             billing_details: {
    //                 name: cardHolderName.value
    //             }
    //         }
    //     }
    // );

    // if (error) {
    //     // Inform the customer that there was an error.
    //     let errorElement{{ $key }} = document.getElementById('card-errors');
    //     let notifications{{ $key }} = document.getElementById('notifications');
    //     errorElement{{ $key }}.innerText = `{{ __('Oops!') }} ${error.message}`;
    //     notifications{{ $key }}.innerHTML =
    //         `<x-alert delay="4" end="4" autoclose='true' type="error" title="Error!" message="${error.message}" />`;
    // } else {
    //     // The card has been verified successfully...
    // }
</script>
