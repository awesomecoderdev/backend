@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }
    
    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp

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

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Language Dropdown -->
                <x-language />

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
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

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:outline-none border bg-transparent border-gray-100 focus-visible:bg-transparent focus:bg-transparent focus-within:bg-transparent  dark:border-slate-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    @auth
        <div :class="{ 'block': open, 'hidden': !open }" x-show="open"
            x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
            class="hidden sm:hidden fixed top-0 bottom-0 right-0 left-0 z-10 bg-slate-900/10">
            <!-- Responsive Settings Options -->
            <div
                class="relative w-[85vw] h-screen bg-white dark:bg-slate-800 border-t border-gray-100 dark:border-slate-700">
                <div class="px-4 border-b py-3 border-gray-100 dark:border-slate-700 ">
                    <div class="font-medium text-base text-gray-800 dark:text-white">{{ Auth::user()->name() }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-200">{{ Auth::user()->email }}</div>
                </div>

                <button @click="open = ! open"
                    class="absolute right-4 top-4 inline-flex items-center justify-center p-2 rounded-md text-gray-400 focus:outline-none border bg-transparent border-gray-100 focus-visible:bg-transparent focus:bg-transparent focus-within:bg-transparent  dark:border-slate-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6 pointer-events-none" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="relative text-slate-600 font-sans font-semibold">
                    @include('layouts.navigation')

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        {{-- <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link> --}}
                        <a onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class=" hover:bg-red-100 dark:hover:bg-slate-700 px-2 py-3 hover:border-primary-500  flex cursor-pointer transition-colors flex-row items-center  border-r-2  ">
                            <div class="flex flex-row items-center text-sm font-medium"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-3">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z">
                                    </path>
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

<div
    class="relative bg-white text-slate-500 dark:text-slate-400 dark:bg-slate-900 flex mx-auto justify-between w-full h-fit">
    <div
        class="md:block hidden relative overflow-x-hidden w-72 h-auto max-h-[90vh] border-r border-gray-100 dark:border-slate-800">
        {{-- fixed w-60  --}}
        <div class=" md:min-h-[90vh] md:max-h-[90vh] h-auto overflow-x-hidden overflow-y-scroll">
            <div class="relative text-slate-600 font-sans font-semibold">
                @include('layouts.navigation')
            </div>
        </div>
    </div>

    <div id="content"
        class="relative p-4 flex-auto w-full h-auto md:max-h-[90vh] overflow-x-hidden overflow-y-scroll">
        {{ $slot }}
    </div>
</div>
