<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>

                @auth

                    @if (Auth::user()->isAdmin())
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('nutzers.index')" :active="request()->routeIs('nutzers.index')">
                                {{ __('Users') }}
                            </x-nav-link>
                        </div>
                    @endif

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('tags.index')" :active="request()->routeIs('tags.index')">
                            {{ __('IDs') }}
                        </x-nav-link>
                    </div>
                @endauth


                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('sichtungen')" :active="request()->routeIs('sichtungen')">
                        {{ __('Sichtungen') }}
                    </x-nav-link>
                </div>



            </div>

            <!-- Settings Dropdown -->
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="left" width="w-30">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>
                                    @if (app()->getLocale() == 'en')
                                        <svg class="h-7 w-5 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 30"
                                            width="1200" height="600">
                                            <clipPath id="s">
                                                <path d="M0,0 v30 h60 v-30 z" />
                                            </clipPath>
                                            <clipPath id="t">
                                                <path d="M30,15 h30 v15 z v15 h-30 z h-30 v-15 z v-15 h30 z" />
                                            </clipPath>
                                            <g clip-path="url(#s)">
                                                <path d="M0,0 v30 h60 v-30 z" fill="#012169" />
                                                <path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6" />
                                                <path d="M0,0 L60,30 M60,0 L0,30" clip-path="url(#t)" stroke="#C8102E"
                                                    stroke-width="4" />
                                                <path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10" />
                                                <path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6" />
                                            </g>
                                        </svg>
                                    @endif

                                    @if (app()->getLocale() == 'de')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 55.2 38.4">
                                            <g fill-rule="evenodd" clip-rule="evenodd">
                                                <path
                                                    d="M3.03 0h49.13c1.67 0 3.03 1.36 3.03 3.03v32.33c0 1.66-1.36 3.02-3.02 3.03H3.02C1.36 38.4 0 37.03 0 35.37V3.03C0 1.36 1.36 0 3.03 0z" />
                                                <path
                                                    d="M0 12.8h55.2v22.57c0 1.67-1.36 3.03-3.03 3.03H3.03C1.36 38.4 0 37.04 0 35.37V12.8z"
                                                    fill="#d00" />
                                                <path
                                                    d="M0 25.6h55.2v9.77c0 1.66-1.36 3.02-3.02 3.03H3.03A3.04 3.04 0 010 35.37V25.6z"
                                                    fill="#ffce00" />
                                            </g>
                                        </svg>
                                    @endif
                                </div>

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

                        <x-slot name="content">

                            @foreach (config('app.available_locales') as $name => $lang)
                                <x-dropdown-link :href="route('changeLanguage', $lang)">
                                    <div class="flex items-center">
                                        @if ($lang == 'en')
                                            <svg class="h-7 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 30"
                                                width="1200" height="600">
                                                <clipPath id="s">
                                                    <path d="M0,0 v30 h60 v-30 z" />
                                                </clipPath>
                                                <clipPath id="t">
                                                    <path d="M30,15 h30 v15 z v15 h-30 z h-30 v-15 z v-15 h30 z" />
                                                </clipPath>
                                                <g clip-path="url(#s)">
                                                    <path d="M0,0 v30 h60 v-30 z" fill="#012169" />
                                                    <path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6" />
                                                    <path d="M0,0 L60,30 M60,0 L0,30" clip-path="url(#t)" stroke="#C8102E"
                                                        stroke-width="4" />
                                                    <path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10" />
                                                    <path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6" />
                                                </g>
                                            </svg>
                                        @endif

                                        @if ($lang == 'de')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 "
                                                viewBox="0 0 55.2 38.4">
                                                <g fill-rule="evenodd" clip-rule="evenodd">
                                                    <path
                                                        d="M3.03 0h49.13c1.67 0 3.03 1.36 3.03 3.03v32.33c0 1.66-1.36 3.02-3.02 3.03H3.02C1.36 38.4 0 37.03 0 35.37V3.03C0 1.36 1.36 0 3.03 0z" />
                                                    <path
                                                        d="M0 12.8h55.2v22.57c0 1.67-1.36 3.03-3.03 3.03H3.03C1.36 38.4 0 37.04 0 35.37V12.8z"
                                                        fill="#d00" />
                                                    <path
                                                        d="M0 25.6h55.2v9.77c0 1.66-1.36 3.02-3.02 3.03H3.03A3.04 3.04 0 010 35.37V25.6z"
                                                        fill="#ffce00" />
                                                </g>
                                            </svg>
                                        @endif

                                        {{ $name }}

                                    </div>
                                </x-dropdown-link>

                                </option>
                            @endforeach
                        </x-slot>
                    </x-dropdown>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

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

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ml-6">

                    <x-dropdown align="left" width="w-30">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>
                                    @if (app()->getLocale() == 'en')
                                        <svg class="h-7 w-5 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 30"
                                            width="1200" height="600">
                                            <clipPath id="s">
                                                <path d="M0,0 v30 h60 v-30 z" />
                                            </clipPath>
                                            <clipPath id="t">
                                                <path d="M30,15 h30 v15 z v15 h-30 z h-30 v-15 z v-15 h30 z" />
                                            </clipPath>
                                            <g clip-path="url(#s)">
                                                <path d="M0,0 v30 h60 v-30 z" fill="#012169" />
                                                <path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6" />
                                                <path d="M0,0 L60,30 M60,0 L0,30" clip-path="url(#t)" stroke="#C8102E"
                                                    stroke-width="4" />
                                                <path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10" />
                                                <path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6" />
                                            </g>
                                        </svg>
                                    @endif

                                    @if (app()->getLocale() == 'de')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 55.2 38.4">
                                            <g fill-rule="evenodd" clip-rule="evenodd">
                                                <path
                                                    d="M3.03 0h49.13c1.67 0 3.03 1.36 3.03 3.03v32.33c0 1.66-1.36 3.02-3.02 3.03H3.02C1.36 38.4 0 37.03 0 35.37V3.03C0 1.36 1.36 0 3.03 0z" />
                                                <path
                                                    d="M0 12.8h55.2v22.57c0 1.67-1.36 3.03-3.03 3.03H3.03C1.36 38.4 0 37.04 0 35.37V12.8z"
                                                    fill="#d00" />
                                                <path
                                                    d="M0 25.6h55.2v9.77c0 1.66-1.36 3.02-3.02 3.03H3.03A3.04 3.04 0 010 35.37V25.6z"
                                                    fill="#ffce00" />
                                            </g>
                                        </svg>
                                    @endif
                                </div>

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

                        <x-slot name="content">

                            @foreach (config('app.available_locales') as $name => $lang)
                                <x-dropdown-link :href="route('changeLanguage', $lang)">
                                    <div class="flex items-center">
                                        @if ($lang == 'en')
                                            <svg class="h-7 w-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 60 30" width="1200" height="600">
                                                <clipPath id="s">
                                                    <path d="M0,0 v30 h60 v-30 z" />
                                                </clipPath>
                                                <clipPath id="t">
                                                    <path d="M30,15 h30 v15 z v15 h-30 z h-30 v-15 z v-15 h30 z" />
                                                </clipPath>
                                                <g clip-path="url(#s)">
                                                    <path d="M0,0 v30 h60 v-30 z" fill="#012169" />
                                                    <path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6" />
                                                    <path d="M0,0 L60,30 M60,0 L0,30" clip-path="url(#t)"
                                                        stroke="#C8102E" stroke-width="4" />
                                                    <path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10" />
                                                    <path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6" />
                                                </g>
                                            </svg>
                                        @endif

                                        @if ($lang == 'de')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 "
                                                viewBox="0 0 55.2 38.4">
                                                <g fill-rule="evenodd" clip-rule="evenodd">
                                                    <path
                                                        d="M3.03 0h49.13c1.67 0 3.03 1.36 3.03 3.03v32.33c0 1.66-1.36 3.02-3.02 3.03H3.02C1.36 38.4 0 37.03 0 35.37V3.03C0 1.36 1.36 0 3.03 0z" />
                                                    <path
                                                        d="M0 12.8h55.2v22.57c0 1.67-1.36 3.03-3.03 3.03H3.03C1.36 38.4 0 37.04 0 35.37V12.8z"
                                                        fill="#d00" />
                                                    <path
                                                        d="M0 25.6h55.2v9.77c0 1.66-1.36 3.02-3.02 3.03H3.03A3.04 3.04 0 010 35.37V25.6z"
                                                        fill="#ffce00" />
                                                </g>
                                            </svg>
                                        @endif

                                        {{ $name }}

                                    </div>
                                </x-dropdown-link>

                                </option>
                            @endforeach
                        </x-slot>
                    </x-dropdown>
                    <a href="{{ route('login') }}"
                        class="ml-2 flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>{{ __('Login') }}</div>
                    </a>

                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    @auth
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

    </div>
</nav>
