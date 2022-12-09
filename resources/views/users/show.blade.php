<x-app-layout>
    @section('head')
        <title>{{ __($user->name()) }} | Wp Plagirasm</title>
    @endsection
    <x-content>
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-6 md:mt-0">
                    <form action="#" method="POST">
                        <div class="overflow-hidden sm:rounded-md">
                            <div class="p-2">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name"
                                            class="block text-sm font-medium text-gray-700">{{ __('First name') }}</label>
                                        <input type="text" name="first-name" id="first-name"
                                            autocomplete="given-name" value="{{ $user->first_name }}" disabled
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last-name"
                                            class="block text-sm font-medium text-gray-700">{{ __('Last name') }}</label>
                                        <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                            disabled value="{{ $user->last_name }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email-address"
                                            class="block text-sm font-medium text-gray-700">{{ __('Email address') }}</label>
                                        <input type="text" name="email-address" id="email-address"
                                            autocomplete="email" value="{{ $user->email }}" disabled
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="country"
                                            class="block text-sm font-medium text-gray-700">{{ __('Country') }}</label>
                                        {!! Form::select('country', Arr::pluck(config('country.list'), 'name', 'name'), 'Bangladesh', [
                                            'class' =>
                                                'mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm',
                                            'id' => 'country',
                                            'autocomplete' => 'country-name',
                                            'disabled' => true,
                                        ]) !!}
                                    </div>

                                    <div class="col-span-6">
                                        <label for="street-address"
                                            class="block text-sm font-medium text-gray-700">{{ __('Street address') }}</label>
                                        <input type="text" name="street-address" id="street-address" disabled
                                            autocomplete="street-address"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="city"
                                            class="block text-sm font-medium text-gray-700">{{ __('City') }}</label>
                                        <input type="text" name="city" id="city" disabled
                                            autocomplete="address-level2"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="region"
                                            class="block text-sm font-medium text-gray-700">{{ __('State / Province') }}</label>
                                        <input type="text" name="region" id="region" disabled
                                            autocomplete="address-level1"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="postal-code"
                                            class="block text-sm font-medium text-gray-700">{{ __('ZIP / Postal code') }}</label>
                                        <input type="text" name="postal-code" id="postal-code" disabled
                                            autocomplete="postal-code"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </x-content>

</x-app-layout>
