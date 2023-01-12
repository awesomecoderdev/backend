<x-client-layout>
    @section('head')
        <title>{{ __('Chat') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <div class="min-w-full rounded lg:grid lg:grid-cols-4">
            <div class="relative border-r border-gray-200 dark:border-slate-800 lg:col-span-1 pr-4">
                <form method="GET"
                    action="{{ base(route(Route::currentRouteName(), ['search' => request('search')])) }}"
                    class="relative flex justify-center items-center pb-4 mb-2 border-b border-gray-200 dark:border-slate-800 ">
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        placeholder="{{ __('Search') }}..."
                        class="block lg:w-screen w-auto max-w-sm pr-8 rounded-md focus:border-primary-500 focus:ring-primary-500 border-gray-200 dark:border-slate-800 dark:bg-gray-800 shadow-sm sm:text-sm">
                    <button type="submit" class="absolute right-2 mt-0.5 rounded-full ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 pointer-events-none">
                            <path fill-rule="evenodd"
                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
                <div class="overflow-auto h-[32rem]">
                    {{-- <h2 class="my-2 mb-2 ml-2 text-sm text-gray-600 dark:text-slate-200">{{ __('Chats') }}</h2> --}}
                    <div class="relative">
                        <a
                            class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="https://cdn.pixabay.com/photo/2018/09/12/12/14/man-3672010__340.jpg"
                                alt="username" />
                            <div class="w-full pb-2">
                                <div class="flex justify-between">
                                    <span class="block ml-2 font-semibold text-gray-600">Jhon Don</span>
                                    <span class="block ml-2 text-sm text-gray-600">25 minutes</span>
                                </div>
                                <span class="block ml-2 text-sm text-gray-600">bye</span>
                            </div>
                        </a>
                        <a
                            class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out bg-gray-100 border-b border-gray-300 cursor-pointer focus:outline-none">
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="https://cdn.pixabay.com/photo/2016/06/15/15/25/loudspeaker-1459128__340.png"
                                alt="username" />
                            <div class="w-full pb-2">
                                <div class="flex justify-between">
                                    <span class="block ml-2 font-semibold text-gray-600">Same</span>
                                    <span class="block ml-2 text-sm text-gray-600">50 minutes</span>
                                </div>
                                <span class="block ml-2 text-sm text-gray-600">Good night</span>
                            </div>
                        </a>
                        <a
                            class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none">
                            <img class="object-cover w-10 h-10 rounded-full"
                                src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                                alt="username" />
                            <div class="w-full pb-2">
                                <div class="flex justify-between">
                                    <span class="block ml-2 font-semibold text-gray-600">Emma</span>
                                    <span class="block ml-2 text-sm text-gray-600">6 hour</span>
                                </div>
                                <span class="block ml-2 text-sm text-gray-600">Good Morning</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden lg:col-span-3 lg:block">
                <div class="w-full">
                    <div class="relative flex items-center p-3 border-b border-gray-300">
                        <img class="object-cover w-10 h-10 rounded-full"
                            src="https://cdn.pixabay.com/photo/2018/01/15/07/51/woman-3083383__340.jpg"
                            alt="username" />
                        <span class="block ml-2 font-bold text-gray-600">Emma</span>
                        <span class="absolute w-3 h-3 bg-green-600 rounded-full left-10 top-3">
                        </span>
                    </div>
                    <div class="relative w-full p-6 overflow-y-auto h-auto min-h-[50vh]">
                        <ul class="space-y-2">
                            <li class="flex justify-start">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                    <span class="block">Hi</span>
                                </div>
                            </li>
                            <li class="flex justify-end">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                    <span class="block">Hiiii</span>
                                </div>
                            </li>
                            <li class="flex justify-end">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 bg-gray-100 rounded shadow">
                                    <span class="block">how are you?</span>
                                </div>
                            </li>
                            <li class="flex justify-start">
                                <div class="relative max-w-xl px-4 py-2 text-gray-700 rounded shadow">
                                    <span class="block">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="flex items-center justify-between w-full p-3 border-t border-gray-300">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                        </button>

                        <input type="text" placeholder="Message"
                            class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                            name="message" required />
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                            </svg>
                        </button>
                        <button type="submit">
                            <svg class="w-5 h-5 text-gray-500 origin-center transform rotate-90"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-client>

</x-client-layout>
