<x-app-layout>
    @section('head')
        <title>{{ __('Chat') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-content>
        <div class="min-w-full rounded lg:grid lg:grid-cols-4">
            <div class="relative border-r border-gray-200 dark:border-slate-800 lg:col-span-1 pr-4">
                <form method="GET" action="{{ route('inbox', ['search' => request('search')]) }}"
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
                    <div class="relative space-y-2">
                        @if (isset($users) && !empty($users))
                            @foreach ($users as $user)
                                <a href="{{ route('inbox.show', ['user' => $user->id]) }}"
                                    class="relative h-16 my-1 flex items-center px-2 py-2 text-sm transition-all duration-150 ease-in-out border rounded-md border-gray-200 dark:border-slate-800 cursor-pointer hover:bg-slate-300 dark:hover:bg-gray-800 focus:outline-none">
                                    <div
                                        class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-200 hover:dark:text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 ">
                                        <div
                                            class="relative w-8 h-8 rounded-full overflow-hidden border-primary-500 bg-slate-500 dark:bg-slate-700  ">
                                            @if ($user->avatar)
                                                <img loading="lazy" class="h-full w-auto" src="{{ $user->avatar }}"
                                                    alt="{{ $user->name() ?? 'Unknown' }}">
                                            @else
                                                <div class="flex items-center justify-center h-full">
                                                    <h2 class="text-slate-100 font-semibold text-sm ">
                                                        {{ strtoupper(substr($user->first_name ?? $user->email, 0, 1)) }}
                                                    </h2>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="w-full pb-2">
                                        <div class="flex justify-between">
                                            <span
                                                class="block ml-2 font-semibold text-gray-600 dark:text-slate-100">{{ Str::limit($user->name() ?? 'Unknown', 18) }}</span>

                                        </div>
                                        <span class="block ml-2 text-sm text-gray-600 dark:text-slate-50">bye</span>
                                    </div>
                                    <span
                                        class="block ml-2 text-xs text-gray-600 dark:text-slate-500 absolute bottom-0 right-0 p-2">{{ Str::limit(
                                            $user->created_at->diffForHumans([
                                                // 'parts' => 2,
                                                // 'parts' => 3,
                                                // 'join' => ', ',
                                                // 'short' => true,
                                            ]),
                                            10,
                                            '...',
                                        ) }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-7 h-7 absolute top-0 right-0 p-1 pointer-events-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                                    </svg>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="relative hidden lg:col-span-3 lg:block">
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

                    <div
                        class="absolute bottom-0 w-full flex items-center justify-between w-full p-3 border-t border-gray-300">
                        <input type="text" placeholder="Message"
                            class="block w-full py-2 pl-4 mx-3 bg-gray-100 rounded-full outline-none focus:text-gray-700"
                            name="message" required />
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
    </x-content>

</x-app-layout>
