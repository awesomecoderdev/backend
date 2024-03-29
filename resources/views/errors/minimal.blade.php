@php
    $path = strtok(preg_replace('#^https?://#', '', rtrim(Request::url(), '/')), '.');
@endphp

@if (Auth::check() && Auth::user()->admin() && $path == 'admin')
    <x-app-layout>
        @section('head')
            <title>@yield('title')</title>
        @endsection
        <x-content>
            <div
                class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-800 sm:items-center sm:pt-0">
                <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                        <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                            @yield('code')
                        </div>

                        <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                            @yield('message')
                        </div>
                    </div>
                </div>
            </div>
        </x-content>
    </x-app-layout>
@else
    <x-client-layout>
        @section('head')
            <title>@yield('title')</title>
        @endsection
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-800 sm:items-center sm:pt-0">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                    <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                        @yield('code')
                    </div>

                    <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                        @yield('message')
                    </div>
                </div>
            </div>
        </div>
    </x-client-layout>
@endif
