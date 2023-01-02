<x-app-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}
        </title>
        <meta name="description" content="akdfaldfj">
    @endsection
    <x-content>
        <div id="charts" class="relative w-full h-screen min-h-[60rem]  max-h-[75vh] ">
            <div class="opacity-30 p-4 w-full rounded border border-slate-100 animate-pulse md:p-6 dark:border-gray-700">
                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                <div class="mb-10 w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                <div class="flex items-baseline mt-4 space-x-6">
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-56 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-64 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-72 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                    <div class="w-full h-80 bg-gray-200 rounded-t-lg dark:bg-gray-700"></div>
                </div>
            </div>
        </div>
    </x-content>
</x-app-layout>
