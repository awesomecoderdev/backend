<x-guest-layout>
    @section('head')
        <title>{{ __('Log in') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="min-h-screen bg-cover "
        style="background-image: url('https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80')">
        <div class="flex flex-col min-h-screen bg-black/60">
            <x-container class=" flex flex-col flex-1 px-6 py-12 mx-auto">
                <div class="flex-1 lg:flex lg:items-center lg:-mx-6">
                    <div class="text-white lg:w-1/2 lg:mx-6">
                        <h1 class="text-3xl font-semibold capitalize lg:text-4xl">
                            {{ __('AI assistant for check plagiarism') }}</h1>

                        <p class="max-w-sm my-6">
                            {{ __('No more constant context switching! Focus on business problems instead of hunting for plagiarism and unique contents.') }}
                        </p>


                        <a href="{{ route('register') }}"
                            class=" px-8 py-3 my-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-primary-400 focus:ring-opacity-50">
                            {{ __('Join Now') }}
                        </a>

                        <div class="mt-6 md:mt-8">
                            <h3 class="text-slate-300 ">{{ __('Follow us') }}</h3>

                            <div class="flex mt-4 -mx-1.5 ">
                                <a class="mx-1.5 text-white transition-colors duration-300 transform hover:text-blue-500"
                                    href="#">
                                    <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z" />
                                    </svg>
                                </a>

                                <a class="mx-1.5 text-white transition-colors duration-300 transform hover:text-blue-500"
                                    href="#">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z"
                                            fill="currentColor" />
                                        <path d="M7.2 9.6001H4V19.2001H7.2V9.6001Z" fill="currentColor" />
                                        <path
                                            d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>

                                <a class="mx-1.5 text-white transition-colors duration-300 transform hover:text-blue-500"
                                    href="#">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>

                                <a class="mx-1.5 text-white transition-colors duration-300 transform hover:text-blue-500"
                                    href="#">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.9294 7.72275C9.65868 7.72275 7.82715 9.55428 7.82715 11.825C7.82715 14.0956 9.65868 15.9271 11.9294 15.9271C14.2 15.9271 16.0316 14.0956 16.0316 11.825C16.0316 9.55428 14.2 7.72275 11.9294 7.72275ZM11.9294 14.4919C10.462 14.4919 9.26239 13.2959 9.26239 11.825C9.26239 10.354 10.4584 9.15799 11.9294 9.15799C13.4003 9.15799 14.5963 10.354 14.5963 11.825C14.5963 13.2959 13.3967 14.4919 11.9294 14.4919ZM17.1562 7.55495C17.1562 8.08692 16.7277 8.51178 16.1994 8.51178C15.6674 8.51178 15.2425 8.08335 15.2425 7.55495C15.2425 7.02656 15.671 6.59813 16.1994 6.59813C16.7277 6.59813 17.1562 7.02656 17.1562 7.55495ZM19.8731 8.52606C19.8124 7.24434 19.5197 6.10901 18.5807 5.17361C17.6453 4.23821 16.51 3.94545 15.2282 3.88118C13.9073 3.80621 9.94787 3.80621 8.62689 3.88118C7.34874 3.94188 6.21341 4.23464 5.27444 5.17004C4.33547 6.10544 4.04628 7.24077 3.98201 8.52249C3.90704 9.84347 3.90704 13.8029 3.98201 15.1238C4.04271 16.4056 4.33547 17.5409 5.27444 18.4763C6.21341 19.4117 7.34517 19.7045 8.62689 19.7687C9.94787 19.8437 13.9073 19.8437 15.2282 19.7687C16.51 19.708 17.6453 19.4153 18.5807 18.4763C19.5161 17.5409 19.8089 16.4056 19.8731 15.1238C19.9481 13.8029 19.9481 9.84704 19.8731 8.52606ZM18.1665 16.5412C17.8881 17.241 17.349 17.7801 16.6456 18.0621C15.5924 18.4799 13.0932 18.3835 11.9294 18.3835C10.7655 18.3835 8.26272 18.4763 7.21307 18.0621C6.51331 17.7837 5.9742 17.2446 5.69215 16.5412C5.27444 15.488 5.37083 12.9888 5.37083 11.825C5.37083 10.6611 5.27801 8.15832 5.69215 7.10867C5.97063 6.40891 6.50974 5.8698 7.21307 5.58775C8.26629 5.17004 10.7655 5.26643 11.9294 5.26643C13.0932 5.26643 15.596 5.17361 16.6456 5.58775C17.3454 5.86623 17.8845 6.40534 18.1665 7.10867C18.5843 8.16189 18.4879 10.6611 18.4879 11.825C18.4879 12.9888 18.5843 15.4916 18.1665 16.5412Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 lg:w-1/2 lg:mx-6">
                        <div
                            class="w-full px-8 py-10 mx-auto overflow-hidden bg-white shadow-2xl rounded-xl dark:bg-slate-900 lg:max-w-xl">
                            <a href="{{ route('index') }}"
                                class="relative flex justify-center mb-4 transform scale-125">
                                <x-application-logo />
                            </a>
                            <div class="relative w-full max-w-sm mx-auto ">
                                <p class="text-xl text-center text-slate-600 dark:text-slate-200">
                                    Welcome back!
                                </p>
                                <a href="{{ route('oauth.login', ['driver' => 'google']) }}"
                                    class="flex items-center justify-center mt-4 text-slate-600 transition-colors duration-300 transform border rounded-lg dark:border-primary-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-600">
                                    <div class="px-2 py-2">
                                        <svg class="w-6 h-6" viewBox="0 0 40 40">
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
                                    </div>

                                    <span class=" py-3 font-bold text-center">{{ __('Sign in with Google') }}</span>
                                </a>


                                <div class="flex items-center justify-between mt-4">
                                    <span class="w-1/5 border-b dark:border-primary-600 lg:w-1/4"></span>
                                    <p
                                        class="text-xs text-center text-slate-500 uppercase dark:text-slate-400 hover:underline">
                                        {{ __('or login  with email') }}
                                    </p>
                                    <span class="w-1/5 border-b dark:border-primary-400 lg:w-1/4"></span>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mt-4">
                                        <label class="block mb-2 text-sm font-medium text-slate-600 dark:text-slate-200"
                                            for="email">{{ __('Email Address') }}</label>
                                        <input type="text" name="email" id="email" autocomplete="email"
                                            value="{{ old('email') }}" placeholder="{{ __('Email Address') }}"
                                            class="px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('email') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300">
                                    </div>

                                    <div class="mt-4">
                                        <div class="flex justify-between">
                                            <label
                                                class="block mb-2 text-sm font-medium text-slate-600 dark:text-slate-200"
                                                for="password">{{ __('Password') }}</label>
                                            <a href="{{ route('password.request') }}"
                                                class="text-xs text-slate-500 dark:text-slate-300 hover:underline">{{ __('Forget Password?') }}</a>
                                        </div>

                                        <input id="password" name="password" value="{{ old('password') }}"
                                            placeholder="{{ __('Enter Password') }}"
                                            class="px-4 py-3 block w-full rounded-lg border-spacing-1 border-2 @error('password') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 @enderror  dark:bg-gray-800  shadow-sm  sm:text-sm focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-primary-300"
                                            type="password" placeholder="{{ __('Password') }}" />
                                    </div>

                                    <div class="mt-6">
                                        <button type="submit"
                                            class="w-full px-6 py-3 transition-all text-sm font-medium tracking-wide text-white dark:bg-slate-800 capitalize duration-300 transform bg-slate-800 rounded-lg hover:bg-slate-700 focus:outline-none focus:ring focus:ring-primary-300 focus:ring-opacity-50">
                                            {{ __('Sign In') }}
                                        </button>
                                    </div>

                                </form>
                                <div class="flex items-center justify-between mt-4">
                                    <span class="w-1/5 border-b dark:border-primary-600 md:w-1/4"></span>
                                    <a href="{{ route('register') }}"
                                        class="text-xs text-slate-500 uppercase dark:text-slate-400 hover:underline">{{ __('or sign up') }}</a>

                                    <span class="w-1/5 border-b dark:border-primary-600 md:w-1/4"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-container>
        </div>
    </section>
</x-guest-layout>
