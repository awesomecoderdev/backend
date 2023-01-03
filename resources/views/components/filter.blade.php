{{-- @php
    $que_attr = ['search', 'page', 'status', 'by', 'sort'];
    $que_req = $_GET;
    $extra_url_attr = '';
    foreach ($que_req as $key => $value) {
        $req = strtolower($key);
        if (in_array($req, $que_attr)) {
            $extra_url_attr .= '&' . $req . '=' . $value;
        }
    }
@endphp --}}
{{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
    class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
</svg>

<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
    class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
</svg>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
    <path fill-rule="evenodd"
        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
        clip-rule="evenodd" />
</svg> --}}

{{-- md:mt-0 mt-2  max-w-xs block w-full rounded-md border border-gray-200 dark:border-slate-800 bg-white py-2 px-3 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm  dark:bg-gray-800 " --}}

<div class="relative flex justify-between items-center">
    <div class="flex items-center relative my-3 border border-transparent ">
        <button
            class="px-3 h-full py-2 mr-3 flex justify-between items-center rounded-md ring-1 ring-transparent focus:border-primary-500 focus:ring-primary-500 border-gray-200 border dark:border-slate-800 dark:bg-gray-800 shadow-sm sm:text-sm">
            <span>{{ __('Filter') }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
            </svg>
        </button>
        <form method="GET"
            action="{{ route(Route::currentRouteName(), ['status' => request('status'), 'search' => request('search')]) }}"
            class="relative flex justify-center items-center">
            <input type="text" name="search" id="search" value="{{ request('search') }}"
                placeholder="{{ __('Search') }}..."
                class="block w-screen max-w-sm pr-8 rounded-md focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 dark:bg-gray-800 shadow-sm sm:text-sm">
            <button type="submit" class="absolute right-2 mt-0.5 rounded-full ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5 pointer-events-none">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>

    <x-dropdown align="right" width="w-15 "
        class="bg-gray-100 dark:bg-slate-800 text-gray-500 overflow-hidden dark:text-white ">
        <x-slot name="trigger">
            <button
                class="px-3 h-full py-2 rounded-md border border-gray-200 dark:border-slate-800 md:flex hidden items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 ">
                <div>
                    {{ Cache::get('per_page', 50) }}
                </div>

                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            @foreach (config('app.per_page') as $page)
                <x-dropdown-link :href="route('paginator.change', $page)">
                    <div class="flex items-center">
                        <span class="text-center">
                            {{ $page }}
                        </span>
                    </div>
                </x-dropdown-link>
            @endforeach
        </x-slot>
    </x-dropdown>

</div>
