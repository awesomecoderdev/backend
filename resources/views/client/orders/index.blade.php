<x-client-layout>
    @section('head')
        <title>{{ __('Orders') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <div class="relative w-full overflow-x-hidden overflow-y-scroll ">
            <div class="border-b border-gray-200 dark:border-gray-700 flex justify-between">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="mr-2">
                        <a href="{{ route('client.orders.index', ['search' => request('search')]) }}"
                            class=" {{ !$status ? 'border-primary-300' : 'border-transparent' }} hover:border-primary-400 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all group"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-primary-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                                </path>
                            </svg>
                            <span class="md:block hidden">{{ __('All') }}</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('client.orders.index', ['status' => 'approved', 'search' => request('search')]) }}"
                            class=" {{ $status == 'approved' ? 'border-green-300' : 'border-transparent' }} hover:border-green-400  text-slate-500 hover:text-slate-600 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all  group"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-green-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="md:block hidden">{{ __('Approved') }}</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('client.orders.index', ['status' => 'pending', 'search' => request('search')]) }}"
                            class=" {{ $status == 'pending' ? 'border-yellow-300' : 'border-transparent' }} hover:border-yellow-400  text-slate-500 hover:text-slate-600 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all  group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="md:block hidden">{{ __('Pending') }}</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('client.orders.index', ['status' => 'canceled', 'search' => request('search')]) }}"
                            class=" {{ $status == 'canceled' ? 'border-red-300' : 'border-transparent' }} hover:border-red-400  text-slate-500 hover:text-slate-600 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all  group"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-red-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"></path>
                            </svg>
                            <span class="md:block hidden">{{ __('Canceled') }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <x-filter>
                @if (isset($orders) && $orders->count() > 0)
                    <p class="text-sm lg:block mx-2 hidden text-gray-500 font-medium dark:text-white leading-5">
                        {!! __('Showing') !!}
                        @if ($orders->firstItem())
                            <span class="font-medium">{{ $orders->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="font-medium">{{ $orders->lastItem() }}</span>
                        @else
                            {{ $orders->count() }}
                        @endif
                        {!! __('of') !!}
                        <span class="font-medium">{{ $orders->total() }}</span>
                        {!! __('results') !!}
                    </p>
                @endif
            </x-filter>

            @if (isset($orders) && $orders->count() > 0)
                @foreach ($orders as $order)
                    <div
                        class="relative md:p-0 p-3 md:flex-row flex-col flex items-center justify-between w-full border mb-3 border-gray-100 dark:border-slate-800 rounded-md">
                        <div
                            class="relative md:w-1/5 w-full md:p-0 flex justify-start items-center md:m-3 w-15 h-15 rounded-full text-primary-500 ">
                            <h2 class="text-slate-600 font-semibold text-sm flex justify-center items-center ">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                    class="h-5 w-5 pointer-events-none ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>

                            </h2>
                            <span
                                class="{{ $order->status == 'approved' ? 'bg-green-400' : ($order->status == 'pending' ? 'bg-yellow-400' : 'bg-red-400') }} absolute md:-left-1 left-2
                        md:top-0 top-3 h-2.5 w-2.5 border-white dark:border-slate-700 border-2 rounded-full"></span>

                            <p
                                class="text-xs md:truncate pl-3  w-auto font-semibold text-slate-500/80 dark:text-slate-50">
                                {{ $order->id ?? 'Unavailable' }}
                            </p>
                        </div>


                        <div
                            class="relative max-w-xs text-xs md:text-center text-start md:w-1/5 w-full md:m-3 md:p-0 p-1.5 font-semibold text-slate-500/80 flex md:justify-center justify-start items-center">

                            <a href="{{ route('client.orders.show', $order) }}"
                                class="p-1 text-emerald-400 rounded-md mx-1 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </a>

                            <a href="{{ $order->invoice ? route('client.invoices.print', $order->invoice->id) : 'javascript:void(0);' }}"
                                {{ $order->invoice ? 'target="_blank"' : '' }}
                                class="p-1 text-primary-400 rounded-md mx-1 " title="{{ __('Download Invoice') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                </svg>
                            </a>

                        </div>

                        <div class="relative flex flex-auto items-center justify-start md:w-auto w-full">
                            <span
                                class="{{ $order->status == 'approved' ? 'bg-green-100 dark:bg-emerald-300 text-green-800' : ($order->status == 'pending' ? 'bg-yellow-100 dark:bg-yellow-300 text-yellow-800' : 'bg-red-100 dark:bg-red-300 text-red-800') }}  w-auto md:m-3 md:text-center text-start rounded-full px-3 py-1 text-xs font-medium">
                                {{ __(Str::ucfirst($order->status)) }}
                            </span>
                        </div>

                        <p
                            class="text-xs md:text-center text-start lg:block md:hidden block md:w-1/5 w-full md:m-3 md:p-0 p-1.5 font-semibold text-slate-500/80 dark:text-slate-300 ">
                            {{ $order->created_at->diffForHumans([
                                // 'parts' => 2,
                                // 'parts' => 3,
                                // 'join' => ', ',
                                // 'short' => true,
                            ]) }}
                        </p>
                    </div>
                @endforeach

                <div class="relative w-full pl-1">
                    {{ $orders->links() }}
                </div>
            @else
                <div
                    class="mt-4 h-60 p-4 flex justify-center items-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                    <div class="space-y-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 my-5 text-gray-400"
                            data-name="Layer 1" width="647.63626" height="632.17383"
                            viewBox="0 0 647.63626 632.17383" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z"
                                transform="translate(-276.18187 -133.91309)" fill="#f2f2f2" />
                            <path
                                d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path
                                d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z"
                                transform="translate(-276.18187 -133.91309)" fill="#6c63ff" />
                            <circle cx="190.15351" cy="24.95465" r="20" fill="#6c63ff" />
                            <circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff" />
                            <path
                                d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z"
                                transform="translate(-276.18187 -133.91309)" fill="#e6e6e6" />
                            <path
                                d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path
                                d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z"
                                transform="translate(-276.18187 -133.91309)" fill="#6c63ff" />
                            <circle cx="433.63626" cy="105.17383" r="20" fill="#6c63ff" />
                            <circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff" />
                        </svg>
                        <div class=" text-sm text-center text-gray-600">
                            <a onclick="history.back()"
                                class="relative cursor-pointer rounded-md  font-medium text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-500 focus-within:ring-offset-2 hover:text-primary-500">
                                <span>{{ __('Go back') }}</span>
                            </a>
                        </div>
                        <p class="text-xs text-gray-500">{{ __('No Data Available') }}.</p>
                    </div>
                </div>
            @endif
        </div>
    </x-client>

</x-client-layout>
