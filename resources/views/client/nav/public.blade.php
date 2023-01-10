@php
    $current = strtok(Route::currentRouteName(), '.');
@endphp
<a href="{{ route('getting-started') }}"
    class="{{ $current == 'getting-started' ? 'border-primary-500 md:bg-transparent bg-gray-100 dark:bg-slate-700  dark:text-white md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' bg-primary-50/20 dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 ' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center md:border-b-2 md:border-r-0 border-r-2">
    <div class="flex flex-row items-center text-sm font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            aria-hidden="true" class="h-5 w-5 pointer-events-none mx-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
        </svg>
        {{ __('Getting Started') }}
    </div>
</a>
<a href="{{ route('blog') }}"
    class="{{ $current == 'blog' ? 'border-primary-500 md:bg-transparent bg-gray-100 dark:bg-slate-700  dark:text-white md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' bg-primary-50/20 dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 ' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  md:border-b-2 md:border-r-0 border-r-2">
    <div class="flex flex-row items-center text-sm font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M20.893 13.393l-1.135-1.135a2.252 2.252 0 01-.421-.585l-1.08-2.16a.414.414 0 00-.663-.107.827.827 0 01-.812.21l-1.273-.363a.89.89 0 00-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 01-1.81 1.025 1.055 1.055 0 01-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 01-1.383-2.46l.007-.042a2.25 2.25 0 01.29-.787l.09-.15a2.25 2.25 0 012.37-1.048l1.178.236a1.125 1.125 0 001.302-.795l.208-.73a1.125 1.125 0 00-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 01-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 01-1.458-1.137l1.411-2.353a2.25 2.25 0 00.286-.76m11.928 9.869A9 9 0 008.965 3.525m11.928 9.868A9 9 0 118.965 3.525" />
        </svg>


        {{ __('Blog') }}
    </div>
</a>
<a href="{{ route('featured') }}"
    class="{{ $current == 'featured' ? 'border-primary-500 md:bg-transparent bg-gray-100 dark:bg-slate-700  dark:text-white md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' bg-primary-50/20 dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 ' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  md:border-b-2 md:border-r-0 border-r-2">
    <div class="flex flex-row items-center text-sm font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75a4.5 4.5 0 01-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 11-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 016.336-4.486l-3.276 3.276a3.004 3.004 0 002.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008z" />
        </svg>

        {{ __('Featured') }}
    </div>
</a>
<a href="{{ route('pricing') }}"
    class="{{ $current == 'pricing' ? 'border-primary-500 md:bg-transparent bg-gray-100 dark:bg-slate-700  dark:text-white md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' bg-primary-50/20 dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 ' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center md:border-b-2 md:border-r-0 border-r-2">
    <div class="flex flex-row items-center text-sm font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        {{ __('Pricing') }}
    </div>
</a>
