<x-app-layout>
    @section('head')
        <title>{{ __('Inbox') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
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
                                    class="{{ request('user') == $user->id ? 'bg-slate-200 dark:bg-gray-800 hover:bg-slate-300 dark:hover:bg-gray-800' : 'hover:bg-slate-300 dark:hover:bg-gray-800' }} relative h-16 my-1 flex items-center px-2 py-2 text-sm transition-all duration-150 ease-in-out border rounded-md border-gray-200 dark:border-slate-800 cursor-pointer focus:outline-none">
                                    <div
                                        class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-200 hover:dark:text-white hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 ">
                                        <div
                                            class="relative w-8 h-8 rounded-full overflow-hidden border-primary-500 bg-slate-500 dark:bg-slate-700  ">
                                            @if ($user->avatar)
                                                <img loading="lazy" class="h-full w-auto" src="{{ $user->avatar }}"
                                                    alt="{{ $user->fullname() ?? 'Unknown' }}">
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
                                                class="block ml-2 font-semibold text-gray-600 dark:text-slate-100">{{ Str::limit($user->fullname() ?? 'Unknown', 18) }}</span>
                                        </div>
                                        <span
                                            class="block ml-2 text-sm text-gray-600 dark:text-slate-50">{{ Str::limit($user->chats->message, 18) }}</span>
                                    </div>
                                    <span
                                        class="block ml-2 text-xs text-[10px] text-gray-600 dark:text-slate-500 absolute bottom-0 right-0 p-2">{{ Str::limit(
                                            $user->chats->created_at->diffForHumans([
                                                // 'parts' => 2,
                                                // 'parts' => 3,
                                                // 'join' => ', ',
                                                'short' => true,
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
                    @if (isset($receiver) && $receiver != null)
                        <div class="relative flex items-center p-3 border-y border-gray-200 dark:border-slate-800">
                            <div
                                class="relative w-10 h-10 rounded-full overflow-hidden border-primary-500 bg-slate-500 dark:bg-slate-700  ">
                                @if ($receiver->avatar)
                                    <img loading="lazy" class="h-full object-cover w-auto"
                                        src="{{ $receiver->avatar }}" alt="{{ $receiver->fullname() ?? 'Unknown' }}">
                                @else
                                    <div class="flex items-center justify-center h-full">
                                        <h2 class="text-slate-100 font-semibold text-sm ">
                                            {{ strtoupper(substr($receiver->first_name ?? $receiver->email, 0, 1)) }}
                                        </h2>
                                    </div>
                                @endif
                            </div>
                            <div class="flex flex-col">
                                <a href="{{ route('users.show', $receiver) }}"
                                    class="block ml-2 font-bold text-sm text-gray-600 dark:text-white">{{ $receiver->fullname() ?? 'Unknown' }}</a>
                                <span
                                    class="{{ $receiver->status == 'activated' ? 'bg-green-100 dark:bg-emerald-300 text-green-800' : ($receiver->status == 'pending' ? 'bg-yellow-100 dark:bg-yellow-300 text-yellow-800' : 'bg-red-100 dark:bg-red-300 text-red-800') }}  w-fit ml-2 md:text-center text-start rounded-full px-2 py-0.5 text-[8px] font-medium">
                                    {{ __(Str::ucfirst($receiver->status)) }}
                                </span>
                            </div>
                            <span class="absolute w-3 h-3 bg-green-600 rounded-full left-10 top-3">
                            </span>
                        </div>
                        <div class="relative w-full p-6 overflow-y-auto h-auto max-h-[65vh]">
                            <div class="space-y-4" id="inbox{{ $receiver->id }}">
                                @foreach ($chats as $msg)
                                    <div
                                        class="relative group cursor-text w-full flex {{ $msg->user_id == Auth::user()->id ? 'justify-end' : 'justify-start' }}">
                                        <div class="relative flex items-end">
                                            @if ($msg->user_id == Auth::user()->id)
                                                <span
                                                    class="block opacity-50 group-hover:opacity-100 transition-all duration-150 text-xs text-gray-600 dark:text-slate-500 mx-2 py-1">{{ $msg->created_at->diffForHumans() }}</span>
                                                <div
                                                    class="relative max-w-xl text-sm px-4 py-2 text-gray-700 dark:text-slate-50 bg-slate-300 dark:bg-slate-800 rounded-lg shadow">
                                                    <span class="block">{{ $msg->message }}</span>
                                                </div>
                                            @else
                                                <div
                                                    class="relative max-w-xl text-sm px-4 py-2 text-gray-700 dark:text-slate-50 bg-slate-300 dark:bg-slate-800 rounded-lg shadow">
                                                    <span class="block">{{ $msg->message }}</span>
                                                </div>
                                                <span
                                                    class="block opacity-50 group-hover:opacity-100 transition-all duration-150 text-xs text-gray-600 dark:text-slate-500 mx-2 py-1">{{ $msg->created_at->diffForHumans() }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <script>
                            document.getElementById('inbox{{ $receiver->id }}').scrollIntoView({
                                block: 'end'
                            });
                        </script>

                        <div
                            class="absolute bottom-0 w-full flex items-center justify-between p-3 border-y bg-gray-100 dark:bg-slate-800 border-gray-200 dark:border-slate-800">
                            <input type="text" placeholder="Message"
                                class="block w-full py-2 pl-4 text-sm mx-3 bg-gray-100 dark:bg-slate-800 text-gray-500 dark:text-white placeholder:text-gray-500 dark:placeholder:text-slate-100 rounded-full outline-none focus:text-gray-700"
                                name="message" required />
                            <button type="submit">
                                <svg class="w-8 h-8 text-gray-500 dark:text-slate-100 origin-center transform rotate-90"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                </svg>
                            </button>
                        </div>
                    @else
                        <div
                            class="relative flex justify-center h-screen max-h-[calc(100vh-113px)] items-center p-3 border-y border-gray-200 dark:border-slate-800 overflow-hidden">
                            <div class="flex justify-center flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-52 h-52"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" data-name="Layer 1" width="932.16127"
                                    height="646.62262" viewBox="0 0 932.16127 646.62262">
                                    <defs>
                                        <linearGradient id="ae928bff-3575-4039-8931-1ea5500585a1-122" x1="10.0701"
                                            y1="883.09804" x2="23.03018" y2="883.09804"
                                            gradientTransform="matrix(46.94042, 0, 0, -24.44727, -11.22942, 22034.26197)"
                                            gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#2d6dd0" />
                                            <stop offset="0.99" stop-color="#6c139c" />
                                        </linearGradient>
                                        <linearGradient id="ab16e020-95e2-4019-a7f2-352f369779da-123" x1="14.38337"
                                            y1="889.08946" x2="32.06147" y2="889.08946"
                                            gradientTransform="matrix(34.41098, 0, 0, -37.39629, -33.41135, 33695.05684)"
                                            xlink:href="#ae928bff-3575-4039-8931-1ea5500585a1-122" />
                                    </defs>
                                    <path
                                        d="M161.52328,769.214c-12.47123-3.36846-27.64871-17.37787-24.39937-36.6341,1.61151-9.55005,7.79666-15.732,14.20994-19.72938,8.87087-5.52916,18.97378-7.61271,28.70982-8.13909,11.2299-.60716,22.44726.92374,33.59326,2.5427,11.00345,1.59829,22.00778,3.02939,33.06039,3.90315a426.18014,426.18014,0,0,0,129.03626-9.58117q15.6504-3.61164,31.11314-8.47412a213.747,213.747,0,0,0,28.5787-10.6814c12.25583-5.884,32.18686-17.33381,30.56169-38.53889-.86174-11.24351-7.48306-20.2235-14.16178-26.47975-8.07544-7.56463-17.41979-12.54174-26.57194-17.37492-42.57048-22.4815-85.22406-44.6961-127.836-67.04222-9.94515-5.21532-19.95642-10.29094-29.60825-16.40265-9.03649-5.72208-18.03069-12.36888-25.30284-21.55936-6.35165-8.02717-12.02739-18.80348-11.82715-30.84974.16607-9.99022,4.71232-18.46776,10.28033-24.80359,13.7853-15.68634,33.28584-22.0464,50.91043-25.37787,21.89667-4.139,44.11031-4.11758,66.02128-8.11428,17.69177-3.22713,36.59531-9.457,50.98378-24.05564a45.59976,45.59976,0,0,0,12.42882-21.715,42.67832,42.67832,0,0,0-2.55578-25.76792c-3.89761-9.30965-10.11483-16.72576-16.65219-22.79844A99.91422,99.91422,0,0,0,376.83961,294.667c-19.43291-9.26028-39.86761-14.0818-59.77313-21.18823-9.76212-3.48517-19.623-7.30685-28.68774-13.29315-7.67975-5.07168-16.04558-11.90784-20.31823-22.0738-8.81554-20.9748,12.21534-33.4755,24.13206-38.21055a155.15632,155.15632,0,0,1,24.94085-7.13993c1.7969-.38581,1.03447-3.97259-.754-3.58864a149.21675,149.21675,0,0,0-26.19085,7.64762c-7.18613,2.9857-14.60076,6.90949-20.24543,13.66154a28.43768,28.43768,0,0,0-6.42551,22.23459c1.4951,10.0639,7.99422,17.81842,14.098,23.43518,8.07158,7.42755,17.27457,12.27825,26.6055,16.23232,9.82719,4.16438,19.86291,7.40983,29.89527,10.59327,20.04681,6.36116,40.993,12.03,59.08979,25.56609,12.65932,9.469,29.85672,27.22287,25.64576,49.22911-1.86927,9.76868-7.54569,17.40622-13.67139,23.0237a79.6032,79.6032,0,0,1-24.484,14.88719c-40.10267,16.13908-84.23838,4.59774-123.3075,26.518-13.28375,7.453-29.41873,21.02272-29.54861,42.37351-.06743,11.09129,4.37845,21.26358,9.87491,29.30381,6.5832,9.63,15.108,16.75125,23.78148,22.703a276.8197,276.8197,0,0,0,28.39866,16.44217q16.03077,8.42027,32.06858,16.81773l64.884,34.02583,32.238,16.90593c9.83916,5.15974,19.931,10.10922,28.877,17.68346,7.32486,6.20174,15.979,16.37607,15.23162,29.0098-.5935,10.03327-7.25874,17.27376-13.34931,22.11459-7.88668,6.26837-16.74607,10.32273-25.56086,13.69186-10.16729,3.886-20.50176,7.10958-30.85626,10.00791a416.59168,416.59168,0,0,1-64.73684,12.67106,425.69162,425.69162,0,0,1-65.76514,2.4513q-16.6374-.66951-33.22314-2.66156c-11.39758-1.37281-22.74638-3.48763-34.17334-4.4259-10.33591-.8487-20.77138-.652-30.95021,2.07575-8.49907,2.27761-17.47811,6.33735-23.92963,14.2589a31.54334,31.54334,0,0,0-6.69562,21.30472,38.25641,38.25641,0,0,0,7.84294,21.11158,35.4889,35.4889,0,0,0,18.97222,12.7361c1.78156.48117,2.54349-3.10534.754-3.58863Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#e6e6e6" />
                                    <rect x="24.12866" y="644.22427" width="324.03261" height="2.24072"
                                        fill="#3f3d56" />
                                    <circle cx="323.1997" cy="517.5024" r="21.16809" fill="#e6e6e6" />
                                    <circle cx="103.58072" cy="326.14839" r="21.1681" fill="#e6e6e6" />
                                    <path
                                        d="M276.90033,686.8274s-18.298,24.79077-22.42978,28.92259-5.31229,19.47848-5.31229,19.47848l7.08307,16.52718-4.13182,8.26359-31.87389-31.87389,34.23488-50.76211Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#ffb8b8" />
                                    <path
                                        d="M354.8142,535.13133S288.58307,736.94512,281.5,741.66715s-41.96563-24.91693-52-32,75.73391-141.83163,75.73391-141.83163c-13.57593-44.26928-7.08437-54.54371-7.08437-54.54371Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#2f2e41" />
                                    <path
                                        d="M250.92894,755.29716s-.00005-7.08307,2.27968-10.61768,6.57417,12.38841,6.57417,12.38841,25.97134,7.083,14.16619,14.7564-46.63029-16.52718-56.66466-23.02-6.49281-14.16619-1.18052-19.47848l10.3295-10.3295Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#2f2e41" />
                                    <path
                                        d="M376.06346,699.813s5.31234,15.34666,10.03437,30.10311,27.15181,22.42978,27.15181,22.42978l4.13182,10.62463L404.98605,768.873l-36.00571-8.85385s1.18052-11.8051,1.18052-15.93692-18.88822-38.957-18.88822-38.957Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#ffb8b8" />
                                    <circle cx="195.51375" cy="207.16503" r="24.79078" fill="#ffb8b8" />
                                    <path
                                        d="M315.85719,346.83935c0,3.54155-17.7077,30.69336-17.7077,30.69336l25.94067,11.5779,11.83577-34.00767Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#ffb8b8" />
                                    <path
                                        d="M339.46749,476.1056A18.60951,18.60951,0,0,1,358.165,494.244l.781,30.85295,4.13182,7.08307S388.5,721.7646,388.5,727.66715s-25.2436,22.18052-40,21c-7.29984-.584-23.66721-67.64983-30.16132-104.36669-4.62331-26.13943-9.13477-54.58564-13.666-75.58568a186.64306,186.64306,0,0,0-5.93287-22.36864c-12.98567-36.00563,9.44411-70.24051,9.44411-70.24051h31.28358Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#2f2e41" />
                                    <path
                                        d="M408.23248,760.31432s3.24643.88539-.29513-.29513-2.361-7.67333-2.21538-10.97321,34.67948,7.43165,34.67948,15.69524-44.26925,8.26359-57.25492,7.08307-15.93692,0-17.7077-8.26359,5.01716-19.77361,5.01716-19.77361Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#2f2e41" />
                                    <path
                                        d="M310.52794,492.5564c4.616,0,14.544-11.857,19.73988-6.66087,3.77905,3.779,6.98565,7.409,9.81475,10.61167,8.12123,9.19367,15.22091,17.61941,20.15461,11.574.74578-.91379-1.76138,1.19668.3293-.22565a5.05832,5.05832,0,0,0,2.03879-5.489c-7.15863-22.42745-11.61645-43.913-5.924-61.85926a14.55958,14.55958,0,0,0,.59851-4.39142q.00068-.32608.03033-.65268c.30088-3.31183.22537-15.17318-13.365-28.76349-12.42073-12.42076-14.80369-20.05316-15.11783-23.49729-.07381-.80208-20.09611-21.5755-20.09611-21.5755a5.03389,5.03389,0,0,0-6.0285,1.69209l-6.4134,8.81846a84.34877,84.34877,0,0,0-8.7955,44.67357c1.7363,20.00971,4.7509,59.5809,7.22678,73.8548a5.2146,5.2146,0,0,0,1.93095,3.28894,4.97151,4.97151,0,0,0,5.08942.60242A21.43522,21.43522,0,0,1,310.52794,492.5564Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#6c63ff" />
                                    <path
                                        d="M335.383,334.80007l-4.45047-4.703c.37044,24.76455,23.73505,38.5822,23.73505,38.5822l-52.16706-5.20062L301.182,356.9093l-2.72552,5.40965-6.36916-1.613-1.83243-4.00542-3.93046,2.13932,8.065-31.84589c7.96486-30.38013,32.25254-25.92371,32.25254-25.92371,34.0065-10.63643,29.8387,21.79929,29.8387,21.79929Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#2f2e41" />
                                    <polygon points="181.595 525.642 172.134 441.966 183.767 519.477 181.595 525.642"
                                        opacity="0.2" style="isolation:isolate" />
                                    <circle cx="164.75578" cy="174.69917" r="13.11742" fill="#2f2e41" />
                                    <path
                                        d="M300.75822,312.01463c.273-.00065.54458.00645.82079-.01131l.02753-.00177a13.11742,13.11742,0,0,0-1.71074-26.179c-.27616.01776-.54462.05953-.81548.0939a13.10067,13.10067,0,0,1,1.6779,26.09819Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#2f2e41" />
                                    <ellipse cx="197.54934" cy="209.13241" rx="4.09919" ry="5.73887"
                                        fill="#ffb8b8" />
                                    <path
                                        d="M380.56294,526.1428l16.85164,11.926a11.90115,11.90115,0,0,1,.98463,18.65113l0,0a11.90115,11.90115,0,0,1-17.98133-2.67653l-9.7515-15.76678L336.35,486.41578l14.21961-10.46185Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#feb8b8" />
                                    <path
                                        d="M353.5,479.66715c.0675,9.19068-9.01578,17.17194-21.84558,18.32633l-29.43177-62.535a38.21351,38.21351,0,0,1,5.1403-40.64162v0l29.71042,36.10578C337.996,446.61832,344.69254,462.887,353.5,479.66715Z"
                                        transform="translate(-133.91937 -126.68869)" opacity="0.2" />
                                    <path
                                        d="M353.5,475.66715c.0675,9.19068-5.01578,15.17194-17.84558,16.32633l-29.43177-62.535a38.21351,38.21351,0,0,1,5.1403-40.64162v0l29.71042,36.10578C341.996,440.61832,344.69254,458.887,353.5,475.66715Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#6c63ff" />
                                    <path id="a85aa9a8-70f8-49a0-91e4-e8ca3e9b5e25-124" data-name="Path 1"
                                        d="M1060.28855,356.52229h-31.91173a12.88046,12.88046,0,0,0-11.36087,8.03221l-7.23623,20.84034-5.789,16.13678-8.1046,23.373a41.24885,41.24885,0,0,1-3.401,8.03222,38.27962,38.27962,0,0,1-3.47336-8.10458L981.269,401.604c-1.5196-4.48646-4.05227-11.72268-5.64425-16.20914l-7.23623-20.84034a12.88053,12.88053,0,0,0-11.43325-8.03221H834.22884a8.53874,8.53874,0,0,0-8.53875,8.53874h0v48.69982a8.61111,8.61111,0,0,1-8.6111,8.61111H781.47673a8.68349,8.68349,0,0,1-8.6111-8.61111V365.061a8.53873,8.53873,0,0,0-8.17694-8.53874H735.02017a8.61111,8.61111,0,0,0-8.6111,8.53874V387.5657c15.775,20.11671,15.775,56.732,0,111.29316v25.97806a8.6111,8.6111,0,0,0,8.6111,8.53875h29.66852a8.53875,8.53875,0,0,0,8.53875-8.53875h0V471.723a8.6111,8.6111,0,0,1,8.24929-8.61112H817.079a8.53876,8.53876,0,0,1,8.61079,8.46608l.00031.07267v53.11391a8.53876,8.53876,0,0,0,8.53875,8.53875h100.077a8.53876,8.53876,0,0,0,8.53872-8.53875V502.76643a8.53876,8.53876,0,0,0-8.53875-8.53875H881.19193a8.61112,8.61112,0,0,1-8.53875-8.61111V471.14411a8.61112,8.61112,0,0,1,8.53875-8.61111h32.05649a8.53875,8.53875,0,0,0,8.53875-8.53875h0V431.99614a8.53876,8.53876,0,0,0-8.53875-8.53875H881.19193a8.61112,8.61112,0,0,1-8.53875-8.61111V404.28139a8.53875,8.53875,0,0,1,8.46607-8.61081l.07268-.0003H924.6093a14.47247,14.47247,0,0,1,12.08448,7.81512l28.14892,61.14611a45.51626,45.51626,0,0,1,3.61811,16.35388v43.85153a8.53876,8.53876,0,0,0,8.53875,8.53875h29.66852a8.53873,8.53873,0,0,0,8.6108-8.466l.00033-.0727V480.98539a47.035,47.035,0,0,1,3.54574-16.35388L1065.28157,364.265a5.06537,5.06537,0,0,0-4.993-7.74276Z"
                                        transform="translate(-133.91937 -126.68869)"
                                        fill="url(#ae928bff-3575-4039-8931-1ea5500585a1-122)" />
                                    <path id="ab32811a-36b8-48f6-a9b0-164845ebe4b4-125" data-name="Path 2"
                                        d="M685.09019,386.625A64.54721,64.54721,0,0,0,655.277,404.35375c-9.47947-33.28665-29.88563-83.65078-49.78525-91.90008a14.47246,14.47246,0,0,0-13.31466.57889c-12.44632,7.23623-20.55089,30.53688-13.45938,74.67787-27.35294-50.07469-36.90476-50.00233-41.31886-50.07469a10.782,10.782,0,0,0-9.84127,6.72969c-2.96685,6.585-8.90056,27.13585,5.5719,71.34919-17.43931-23.87955-22.79412-26.91876-28.94491-26.62931a10.9267,10.9267,0,0,0-9.26237,6.29551c-5.21009,9.84128-4.63119,34.58917,11.578,71.49393a33.21434,33.21434,0,0,0-19.972-8.24929,11.93977,11.93977,0,0,0-9.62418,6.1508c-6.585,12.08449,7.23623,46.0224,24.31373,69.03359,13.82119,18.88656,41.53594,47.90382,81.76936,47.90382a90.74358,90.74358,0,0,0,16.788-1.592,7.37372,7.37372,0,0,0-2.56166-14.52325q-.13068.02307-.26046.0508c-33.43137,6.51261-58.61344-11.86741-73.88188-28.366-22.79413-24.67552-32.78012-54.34406-33.359-63.38934,4.77591,1.95378,18.52474,10.05835,45.29879,44.35806a7.33942,7.33942,0,1,0,11.93977-8.53875h0c-37.62838-57.09382-41.31886-91.683-40.0887-103.33331,11.07143,11.28851,38.71381,52.67974,59.55415,83.94024a7.35924,7.35924,0,0,0,12.591-7.598C535.58974,403.1236,537.10934,366.94246,539.642,354.7856c6.5126,6.585,23.80718,29.5238,60.2054,108.5434a7.37371,7.37371,0,0,0,13.6041-5.64426c-35.31277-95.88-19.972-128.37067-14.11063-132.06114,7.598,0,28.94491,36.61531,42.25957,84.59149.796,2.96685,1.592,5.86135,2.31559,8.68347a46.16679,46.16679,0,0,0-4.34174,10.42017c-7.23623,26.557-14.47246,86.83473-.50654,103.40568a13.45938,13.45938,0,0,0,11.7227,4.993,19.03128,19.03128,0,0,0,13.89355-8.53875c12.95286-18.88656,5.35481-66.28384-4.993-107.74742a54.48871,54.48871,0,0,1,28.94491-20.768,14.47244,14.47244,0,0,1,14.47246,3.47338c5.93371,6.65733,16.28149,31.55-15.12372,119.32538a7.36959,7.36959,0,0,0,13.89356,4.92064c25.03734-69.97432,28.94491-115.056,12.22921-134.01493A28.51075,28.51075,0,0,0,685.09019,386.625Zm-32.563,134.37674a4.63108,4.63108,0,0,1-2.46032,2.09851c-5.42717-6.44024-5.42717-44.57516.50654-75.83565C661.78955,501.3192,655.27693,517.16652,652.52717,521.00173Z"
                                        transform="translate(-133.91937 -126.68869)"
                                        fill="url(#ab16e020-95e2-4019-a7f2-352f369779da-123)" />
                                    <path
                                        d="M370.641,127.57418l-58.777,25.55173a10.69385,10.69385,0,0,0-5.53753,14.05476l18.2512,41.98347a10.6938,10.6938,0,0,0,14.05477,5.53757l58.777-25.55173a10.69382,10.69382,0,0,0,5.53755-14.05482l-18.25119-41.98347A10.69386,10.69386,0,0,0,370.641,127.57418Zm2.4335,5.5978a4.557,4.557,0,0,1,1.0987-.31637l-19.87181,37.49228-40.8146-11.16918a4.58018,4.58018,0,0,1,.81072-.455Zm21.90144,50.38019L336.199,209.1039a4.58316,4.58316,0,0,1-6.02348-2.37326l-18.0873-41.60645,42.9598,11.75637a3.052,3.052,0,0,0,3.502-1.5145l20.79933-39.24265,17.99983,41.40525A4.58316,4.58316,0,0,1,394.97593,183.55217Z"
                                        transform="translate(-133.91937 -126.68869)" fill="#e6e6e6" />
                                </svg>
                                <div class="text-sm max-w-xs text-center">
                                    {{ __('Select the account you want to talk to. You can talk to each other without any third-party applications.') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-content>

</x-app-layout>
