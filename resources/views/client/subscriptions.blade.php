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
            <div class="grid w-full gap-6 lg:grid-cols-3 md:grid-cols-4">

                @if ($plans)
                    @foreach ($plans as $item => $plan)
                        <a href="{{ base(route('client.plans.show', $plan)) }}"
                            class="{{ $plans->count() == 3 && $item != 2 ? 'lg:col-span-1 md:col-span-2' : 'lg:col-span-1 md:col-span-4' }} relative inline-flex mx-auto items-center justify-between w-full p-5 hover:border-primary-600 text-gray-500 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700  hover:text-gray-600  dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-800">
                            <span class="absolute right-0 top-0 p-5" @click="open = !open">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-9 h-9 pointer-events-none">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                            </span>
                            <div class="relative p-3 min-h-[15rem] flex justify-center items-center">
                                <div class="relative">

                                    <h1
                                        class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                                        {{ __($plan->name) }}
                                    </h1>

                                    <p class="mt-4 text-gray-500 dark:text-gray-300">
                                        {{ __($plan->description) }}
                                    </p>

                                    <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-4xl dark:text-gray-300">
                                        ${{ number_format($plan->price, 2) }}
                                        <span class="text-base font-medium">/{{ __('Month') }}</span>
                                    </h2>

                                    <p class="mt-1 text-gray-500 dark:text-gray-300">
                                        {{ __('Monthly payment') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

    </x-client>

</x-client-layout>
