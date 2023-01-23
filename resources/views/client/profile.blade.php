<x-client-layout>
    @section('head')
        <title>{{ __('Profile') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <form action="{{ base(route('client.profile.update')) }}" method="post">
            @csrf
            <div class="mt-10 sm:mt-0 overflow-hidden sm:rounded-md border border-gray-200 dark:border-slate-800">
                <div class="space-y-6 px-4 py-5 sm:p-6">

                    <div>
                        <label for="about"
                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('About') }}</label>
                        <div class="mt-1">
                            <textarea id="about" name="about" rows="5"
                                class="mt-1 block w-full bg-slate-50 dark:bg-slate-800 rounded-md @error('about') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else  focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  sm:text-sm"
                                placeholder="you@example.com"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-slate-200">
                            {{ __('Brief description for your profile.') }}</p>
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Photo') }}</label>
                        <div class="mt-1 flex items-center">

                            <div
                                class="relative h-12 w-12 flex justify-center items-center rounded-full overflow-hidden border-primary-500 bg-slate-500 dark:bg-slate-700  ">
                                @if ($user->avatar)
                                    <img loading="lazy" src="{{ $user->avatar }}" alt="{{ $user->fullname() }}">
                                @else
                                    <h2 class="text-slate-100 font-semibold text-sm ">
                                        {{ strtoupper(substr($user->first_name ?? $user->email, 0, 1)) }}
                                    </h2>
                                @endif
                            </div>
                            <button type="button"
                                class="ml-5 rounded-md border border-gray-300 bg-white dark:bg-slate-700 py-2 px-3 text-sm font-medium leading-4 text-gray-700 dark:text-white shadow-sm hover:bg-gray-50 dark:hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Change</button>
                        </div>
                    </div>

                    <div>
                        <div
                            class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="avatar"
                                        class="relative cursor-pointer rounded-md  font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>{{ __('Upload a file') }}</span>
                                        <input id="avatar" name="avatar" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">{{ __('or drag and drop') }}</p>
                                </div>
                                <p class="text-xs text-gray-500">{{ __('PNG, JPG, GIF up to 1MB') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:col-span-6 md:mt-0">
                        <div class="relative">
                            <div class="relative p-5">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('First name') }}</label>
                                        <input type="text" name="first_name" id="first_name"
                                            autocomplete="given-name"
                                            value="{{ old('first_name') ?? $user->first_name }}"
                                            class="mt-1 block w-full rounded-md @error('first_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last_name"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Last name') }}</label>
                                        <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                                            value="{{ old('last_name') ?? $user->last_name }}"
                                            class="mt-1 block w-full rounded-md @error('last_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Email address') }}</label>
                                        <input type="text" name="email" id="email" readonly disabled
                                            autocomplete="email" value="{{ old('email') ?? $user->email }}"
                                            class="mt-1 block w-full rounded-md @error('email') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">
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
                                    </div>

                                    {{-- <div class="col-span-6 sm:col-span-3">
                                        <label for="password"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Password') }}</label>
                                        <input type="password" name="password" id="password" disabled
                                            autocomplete="password" value="{{ old('password') }}"
                                            class="mt-1 block w-full rounded-md @error('password') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="confirmed"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Confirm password') }}</label>
                                        <input type="password" name="confirmed" id="confirmed" disabled
                                            autocomplete="confirmed" value="{{ old('confirmed') }}"
                                            class="mt-1 block w-full rounded-md @error('confirmed') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">
                                    </div> --}}

                                    <div class="col-span-6">
                                        <label for="address"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Street address') }}</label>
                                        <input type="text" name="address" id="address" autocomplete="address"
                                            placeholder="{{ __('Street address') }}"
                                            class="mt-1 block w-full rounded-md @error('address') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="city"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('City') }}</label>
                                        <input type="text" name="city" id="city"
                                            autocomplete="address-level2" placeholder="{{ __('City') }}"
                                            class="mt-1 block w-full rounded-md @error('city') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="region"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('State / Province') }}</label>
                                        <input type="text" name="region" id="region"
                                            autocomplete="address-level1" placeholder="{{ __('State / Province') }}"
                                            class="mt-1 block w-full rounded-md @error('state') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror dark:bg-gray-800  shadow-sm  sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="postal-code"
                                            class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('ZIP / Postal code') }}</label>
                                        <input type="text" name="postal-code" id="postal-code"
                                            placeholder="{{ __('ZIP / Postal code') }}" autocomplete="postal-code"
                                            class="mt-1 block w-full rounded-md @error('zip') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                    </div>
                                </div>
                            </div>
                            <div class=" bg-gray-50  dark:bg-gray-700/10 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                    <span class="mx-2">
                                        {{ __('Update') }}
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-client>

</x-client-layout>
