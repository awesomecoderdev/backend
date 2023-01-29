<x-client-layout>
    @section('head')
        <title>{{ __('Plans') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <div class="relative w-full overflow-x-hidden overflow-y-scroll ">
            <div class="grid w-full gap-6 lg:grid-cols-3 md:grid-cols-4">
                @if ($plans)
                    @foreach ($plans as $plan)
                        <a href="{{ base(route('client.plans.show', $plan)) }}"
                            class="inline-flex mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700  hover:text-gray-600  dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-800">
                            <div class="relative">
                                <div class="p-3">
                                    <span class="absolute right-0 top-0" @click="open = !open">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-8 h-8 pointer-events-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                        </svg>
                                    </span>
                                    <h1
                                        class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                                        {{ __($plan->name) }}
                                    </h1>

                                    <p class="mt-4 text-gray-500 dark:text-gray-300">
                                        {{ __($plan->description) }}
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>

                                    <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-4xl dark:text-gray-300">
                                        ${{ number_format($plan->price, 2) }}
                                        <span class="text-base font-medium">/{{ __('Month') }}</span>
                                    </h2>

                                    <p class="mt-1 text-gray-500 dark:text-gray-300">
                                        {{ __('Monthly payment') }}
                                    </p>
                                    <button
                                        class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-300 transform bg-primary-600 rounded-md hover:bg-primary-500 focus:outline-none focus:bg-primary-500 focus:ring focus:ring-primary-300 focus:ring-opacity-80">
                                        {{ __('Subscribe Now') }}
                                    </button>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700">

                                <div class="p-3 ">
                                    <h1 class="text-lg font-medium text-gray-700 capitalize lg:text-xl dark:text-white">
                                        {{ __('What\'s included ?') }}
                                    </h1>

                                    <div class="mt-8 space-y-4">
                                        @foreach ($plan->meta as $meta => $status)
                                            <div class="flex items-center">
                                                @if ($status)
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 text-primary-500" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                                <span
                                                    class="mx-4 text-gray-700 dark:text-gray-300">{{ __($meta) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </x-client>
</x-client-layout>
