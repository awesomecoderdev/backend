<x-guest-layout>
    @section('head')
        <title>{{ __('Email Verification') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    {{-- <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div> --}}

    <section class="bg-white dark:bg-gray-900">
        <div class="container flex flex-col items-center justify-center min-h-screen px-6 mx-auto">
            <div class="flex justify-center mx-auto">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />

            </div>

            {{-- <h1
                class="mt-4 text-2xl font-semibold tracking-wide text-center text-gray-800 capitalize md:text-3xl dark:text-white">
                welcome Back
            </h1> --}}

            <div class="flex items-center mt-6">
                <div class="flex items-center mx-2">
                    {{-- <img class="object-cover w-8 h-8 mx-1 rounded-full"
                        src="https://images.unsplash.com/photo-1628890923662-2cb23c2e0cfe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt=""> --}}
                    <div
                        class="relative flex justify-center items-center  w-9 h-9 rounded-full overflow-hidden border-primary-500 bg-slate-500 dark:bg-slate-700  ">
                        @if (Auth::user()->avatar)
                            <img loading="lazy" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->fullname() }}">
                        @else
                            <h2 class="text-slate-100 font-semibold text-sm text-center ">
                                {{ strtoupper(substr(Auth::user()->first_name ?? Auth::user()->email, 0, 1)) }}
                            </h2>
                        @endif
                    </div>

                    <span class="mx-2 text-gray-800 dark:text-white">{{ Auth::user()->fullname() }}</span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-blue-500 dark:text-blue-400 focus:outline-none hover:underline">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>


            <p class="mt-6 text-gray-500 dark:text-gray-400">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>

            <div class="w-full max-w-md mx-auto mt-6">
                <form>
                    {{--
                    <button
                        class="w-full px-6 py-3 mt-4 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        “Continue”
                    </button> --}}
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button
                                class="w-full px-6 py-3 mt-4 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    {{-- <p class="mt-6 text-gray-500 dark:text-gray-400">
                        By clicking “Continue” above, you acknowledge that you have read and
                        understood, and agree to Our <a href="#" class="text-gray-700 dark:text-white">Term &
                            Conditions</a>
                        and<a href="#" class="text-gray-700 dark:text-white"> Privacy Policy.</a>
                    </p> --}}
                </form>
            </div>
        </div>
    </section>

</x-guest-layout>
