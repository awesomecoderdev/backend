<x-app-layout>
    @section('head')
        <title>{{ __($user->fullname()) }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-content>
        {{-- @if ($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif --}}
        <div class="mt-10 sm:mt-0 ">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-6 md:mt-0">
                    <div class="overflow-hidden sm:rounded-md border-gray-200 dark:border-slate-800 ">
                        <div class="relative p-2">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name"
                                        class="block text-sm font-medium text-gray-700">{{ __('First name') }}</label>
                                    <input type="text" readonly name="first_name" id="first_name"
                                        autocomplete="given-name" value="{{ $user->first_name }}"
                                        class="mt-1 block w-full rounded-md @error('first_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    @error('first_name')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name"
                                        class="block text-sm font-medium text-gray-700">{{ __('Last name') }}</label>
                                    <input type="text" readonly name="last_name" id="last_name"
                                        autocomplete="family-name" value="{{ $user->last_name }}"
                                        class="mt-1 block w-full rounded-md @error('last_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">

                                    @error('last_name')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email-address"
                                        class="block text-sm font-medium text-gray-700">{{ __('Email address') }}</label>
                                    <input type="text" readonly name="email-address" id="email-address"
                                        autocomplete="email" value="{{ $user->email }}"
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
                                        class="block text-sm font-medium text-gray-700">{{ __('Country') }}</label>
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
                                        class="block text-sm font-medium text-gray-700">{{ __('Street address') }}</label>
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
                                        class="block text-sm font-medium text-gray-700">{{ __('City') }}</label>
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
                                        class="block text-sm font-medium text-gray-700">{{ __('State / Province') }}</label>
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
                                        class="block text-sm font-medium text-gray-700">{{ __('ZIP / Postal code') }}</label>
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
                    </div>
                </div>
            </div>
        </div>


    </x-content>

</x-app-layout>
