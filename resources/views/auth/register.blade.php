<x-guest-layout>
    @section('head')
        <title>{{ __('Register') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection

    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="flex justify-center min-h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/5"
                style="background-image: url('https://images.unsplash.com/photo-1494621930069-4fd4b2e24a11?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=715&q=80')">
            </div>

            <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                <div class="w-full">
                    <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                        Get your free account now.
                    </h1>

                    <p class="mt-4 text-gray-500 dark:text-gray-400">
                        Let’s get you all set up so you can verify your personal account and begin setting up your
                        profile.
                    </p>

                    <form method="POST" action="{{ route('register') }}"
                        class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
                        @csrf

                        <div>
                            <label
                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200">{{ __('First Name') }}</label>
                            <input type="text" placeholder="Mohammad" name="first_name"
                                value="{{ old('first_name') }}"
                                class="dark:placeholder-zinc-400 dark:text-white px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('first_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300">
                        </div>

                        <div>
                            <label
                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200">{{ __('Last Name') }}</label>
                            <input type="text" placeholder="Ibrahim" name="last_name" value="{{ old('last_name') }}"
                                class="dark:placeholder-zinc-400 dark:text-white px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('last_name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300">
                        </div>

                        <div>
                            <label
                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200">{{ __('Phone Number') }}</label>
                            <input type="text" placeholder="XXX-XX-XXXX-XXX" name="phone"
                                value="{{ old('phone') }}"
                                class="dark:placeholder-zinc-400 dark:text-white px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('phone') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300">
                        </div>

                        <div>
                            <label
                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200">{{ __('Email Address') }}</label>
                            <input type="email" placeholder="email@example.com" name="email"
                                value="{{ old('email') }}" {{-- class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" /> --}}
                                class="dark:placeholder-zinc-400 dark:text-white px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('email') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300">

                        </div>

                        <div>
                            <label
                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200">{{ __('Password') }}</label>
                            <input type="password" placeholder="Enter your password" name="password"
                                value="{{ old('password') }}"
                                class="dark:placeholder-zinc-400 dark:text-white px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('password') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300">
                        </div>

                        <div>
                            <label
                                class="block mb-2 text-sm text-gray-600 dark:text-gray-200">{{ __('Confirm Password') }}</label>
                            <input type="password" placeholder="Enter your password" name="confirmed"
                                value="{{ old('confirmed') }}"
                                class="dark:placeholder-zinc-400 dark:text-white px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('confirmed') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300">
                        </div>

                        <button
                            class="flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            <span>{{ __('Sign Up') }} </span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <a href="{{ route('oauth.login', ['driver' => 'google']) }}"
                            class="flex items-center justify-center px-6 py-3 text-gray-600 transition-colors duration-300 transform border rounded-lg dark:border-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 mx-2 pointer-events-none" viewBox="0 0 40 40">
                                <path
                                    d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                    fill="#FFC107" />
                                <path
                                    d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                                    fill="#FF3D00" />
                                <path
                                    d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                                    fill="#4CAF50" />
                                <path
                                    d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                                    fill="#1976D2" />
                            </svg>

                            <span class="mx-2 pointer-events-none">{{ __('Continue with Google') }}</span>
                        </a>
                    </form>

                    <div class="flex justify-center items-center">
                        <a href="{{ route('login') }}" class=" mt-6 text-center ">
                            <p class="text-sm text-blue-500 hover:underline dark:text-blue-400">
                                {{ __('Already have an account? Log in') }}
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
