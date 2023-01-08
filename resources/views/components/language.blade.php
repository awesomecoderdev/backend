<x-dropdown align="right" width="w-40 "
    class="bg-gray-100 dark:bg-slate-800 text-gray-500 overflow-hidden dark:text-white ">
    <x-slot name="trigger">
        <button
            class="md:flex hidden items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 ">
            <div>
                @if (app()->getLocale() == 'en')
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="h-5 w-auto mt-0.5">
                        <path fill="#00247D"
                            d="M0 9.059V13h5.628zM4.664 31H13v-5.837zM23 25.164V31h8.335zM0 23v3.941L5.63 23zM31.337 5H23v5.837zM36 26.942V23h-5.631zM36 13V9.059L30.371 13zM13 5H4.664L13 10.837z" />
                        <path fill="#CF1B2B"
                            d="M25.14 23l9.712 6.801c.471-.479.808-1.082.99-1.749L28.627 23H25.14zM13 23h-2.141l-9.711 6.8c.521.53 1.189.909 1.938 1.085L13 23.943V23zm10-10h2.141l9.711-6.8c-.521-.53-1.188-.909-1.937-1.085L23 12.057V13zm-12.141 0L1.148 6.2C.677 6.68.34 7.282.157 7.949L7.372 13h3.487z" />
                        <path fill="#EEE"
                            d="M36 21H21v10h2v-5.836L31.335 31H32c1.117 0 2.126-.461 2.852-1.199L25.14 23h3.487l7.215 5.052c.093-.337.158-.686.158-1.052v-.058L30.369 23H36v-2zM0 21v2h5.63L0 26.941V27c0 1.091.439 2.078 1.148 2.8l9.711-6.8H13v.943l-9.914 6.941c.294.07.598.116.914.116h.664L13 25.163V31h2V21H0zM36 9c0-1.091-.439-2.078-1.148-2.8L25.141 13H23v-.943l9.915-6.942C32.62 5.046 32.316 5 32 5h-.663L23 10.837V5h-2v10h15v-2h-5.629L36 9.059V9zM13 5v5.837L4.664 5H4c-1.118 0-2.126.461-2.852 1.2l9.711 6.8H7.372L.157 7.949C.065 8.286 0 8.634 0 9v.059L5.628 13H0v2h15V5h-2z" />
                        <path fill="#CF1B2B" d="M21 15V5h-6v10H0v6h15v10h6V21h15v-6z" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="h-5 w-auto mt-0.5">
                        <path fill="#006A4D"
                            d="M36 27c0 2.209-1.791 4-4 4H4c-2.209 0-4-1.791-4-4V9c0-2.209 1.791-4 4-4h28c2.209 0 4 1.791 4 4v18z" />
                        <circle fill="#F42A41" cx="16" cy="17.5" r="7" />
                    </svg>
                @endif
            </div>

            <div class="ml-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        @foreach (config('app.available_locales') as $name => $lang)
            <form action="{{ route('language.change', $lang) }}" method="POST">
                @csrf
                <button
                    class="relative w-full bg-white dark:bg-slate-900  dark:text-white  dark:hover:bg-slate-700/50 block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    <div class="flex items-center">
                        @if ($lang === 'en')
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="h-5 w-auto mr-2 mt-0.5">
                                <path fill="#00247D"
                                    d="M0 9.059V13h5.628zM4.664 31H13v-5.837zM23 25.164V31h8.335zM0 23v3.941L5.63 23zM31.337 5H23v5.837zM36 26.942V23h-5.631zM36 13V9.059L30.371 13zM13 5H4.664L13 10.837z" />
                                <path fill="#CF1B2B"
                                    d="M25.14 23l9.712 6.801c.471-.479.808-1.082.99-1.749L28.627 23H25.14zM13 23h-2.141l-9.711 6.8c.521.53 1.189.909 1.938 1.085L13 23.943V23zm10-10h2.141l9.711-6.8c-.521-.53-1.188-.909-1.937-1.085L23 12.057V13zm-12.141 0L1.148 6.2C.677 6.68.34 7.282.157 7.949L7.372 13h3.487z" />
                                <path fill="#EEE"
                                    d="M36 21H21v10h2v-5.836L31.335 31H32c1.117 0 2.126-.461 2.852-1.199L25.14 23h3.487l7.215 5.052c.093-.337.158-.686.158-1.052v-.058L30.369 23H36v-2zM0 21v2h5.63L0 26.941V27c0 1.091.439 2.078 1.148 2.8l9.711-6.8H13v.943l-9.914 6.941c.294.07.598.116.914.116h.664L13 25.163V31h2V21H0zM36 9c0-1.091-.439-2.078-1.148-2.8L25.141 13H23v-.943l9.915-6.942C32.62 5.046 32.316 5 32 5h-.663L23 10.837V5h-2v10h15v-2h-5.629L36 9.059V9zM13 5v5.837L4.664 5H4c-1.118 0-2.126.461-2.852 1.2l9.711 6.8H7.372L.157 7.949C.065 8.286 0 8.634 0 9v.059L5.628 13H0v2h15V5h-2z" />
                                <path fill="#CF1B2B" d="M21 15V5h-6v10H0v6h15v10h6V21h15v-6z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="h-5 w-auto mr-2 mt-0.5">
                                <path fill="#006A4D"
                                    d="M36 27c0 2.209-1.791 4-4 4H4c-2.209 0-4-1.791-4-4V9c0-2.209 1.791-4 4-4h28c2.209 0 4 1.791 4 4v18z" />
                                <circle fill="#F42A41" cx="16" cy="17.5" r="7" />
                            </svg>
                        @endif
                        <span>
                            {{ $name }}
                        </span>
                    </div>
                </button>
            </form>
        @endforeach
    </x-slot>
</x-dropdown>
