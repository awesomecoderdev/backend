@php
    $current = strtok(str_replace('client.', '', Route::currentRouteName()), '.');
@endphp

<div class="relative grid gap-2 py-1">
    <a href="{{ base(route('client.dashboard')) }}"
        class="{{ $current == 'dashboard' ? 'border-primary-500 bg-gray-100 dark:bg-slate-700 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' dark:text-slate-300  border-transparent hover:bg-gray-100 dark:hover:bg-gray-800' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
        <div class="flex flex-row items-center text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
            </svg>
            {{ __('Dashboard') }}
        </div>
    </a>
    <a href="{{ base(route('client.websites.index')) }}"
        class="{{ $current == 'websites' ? 'border-primary-500 bg-gray-100 dark:bg-slate-700  dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' dark:text-slate-300  border-transparent hover:bg-gray-100 dark:hover:bg-gray-800' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
        <div class="flex flex-row items-center text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244">
                </path>
            </svg>
            {{ __('Websites') }}
        </div>
    </a>
    <a href="{{ base(route('client.orders.index')) }}"
        class="{{ $current == 'orders' ? 'border-primary-500 bg-gray-100 dark:bg-slate-700  dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' dark:text-slate-300  border-transparent hover:bg-gray-100 dark:hover:bg-gray-800' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
        <div class="flex flex-row items-center text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>

            {{ __('Orders') }}
        </div>
    </a>
    <a href="{{ base(route('client.payments.index')) }}"
        class="{{ $current == 'payments' ? 'border-primary-500 bg-gray-100 dark:bg-slate-700  dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' dark:text-slate-300  border-transparent hover:bg-gray-100 dark:hover:bg-gray-800' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
        <div class="flex flex-row items-center text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z">
                </path>
            </svg>
            {{ __('Payments') }}
        </div>
    </a>
    <a href="{{ base(route('client.invoices.index')) }}"
        class="{{ $current == 'invoices' ? 'border-primary-500 bg-gray-100 dark:bg-slate-700  dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' dark:text-slate-300  border-transparent hover:bg-gray-100 dark:hover:bg-gray-800' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
        <div class="flex flex-row items-center text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                </path>
            </svg>
            {{ __('Invoices') }}
        </div>
    </a>
    <a href="{{ base(route('client.settings')) }}"
        class="{{ $current == 'settings' ? 'border-primary-500 bg-gray-100 dark:bg-slate-700  dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' dark:text-slate-300  border-transparent hover:bg-gray-100 dark:hover:bg-gray-800' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
        <div class="flex flex-row items-center text-sm font-medium"><svg xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                class="h-5 w-5 pointer-events-none mx-3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                </path>
            </svg>
            {{ __('Settings') }}
        </div>
    </a>
    <a href="{{ base(route('client.support')) }}"
        class="{{ $current == 'support' ? 'border-primary-500 bg-gray-100 dark:bg-slate-700  dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 ' : ' dark:text-slate-300  border-transparent hover:bg-gray-100 dark:hover:bg-gray-800' }}  px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
        <div class="flex flex-row items-center text-sm font-medium"><svg xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                class="h-5 w-5 pointer-events-none mx-3">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                </path>
            </svg>
            {{ __('Support') }}
        </div>
    </a>
</div>
