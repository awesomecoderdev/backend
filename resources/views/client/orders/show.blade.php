<x-client-layout>
    @section('head')
        <title>{{ __($order->id) }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <div class="mt-10 sm:mt-0 ">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-6 md:mt-0">
                    <div class="overflow-hidden sm:rounded-md border-gray-200 dark:border-slate-800 ">
                        <div class="relative p-2">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('First name') }}</label>
                                    <input type="text" readonly name="first_name" id="first_name"
                                        autocomplete="given-name" value="{{ $order->first_name }}"
                                        class="mt-1 block w-full rounded-md @error('first_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    @error('first_name')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Last name') }}</label>
                                    <input type="text" readonly name="last_name" id="last_name"
                                        autocomplete="family-name" value="{{ $order->last_name }}"
                                        class="mt-1 block w-full rounded-md @error('last_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">

                                    @error('last_name')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email-address"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Email address') }}</label>
                                    <input type="text" readonly name="email-address" id="email-address"
                                        autocomplete="email" value="{{ $order->email }}"
                                        class="mt-1 block w-full rounded-md border-gray-200 dark:border-slate-800 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm  dark:bg-gray-800 "
                                        {{-- class="mt-1 block w-full rounded-md @error('email') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm" --}}>
                                    {{-- @error('email')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __("Oops!") }} </span>{{ __($message)  }}
                                            </p>
                                        @enderror --}}
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="country"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Country') }}</label>
                                    {!! Form::select('country', Arr::pluck(config('country.list'), 'name', 'name'), 'Bangladesh', [
                                        'class' =>
                                            ' mt-1 block w-full rounded-md border border-gray-200 dark:border-slate-800 bg-white py-2 px-3 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm  dark:bg-gray-800 ',
                                        'id' => 'country',
                                        'autocomplete' => 'country-name',
                                        'disabled' => true,
                                    ]) !!}
                                    @error('country')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6">
                                    <label for="street-address"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Street address') }}</label>
                                    <input type="text" readonly name="street-address" id="street-address"
                                        autocomplete="street-address"
                                        class="mt-1 block w-full rounded-md @error('address') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    {{-- @error('first_name')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __("Oops!") }} </span>{{ __($message)  }}
                                            </p>
                                        @enderror --}}
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label for="city"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('City') }}</label>
                                    <input type="text" readonly name="city" id="city"
                                        autocomplete="address-level2"
                                        class="mt-1 block w-full rounded-md @error('city') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">

                                    @error('city')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="region"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('State / Province') }}</label>
                                    <input type="text" readonly name="region" id="region"
                                        autocomplete="address-level1"
                                        class="mt-1 block w-full rounded-md @error('state') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror dark:bg-gray-800  shadow-sm  sm:text-sm">
                                    @error('state')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="postal-code"
                                        class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('ZIP / Postal code') }}</label>
                                    <input type="text" readonly name="postal-code" id="postal-code"
                                        autocomplete="postal-code"
                                        class="mt-1 block w-full rounded-md @error('zip') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    @error('zip')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class=" bg-gray-50  dark:bg-gray-700/10 px-4 py-3 text-right sm:px-6">
                            <a href="{{ route('users.edit', $order) }}"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                                <span class="mx-2">
                                    {{ __('Edit') }}
                                </span>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        @if (isset($order->orders) && $order->orders->count() > 0)
            <div class="relative p-2 w-full">
                <h1 class=" text-sm font-medium text-gray-700 dark:text-white block mb-2 mx-1 ">{{ __('Orders') }}
                </h1>
                @foreach ($order->orders as $order)
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
                                class="{{ $order->status == 'approved' ? 'bg-green-400' : ($order->status == 'pending' ? 'bg-yellow-400' : 'bg-red-400') }} absolute md:-left-1 left-2 md:top-0 top-3 h-2.5 w-2.5 border-white dark:border-slate-700 border-2 rounded-full"></span>

                            <p
                                class="text-xs md:truncate pl-3  w-auto font-semibold text-slate-500/80 dark:text-slate-50">
                                {{ $order->id ?? __('Unavailable') }}
                            </p>
                        </div>


                        <div
                            class="relative max-w-xs text-xs md:text-center text-start md:w-1/5 w-full md:m-3 md:p-0 p-1.5 font-semibold text-slate-500/80 flex md:justify-center justify-start items-center">
                            <a href="{{ route('orders.show', $order) }}" class="p-1 text-emerald-400 rounded-md mx-1 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>

                            </a>
                            @can('isSupperAdmin')
                                <a href="{{ route('orders.edit', $order) }}"
                                    class="p-1 text-primary-400 rounded-md mx-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <a href="" class="p-1 text-red-400 rounded-md mx-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                                    </svg>
                                </a>
                            @endcan
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
            </div>
        @else
            <div class="relative px-2 w-full">
                <h1 class=" text-sm font-medium text-gray-700 dark:text-white block mx-1 py-2 ">{{ __('Orders') }}
                </h1>
                <div
                    class="relative h-60 p-10 flex justify-center items-center rounded-md border-2 border-dashed border-gray-300">
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
                                class="relative cursor-pointer rounded-md bg-white font-medium text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-500 focus-within:ring-offset-2 hover:text-primary-500">
                                <span>{{ __('Go back') }}</span>
                            </a>
                        </div>
                        <p class="text-xs text-gray-500">{{ __('No orders are available') }}.</p>
                    </div>
                </div>
            </div>
        @endif


    </x-client>

</x-client-layout>
