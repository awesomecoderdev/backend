@php
    $path = strtok(Route::currentRouteName(), '.');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ secure_asset('site.webmanifest') }}" />
    {{-- start::head --}} @yield('head') {{-- end::head --}}
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <!-- Scripts -->

    {{--  start::preload:js --}}
    {{-- <link rel="preload" href="{{ secure_asset('js/alpine.min.js') }}" as="script" type="text/javascript" /> --}}
    <link rel="preload"
        href="{{ base(route('alpine', ['time' => Cache::get('alpine', md5(strtotime('+10 minutes')))])) }}"
        as="script" type="text/javascript" />
    <script>
        var isDarkMode = window.matchMedia && window.matchMedia("(prefers-color-scheme:dark)") && window.matchMedia(
            "(prefers-color-scheme:dark)").matches ? true : false;
        var breackdown = window.screen.width > 786 ? 'lg' : (window.screen.width > 640 ? 'md' : 'sm');
    </script>
    {{-- <link rel="preload" href="{{ secure_asset('js/jquery.min.js') }}" as="script" type="text/javascript" /> --}}
    {{-- end::preload:js --}}

    {{-- start::chunk --}}
    <script src="{{ base(route('chunk', ['time' => Cache::get('chunk', md5(strtotime('+5 minutes')))])) }}"></script>
    {{-- end::chunk --}}
    <!-- Node.js -->
    {{-- @viteReactRefresh --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- stripe --}}
    <script src="https://js.stripe.com/v3/"></script>

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
        @if (Session::has('redirect'))
            <script>
                window.history.pushState({
                    page: "another"
                }, null, "{{ Session::get('redirect') }}");
            </script>
        @endif

        {{-- start::navigation --}}
        <nav x-data="{ open: false }"
            class="relative w-full z-50 bg-white text-slate-500 dark:text-slate-400 dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800">
            <!-- Primary Navigation Menu -->
            <div class="relative w-full {{ $path == 'client' ?: 'max-w-7xl ' }} mx-auto px-5 md:px-4">
                <div class="flex justify-between h-16">
                    <a href="{{ config('app.url') }}" class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            {{-- <a href="{{ route('dashboard') }}"> --}}
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            {{-- </a> --}}
                        </div>
                    </a>

                    {{-- dropdown --}}
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        {{-- navigation --}}
                        @auth
                            @if ($path != 'client')
                                @include('client.nav.public')
                                @if (Auth::user()->hasVerifiedEmail())
                                    <a href="{{ base(route('client.dashboard')) }}"
                                        class="md:bg-transparent dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  md:border-b-2 md:border-r-0 border-r-2 my-0.5 h-full">
                                        <div class="flex flex-row items-center text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                class="h-5 w-5 pointer-events-none mx-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                            </svg>
                                            {{ __('Dashboard') }}
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ base(route('verification.notice')) }}"
                                        class="md:bg-transparent dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  md:border-b-2 md:border-r-0 border-r-2 my-0.5 h-full">
                                        <div class="flex flex-row items-center text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                class="h-5 w-5 pointer-events-none mx-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                            </svg>
                                            {{ __('Verify Account') }}
                                        </div>
                                    </a>
                                @endif
                            @else
                                {{-- dropdown --}}
                                <div class="hidden sm:flex sm:items-center sm:ml-6 ">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <div
                                                class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-200 hover:dark:text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 ">
                                                <button
                                                    class="relative  w-9 h-9 rounded-full overflow-hidden border-primary-500 bg-slate-500 dark:bg-slate-700  ">
                                                    @if (Auth::user()->avatar)
                                                        <img loading="lazy" src="{{ Auth::user()->avatar }}"
                                                            alt="{{ Auth::user()->fullname() }}">
                                                    @else
                                                        <h2 class="text-slate-100 font-semibold text-sm ">
                                                            {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->email, 0, 1)) }}
                                                        </h2>
                                                    @endif
                                                </button>
                                            </div>
                                        </x-slot>

                                        <x-slot name="content" class="bg-gray-100">
                                            <x-dropdown-link href="{{ base(route('client.profile')) }}"
                                                class="hover:bg-gray-100 dark:hover:bg-gray-800 ">
                                                <div
                                                    class=" dark:text-slate-300  border-transparent py-0.5 hover:border-primary-500  flex cursor-pointer flex-row items-center   ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        aria-hidden="true" class="h-5 w-5 pointer-events-none mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                    {{ __('Profile') }}
                                                </div>
                                            </x-dropdown-link>
                                            <!-- Logout -->
                                            <form method="POST" action="{{ base(route('logout')) }}" class="m-0">
                                                @csrf
                                                <x-dropdown-link :href="base(route('logout'))"
                                                    class="hover:bg-gray-100 dark:hover:bg-gray-800"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <div
                                                        class=" dark:text-slate-300  border-transparent  py-0.5 hover:border-primary-500  flex cursor-pointer flex-row items-center   ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            aria-hidden="true" class="h-5 w-5 pointer-events-none mr-2">
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
                            @endif
                        @else
                            @include('client.nav.public')
                            <a href="{{ base(route('login')) }}"
                                class="md:bg-transparent dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  md:border-b-2 md:border-r-0 border-r-2 my-0.5 h-full">
                                <div class="flex flex-row items-center text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="h-5 w-5 pointer-events-none mx-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    {{ __('Login') }}
                                </div>
                            </a>
                        @endauth
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



            <div x-show="open" :class="{ 'z-10': open, ' -z-10': !open }" style="display: none;"
                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-description="Background backdrop, show/hide based on modal state."
                class=" sm:hidden fixed inset-0 h-screen z-10 bg-slate-900/10 dark:bg-primary-900/10 transition-opacity">
            </div>

            <!-- Responsive Navigation Menu -->
            <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                class="sm:hidden fixed top-0 bottom-0 right-0 left-0 z-10 " style="display: none;">
                <!-- Responsive Settings Options -->
                <div
                    class="relative w-[85vw] h-screen bg-white dark:bg-slate-800 border-rr border-gray-100 dark:border-slate-700">
                    <div
                        class="relative flex items-center justify-between border-b border-gray-100 dark:border-slate-700 h-16">
                        <div class="px-4  py-3 ">
                            <div class="font-medium text-base text-gray-800 dark:text-white">
                                <x-application-logo />
                            </div>
                        </div>

                        <button @click="open = ! open"
                            class=" mr-3 top-4 z-10 inline-flex items-center justify-center p-2 rounded-md  text-gray-400 focus:outline-none border bg-white dark:bg-slate-800 border-gray-100  focus-visible:bg-transparent focus:bg-transparent focus-within:bg-transparent  dark:border-slate-700 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6 pointer-events-none" stroke="currentColor" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="relative text-slate-600 font-sans font-semibold">
                        @auth
                            @if ($path != 'client')
                                @if (Auth::user()->hasVerifiedEmail())
                                    <a href="{{ base(route('client.dashboard')) }}"
                                        class="md:bg-transparent dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  md:border-b-2 md:border-r-0 border-r-2 my-0.5 h-full">
                                        <div class="flex flex-row items-center text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                class="h-5 w-5 pointer-events-none mx-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                            </svg>
                                            {{ __('Dashboard') }}
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ base(route('verification.notice')) }}"
                                        class="md:bg-transparent dark:text-slate-300  border-transparent md:hover:bg-transparent hover:bg-gray-100 dark:hover:bg-gray-800 px-2 py-3 hover:border-primary-500  flex cursor-pointer flex-row items-center  md:border-b-2 md:border-r-0 border-r-2 my-0.5 h-full">
                                        <div class="flex flex-row items-center text-sm font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                class="h-5 w-5 pointer-events-none mx-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                            </svg>
                                            {{ __('Verify Account') }}
                                        </div>
                                    </a>
                                @endif
                                @include('client.nav.public')
                            @else
                                @include('client.nav.dashboard')
                            @endif

                            <form method="POST" action="{{ base(route('logout')) }}">
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
                        @else
                            @include('client.nav.public')
                            <a href="{{ base(route('login')) }}"
                                class="fixed w-[85vw] bottom-0 bg-primary-50 dark:bg-gray-900/20 dark:text-white dark:hover:bg-slate-700 px-2 py-3 border-primary-500  flex cursor-pointer flex-row items-center  border-r-2  ">
                                <div class="flex flex-row items-center text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                        class="h-5 w-5 pointer-events-none mx-3">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    {{ __('Log In') }}
                                </div>
                            </a>
                        @endauth

                    </div>
                </div>

            </div>
        </nav>
        {{-- end::navigation --}}

        {{-- start::content --}}
        {{ $slot }}
        {{-- end::content --}}

        @if ($path != 'client')
            @include('client.footer')
        @endif
    </div>


    <script defer src="{{ base(route('alpine', ['time' => Cache::get('alpine', md5(strtotime('+10 minutes')))])) }}">
    </script>
    {{-- <script defer src="{{ secure_asset('js/jquery.min.js') }}"></script> --}}
    <script>
        // console.clear();
    </script>

</body>

</html>
