<x-app-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection

    <x-content>
        {{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
        {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}


        <x-slot name="notifications">
            {{-- @foreach (range(1, 4) as $key => $item)
                <x-alert delay="{{ $key }}" end="10"
                    type="{{ fake()->randomElement(['success', 'error']) }}"
                    title="{{ fake()->randomElement(['Success!', 'Error!']) }}" message="{{ fake()->text() }}" />
            @endforeach --}}
        </x-slot>

        <div class="relative w-full h-screen min-h-[30rem]  max-h-[75vh] ">
            <div id="chart" class="p-4 w-full h-full rounded border border-slate-200md:p-6 dark:border-gray-700">
                <div class="opacity-30 animate-pulse ">
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2.5"></div>
                    <div class="mb-5 w-2/5 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-4/6 mb-2.5"></div>
                    <div class="mb-5 w-4/5 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div>
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

        </div>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script>
            // hello world console.log('first');

            // $(document).ready(function() {
            //     setTimeout(() => {
            //         $("#chart").html(`<canvas id="ordersChart"></canvas>`);
            //     }, 1000);
            // });
            setTimeout(() => {
                if (document.getElementById("chart")) {
                    document.getElementById("chart").innerHTML = '<canvas id="ordersChart"></canvas>';
                }
            }, 1000);

            // setTimeout(() => {
            //     new Chart(document.getElementById("ordersChart"), {
            //         type: "line",
            //         data: {
            //             labels: [
            //                 1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050,
            //             ],
            //             datasets: [{
            //                     data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
            //                     label: "Africa",
            //                     borderColor: "#3e95cd",
            //                     fill: false,
            //                 },
            //                 {
            //                     data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
            //                     label: "Asia",
            //                     borderColor: "#8e5ea2",
            //                     fill: false,
            //                 },
            //                 {
            //                     data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
            //                     label: "Europe",
            //                     borderColor: "#3cba9f",
            //                     fill: false,
            //                 },
            //                 {
            //                     data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
            //                     label: "Latin America",
            //                     borderColor: "#e8c3b9",
            //                     fill: false,
            //                 },
            //                 {
            //                     data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433],
            //                     label: "North America",
            //                     borderColor: "#c45850",
            //                     fill: false,
            //                 },
            //             ],
            //         },
            //         options: {
            //             title: {
            //                 display: true,
            //                 text: "World population per region (in millions)",
            //             },
            //         },
            //     });
            // }, 1100);
        </script>
    </x-content>
</x-app-layout>
