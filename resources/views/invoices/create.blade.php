<x-app-layout>
    @section('head')
        <title>{{ __('Create User') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-content>
        <x-slot name="notifications">
            {{-- @if ($errors->any())
                @foreach ($errors->all() as $key => $error)
                    <x-alert delay="{{ $key }}" end="4" autoclose='true' type="error" title="Error!"
                        message="{{ $error }}" />
                @endforeach
            @endif --}}

            {{-- @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif --}}
        </x-slot>

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mt-10 sm:mt-0 ">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:col-span-6 md:mt-0">
                        <div class="overflow-hidden sm:rounded-md border border-gray-200 dark:border-slate-800">
                            <div class="relative p-5">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('First name') }}</label>
                                        <input type="text" name="first_name" id="first_name"
                                            autocomplete="given-name" value="{{ old('first_name') }}"
                                            class="mt-1 block w-full rounded-md @error('first_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror dark:bg-gray-800 shadow-sm  sm:text-sm">
                                        {{-- @error('first_name')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last_name"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Last name') }}</label>
                                        <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                                            value="{{ old('last_name') }}"
                                            class="mt-1 block w-full rounded-md @error('last_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">

                                        {{-- @error('last_name')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Email address') }}</label>
                                        <input type="text" name="email" id="email" autocomplete="email"
                                            value="{{ old('email') }}" {{-- class="mt-1 block w-full rounded-md border-gray-200 dark:border-slate-500 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm  dark:bg-gray-800 " --}}
                                            class="mt-1 block w-full rounded-md @error('email') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">
                                        {{-- @error('email')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Country') }}</label>
                                        {!! Form::select('country', Arr::pluck(config('country.list'), 'name', 'name'), 'Bangladesh', [
                                            'class' =>
                                                ' mt-1 block w-full rounded-md border border-gray-200 dark:border-slate-500 bg-white py-2 px-3 shadow-sm focus:border-primary-500 focus:outline-none focus:ring-primary-500 sm:text-sm  dark:bg-gray-800 ',
                                            'id' => 'country',
                                            'autocomplete' => 'country',
                                            // 'disabled' => true,
                                        ]) !!}
                                        {{-- @error('country')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="password"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Password') }}</label>
                                        <input type="password" name="password" id="password" autocomplete="password"
                                            value="{{ old('password') }}"
                                            class="mt-1 block w-full rounded-md @error('password') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror dark:bg-gray-800 shadow-sm  sm:text-sm">
                                        {{-- @error('password')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="confirmed"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Confirm password') }}</label>
                                        <input type="password" name="confirmed" id="confirmed" autocomplete="confirmed"
                                            value="{{ old('confirmed') }}"
                                            class="mt-1 block w-full rounded-md @error('confirmed') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">

                                        {{-- @error('confirmed')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6">
                                        <label for="street-address"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Street address') }}</label>
                                        <input type="text" name="street-address" id="street-address"
                                            autocomplete="street-address"
                                            class="mt-1 block w-full rounded-md @error('address') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                        {{-- @error('address')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="city"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('City') }}</label>
                                        <input type="text" name="city" id="city"
                                            autocomplete="address-level2"
                                            class="mt-1 block w-full rounded-md @error('city') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">

                                        {{-- @error('city')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="region"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('State / Province') }}</label>
                                        <input type="text" name="region" id="region"
                                            autocomplete="address-level1"
                                            class="mt-1 block w-full rounded-md @error('state') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror dark:bg-gray-800  shadow-sm  sm:text-sm">
                                        {{-- @error('state')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="postal-code"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('ZIP / Postal code') }}</label>
                                        <input type="text" name="postal-code" id="postal-code"
                                            autocomplete="postal-code"
                                            class="mt-1 block w-full rounded-md @error('zip') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                        {{-- @error('zip')
                                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                <span class="font-medium">{{ __('Oops!') }} </span>{{ __($message) }}
                                            </p>
                                        @enderror --}}
                                    </div>
                                </div>
                            </div>
                            <div class=" bg-gray-50  dark:bg-gray-700/10 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg> --}}
                                    <span class="mx-2">
                                        {{ __('Save') }}
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </x-content>

</x-app-layout>
