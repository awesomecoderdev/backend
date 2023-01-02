<x-app-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}
        </title>
        <script src="{{ asset('js/chart.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    @endsection

    <x-content>
        <x-slot name="notifications">
            @foreach (range(1, 4) as $key => $item)
                <x-alert delay="{{ $key }}" end="10"
                    type="{{ fake()->randomElement(['success', 'error']) }}"
                    title="{{ fake()->randomElement(['Success!', 'Error!']) }}" message="{{ fake()->text() }}" />
            @endforeach
        </x-slot>

        <div class="relative w-full h-screen min-h-[30rem]  max-h-[75vh] ">
            <div id="chart"
                class="opacity-30 p-4 w-full rounded border border-slate-200 animate-pulse md:p-6 dark:border-gray-700">
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
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script>
            // hello world console.log('first');
            $(document).ready(function() {
                setTimeout(() => {
                    $("#chart").html(`<canvas id="ordersChart"></canvas>`);
                }, 1000);
            });
        </script>
    </x-content>
</x-app-layout>
