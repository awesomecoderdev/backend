<x-client-layout>
    @section('head')
        <title>{{ __('Subscriptions') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <div class="relative">
            <form action="" method="post">
                @csrf
                <ul class="grid w-full gap-6 md:grid-cols-3">
                    <li>
                        <input type="radio" id="free" name="plan" value="plan" class="hidden peer">
                        <label for="free"
                            class="inline-flex max-w-sm mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">

                            <div class="relative">
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

                                    <button
                                        class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-300 transform bg-primary-600 rounded-md hover:bg-primary-500 focus:outline-none focus:bg-primary-500 focus:ring focus:ring-primary-300 focus:ring-opacity-80">
                                        Start Now
                                    </button>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700">

                                <div class="p-3">
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
                    </li>
                    <li>
                        <input type="radio" id="essential" name="plan" value="price_1MTSfvIX4CRni5u3wdGvV2c2"
                            class="hidden peer">
                        <label for="essential"
                            class="inline-flex max-w-sm mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">

                            <div class="relative">
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

                                    <button
                                        class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-300 transform bg-primary-600 rounded-md hover:bg-primary-500 focus:outline-none focus:bg-primary-500 focus:ring focus:ring-primary-300 focus:ring-opacity-80">
                                        Start Now
                                    </button>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700">

                                <div class="p-3">
                                    <h1 class="text-lg font-medium text-gray-700 capitalize lg:text-xl dark:text-white">
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
                    </li>
                    <li>
                        <input type="radio" id="premium" name="plan" value="price_1MTSfvIX4CRni5u37Kpj3wLK"
                            class="hidden peer">
                        <label for="premium"
                            class="inline-flex max-w-sm mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-primary-500 peer-checked:border-primary-600 peer-checked:text-primary-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">

                            <div class="relative">
                                <div class="p-3">
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

                                    <button
                                        class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-300 transform bg-primary-600 rounded-md hover:bg-primary-500 focus:outline-none focus:bg-primary-500 focus:ring focus:ring-primary-300 focus:ring-opacity-80">
                                        Start Now
                                    </button>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700">

                                <div class="p-3">
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
                    </li>
                </ul>

                <div class="relative">
                    <button type="submit"
                        data-secret="{{ $intent->client_secret }}">{{ __('Subscribe Now') }}</button>
                </div>
            </form>
        </div>
    </x-client>

</x-client-layout>
