<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="darks">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- start::head --}} @yield('head') {{-- end::head --}}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    {{--  start::preload:js --}}
    <link rel="preload" href="{{ route('alpine', ['time' => Cache::get('alpine', md5(strtotime('+10 minutes')))]) }}"
        as="script" type="text/javascript" />
    {{-- <link rel="preload" href="{{ secure_asset('js/jquery.min.js') }}" as="script" type="text/javascript" /> --}}
    {{-- end::preload:js --}}
    {{-- <script src="{{ asset('js/chunk.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
    {{-- start::chunk --}}
    <script src="{{ route('chunk', ['time' => Cache::get('chunk', md5(strtotime('+5 minutes')))]) }}"></script>
    {{-- end::chunk --}}

    <!-- Node.js -->
    {{-- @viteReactRefresh --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans relative w-full antialiased bg-gray-50 dark:bg-gray-800 border-gray-100 dark:border-slate-800">
    <div id="__next" data-reactroot="">
        {{-- start::notifications --}}
        <x-notification>
            {!! $notifications ?? '' !!}
            @if (isset($errors) && $errors->any())
                @foreach ($errors->all() as $key => $error)
                    <x-alert delay="{{ $key }}" end="4" autoclose='true' type="error" title="Error!"
                        message="{{ $error }}" />
                @endforeach
            @endif

            @if (Session::has('success'))
                <x-alert delay="{{ $errors->any() ? count($errors->all()) + 1 : 1 }}" end="4" autoclose='true'
                    type="success" title="Success!" message="{{ __(Session::get('success')) }}" />
            @endif
        </x-notification>
        {{-- end::notifications --}}

        {{-- start::navigation --}}
        <nav x-data="{ open: false }"
            class="bg-white text-slate-500 dark:text-slate-400 dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800">
            <!-- Primary Navigation Menu -->
            <div class="relative w-full mx-auto px-5 md:px-4">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            {{-- <a href="{{ route('dashboard') }}"> --}}
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            {{-- </a> --}}
                        </div>

                    </div>

                    {{-- dropdown --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">

                        <!-- Language Dropdown -->
                        <x-language />

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-200 hover:dark:text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 ">
                                    <div>{{ Auth::user()->name() }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content" class="bg-gray-100">
                                <x-dropdown-link href="{{ next_url('profile') }}"
                                    class="hover:bg-gray-100 dark:hover:bg-gray-800 ">
                                    <div
                                        class=" dark:text-slate-300  border-transparent py-0.5 hover:border-primary-500  flex cursor-pointer flex-row items-center   ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            class="h-5 w-5 pointer-events-none mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                            </path>
                                        </svg>
                                        {{ __('Profile') }}
                                    </div>
                                </x-dropdown-link>
                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}" class="m-0">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" class="hover:bg-gray-100 dark:hover:bg-gray-800"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <div
                                            class=" dark:text-slate-300  border-transparent  py-0.5 hover:border-primary-500  flex cursor-pointer flex-row items-center   ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                class="h-5 w-5 pointer-events-none mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75">
                                                </path>
                                            </svg>
                                            {{ __('Log Out') }}
                                        </div>
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:outline-none border bg-transparent border-gray-100 focus-visible:bg-transparent focus:bg-transparent focus-within:bg-transparent  dark:border-slate-700 ">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            @auth
                <div :class="{ 'block': open, 'hidden': !open }" x-show="open"
                    x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    class="hidden sm:hidden fixed top-0 bottom-0 right-0 left-0 z-10 bg-slate-900/10 dark:bg-primary-900/10">
                    <!-- Responsive Settings Options -->
                    <div
                        class="relative w-[85vw] h-screen bg-white dark:bg-slate-800 border-rr border-gray-100 dark:border-slate-700">
                        <div class="px-4 border-b py-3 border-gray-100 dark:border-slate-700 ">
                            <div class="font-medium text-base text-gray-800 dark:text-white">{{ Auth::user()->name() }}
                            </div>
                            <div class="font-medium text-sm text-gray-500 dark:text-gray-200">
                                {{ Str::limit(Auth::user()->email, 22) }}
                            </div>
                        </div>

                        <button @click="open = ! open"
                            class="absolute right-4 top-4 z-10 inline-flex items-center justify-center p-2 rounded-md  text-gray-400 focus:outline-none border bg-white dark:bg-slate-800 border-gray-100  focus-visible:bg-transparent focus:bg-transparent focus-within:bg-transparent  dark:border-slate-700 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6 pointer-events-none" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                        <div class="relative text-slate-600 font-sans font-semibold">
                            @include('layouts.navigation')

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                    class="fixed w-[85vw] bottom-0 bg-red-50 dark:bg-gray-900/20 dark:text-white dark:hover:bg-slate-700 px-2 py-3 border-red-500  flex cursor-pointer flex-row items-center  border-r-2  ">
                                    <div class="flex flex-row items-center text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                            class="h-5 w-5 pointer-events-none mx-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>

                                        {{ __('Log Out') }}
                                    </div>
                                </a>
                            </form>
                        </div>
                    </div>
                @endauth

            </div>
        </nav>
        {{-- end::navigation --}}

        {{-- start::content --}}
        {{ $slot }}
        {{-- end::content --}}

    </div>

    <script defer src="{{ route('alpine', ['time' => Cache::get('alpine', md5(strtotime('+10 minutes')))]) }}"></script>
    {{-- <script defer src="{{ secure_asset('js/jquery.min.js') }}"></script> --}}
</body>

</html>
