<x-client-layout>
    @section('head')
        <title>{{ __($plan->name) }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <div class="relative">
            {{-- <div
                class="inline-flex mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700  hover:text-gray-600  dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-800">
                <div class="relative">
                    <div class="p-3">
                        <span class="absolute right-0 top-0" @click="open = !open">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8 pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                        </span>
                        <h1 class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                            {{ __($plan->name) }}
                        </h1>

                        <p class="mt-4 text-gray-500 dark:text-gray-300">
                            {{ __($plan->description) }}
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>

                        <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-4xl dark:text-gray-300">
                            ${{ number_format($plan->price, 2) }}
                            <span class="text-base font-medium">/{{ __('Month') }}</span>
                        </h2>

                        <p class="mt-1 text-gray-500 dark:text-gray-300">
                            {{ __('Monthly payment') }}
                        </p>
                        <button
                            class="w-full px-4 py-2 mt-6 tracking-wide text-white capitalize transition-colors duration-300 transform bg-primary-600 rounded-md hover:bg-primary-500 focus:outline-none focus:bg-primary-500 focus:ring focus:ring-primary-300 focus:ring-opacity-80">
                            {{ __('Subscribe Now') }}
                        </button>
                    </div>

                    <hr class="border-gray-200 dark:border-gray-700">

                    <div class="p-3 ">
                        <h1 class="text-lg font-medium text-gray-700 capitalize lg:text-xl dark:text-white">
                            {{ __('What\'s included ?') }}
                        </h1>

                        <div class="mt-8 space-y-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-700 dark:text-gray-300">All limited
                                    links</span>
                            </div>

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-700 dark:text-gray-300">Own analytics
                                    platform</span>
                            </div>

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-700 dark:text-gray-300">Chat support</span>
                            </div>

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-700 dark:text-gray-300">Optimize
                                    hashtags</span>
                            </div>

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-700 dark:text-gray-300">Mobile app</span>
                            </div>

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="mx-4 text-gray-700 dark:text-gray-300">Unlimited users</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="relative">
            <form action="{{ route('client.plans.update', $plan) }}" id="checkout" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                {{-- @can('notSubscribedUser') --}}
                <div class="grid w-full gap-6 lg:grid-cols-3 ">
                    <div class="relative">
                        <div
                            class=" inline-flex mx-auto items-center justify-between w-full p-5 text-gray-500 bg-white hover:bg-gray-100 border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700  hover:text-gray-600  dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-800">
                            <div class="relative">
                                <div class="p-3">
                                    <h1
                                        class="text-xl font-medium text-gray-700 capitalize lg:text-3xl dark:text-white">
                                        {{ __($plan->name) }}
                                    </h1>

                                    <p class="mt-4 text-gray-500 dark:text-gray-300">
                                        {{ __($plan->description) }}
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>

                                    <h2 class="mt-4 text-2xl font-medium text-gray-700 sm:text-4xl dark:text-gray-300">
                                        ${{ number_format($plan->price, 2) }}
                                        <span class="text-base font-medium">/{{ __('Month') }}</span>
                                    </h2>

                                    <p class="mt-1 text-gray-500 dark:text-gray-300">
                                        {{ __('Monthly payment') }}
                                    </p>
                                </div>

                                <hr class="border-gray-200 dark:border-gray-700">

                                <div class="p-3 ">
                                    <h1 class="text-lg font-medium text-gray-700 capitalize lg:text-xl dark:text-white">
                                        {{ __('What\'s included ?') }}
                                    </h1>

                                    <div class="mt-8 space-y-4">
                                        @foreach ($plan->meta as $meta => $status)
                                            <div class="flex items-center">
                                                @if ($status)
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5 text-primary-500" viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                                <span
                                                    class="mx-4 text-gray-700 dark:text-gray-300">{{ __($meta) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class=" lg:col-span-2 relative md:my-0 my-3 p-1 text-gray-900 dark:text-white  border-gray-200 dark:border-gray-700 rounded-md">
                        <div class="md:grid md:grid-cols-3 md:gap-6 w-full absolute bottom-0">
                            <div class="mt-5 md:col-span-6 md:mt-0">
                                <div class="relative">
                                    <div class="relative p-5  ">
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
                                                <input type="text" name="last_name" id="last_name"
                                                    autocomplete="family-name"
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

                                            <div class="col-span-6">
                                                <label for="address"
                                                    class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('Street address') }}</label>
                                                <input type="text" name="address" id="address"
                                                    autocomplete="address" placeholder="{{ __('Street address') }}"
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
                                                    autocomplete="address-level1"
                                                    placeholder="{{ __('State / Province') }}"
                                                    class="mt-1 block w-full rounded-md @error('state') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror dark:bg-gray-800  shadow-sm  sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                <label for="postal-code"
                                                    class="block text-sm font-medium text-gray-700 dark:text-white">{{ __('ZIP / Postal code') }}</label>
                                                <input type="text" name="postal-code" id="postal-code"
                                                    placeholder="{{ __('ZIP / Postal code') }}"
                                                    autocomplete="postal-code"
                                                    class="mt-1 block w-full rounded-md @error('zip') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <div class="relative py-2">
                                                    <label for="card-holder-name"
                                                        class="block text-sm mb-1.5 font-medium text-gray-700 dark:text-white">{{ __('Cardholder\'s name') }}</label>
                                                    <input type="text" name="card-holder-name"
                                                        id="card-holder-name"
                                                        placeholder="{{ __('Cardholder\'s name') }}"
                                                        value="{{ old('card-holder-name') ?? Auth::user()->fullname() }}"
                                                        class="my-1 p-2 block w-full rounded-md @error('card-holder-name') border-red-200 ring-1 ring-red-500 focus:border-red-500 focus:ring-red-500 @else focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 @enderror  dark:bg-gray-800 shadow-sm  sm:text-sm">
                                                </div>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">

                                                <div class="relative  py-2">
                                                    <label for="card-element"
                                                        class="block text-sm font-medium text-gray-700 dark:text-white">
                                                        {{ __('Credit or debit card') }}
                                                    </label>
                                                    <div id="card-element"
                                                        class=" bg-white dark:bg-slate-800 border text-red p-2.5 mt-2 block w-full rounded-md focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-500 shadow-sm sm:text-sm">
                                                        <!-- A Stripe Element will be inserted here. -->
                                                    </div>
                                                    <p class="mt-2 font-medium text-sm text-red-600 dark:text-red-500"
                                                        style="opacity: 0;" id="card-errors">
                                                        {{ __('Oops!') }}
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class=" bg-gray-50  dark:bg-gray-700/10 px-4 py-3 text-right sm:px-6">
                                        <button type="submit" id="checkoutBtn"
                                            data-secret="{{ $intent->client_secret }}"
                                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>

                                            <span class="mx-2">
                                                {{ __('Subscribe Now') }}
                                            </span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endcan --}}
            </form>
        </div>
        {{-- @can('notSubscribedUser') --}}
        <script>
            if (typeof Stripe !== "undefined") {

                var stripe{{ md5($plan->stripe_plan . time()) }} = Stripe("{{ config('cashier.key') }}");
                var elements{{ md5($plan->stripe_plan . time()) }} = stripe{{ md5($plan->stripe_plan . time()) }}.elements();
                var cardHolderName = document.getElementById('card-holder-name');
                var clientSecret = document.getElementById('checkoutBtn').dataset.secret;
                var errorElement{{ md5($plan->stripe_plan . time()) }} = document.getElementById('card-errors');

                // Create an instance of the card Element.
                var card{{ md5($plan->stripe_plan . time()) }} = elements{{ md5($plan->stripe_plan . time()) }}.create(
                'card', {
                    style: {
                        base: {
                            iconColor: isDarkMode ? '#fff' : "#1e293b",
                            color: isDarkMode ? '#fff' : "#1e293b",
                            fontWeight: '500',
                            fontFamily: '"Poppins",Roboto, Open Sans, Segoe UI, sans-serif',
                            fontSize: '14px',
                            fontSmoothing: 'antialiased',
                            ':-webkit-autofill': {
                                color: isDarkMode ? '#fff' : "#fce883",
                            },
                            '::placeholder': {
                                color: isDarkMode ? '#fff' : "#1e293b",
                            },
                        },
                        invalid: {
                            // iconColor: '#FFC7EE',
                            // color: '#FFC7EE',
                        },
                    },
                });
                // Add an instance of the card Element into the `card` <div>.
                card{{ md5($plan->stripe_plan . time()) }}.mount('#card-element');

                // Create a token or display an error when the form is submitted.
                var form{{ md5($plan->stripe_plan . time()) }} = document.getElementById('checkout');
                form{{ md5($plan->stripe_plan . time()) }}
                    .addEventListener('submit', async (event) => {
                        event.preventDefault();

                        const {
                            setupIntent,
                            error
                        } = await stripe{{ md5($plan->stripe_plan . time()) }}.confirmCardSetup(
                            clientSecret, {
                                payment_method: {
                                    card: card{{ md5($plan->stripe_plan . time()) }},
                                    billing_details: {
                                        name: cardHolderName.value
                                    }
                                }
                            }
                        );

                        if (error) {
                            // Inform the customer that there was an error.
                            errorElement{{ md5($plan->stripe_plan . time()) }}.style.opacity = 1;
                            errorElement{{ md5($plan->stripe_plan . time()) }}.innerText =
                                `{{ __('Oops!') }} ${error.message}`;
                        } else {
                            // The card has been verified successfully...
                            errorElement{{ md5($plan->stripe_plan . time()) }}.style.opacity = 0;
                            errorElement{{ md5($plan->stripe_plan . time()) }}.innerText = ``;
                            console.log('setupIntent', setupIntent);
                            stripe{{ md5($plan->stripe_plan . time()) }}TokenHandler(setupIntent);
                        }
                    });


                var stripe{{ md5($plan->stripe_plan . time()) }}TokenHandler = (setupIntent) => {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form{{ md5($plan->stripe_plan . time()) }} = document.getElementById('checkout');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'paymentMethod');
                    hiddenInput.setAttribute('value', setupIntent.payment_method);
                    form{{ md5($plan->stripe_plan . time()) }}.appendChild(hiddenInput);

                    // Submit the form
                    form{{ md5($plan->stripe_plan . time()) }}.submit();
                }
            }
        </script>
        {{-- @endcan --}}

    </x-client>

</x-client-layout>
