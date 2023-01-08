<x-app-layout>
    @section('head')
        <title>{{ __('Websites') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-content>
        <div class="relative w-full overflow-x-hidden overflow-y-scroll ">
            <div class="border-b border-gray-200 dark:border-gray-700 flex justify-between">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="mr-2">
                        <a href="{{ route('websites.index', ['search' => request('search')]) }}"
                            class=" {{ !$status ? 'border-primary-300' : 'border-transparent' }} hover:border-primary-400 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all group"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-primary-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                                </path>
                            </svg>
                            <span class="md:block hidden">{{ __('All') }}</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('websites.index', ['status' => 'approved', 'search' => request('search')]) }}"
                            class=" {{ $status == 'approved' ? 'border-green-300' : 'border-transparent' }} hover:border-green-400  text-slate-500 hover:text-slate-600 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all  group"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-green-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="md:block hidden">{{ __('Approved') }}</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('websites.index', ['status' => 'pending', 'search' => request('search')]) }}"
                            class=" {{ $status == 'pending' ? 'border-yellow-300' : 'border-transparent' }} hover:border-yellow-400  text-slate-500 hover:text-slate-600 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all  group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="md:block hidden">{{ __('Pending') }}</span>
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="{{ route('websites.index', ['status' => 'blocked', 'search' => request('search')]) }}"
                            class=" {{ $status == 'blocked' ? 'border-red-300' : 'border-transparent' }} hover:border-red-400  text-slate-500 hover:text-slate-600 inline-flex p-2 pt-0 rounded-t-lg border-b-2  transition-all  group"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true"
                                class="mr-2 pointer-events-none w-5 h-5 transition-all text-red-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"></path>
                            </svg>
                            <span class="md:block hidden">{{ __('Blocked') }}</span>
                        </a>
                    </li>
                </ul>

            </div>

            <x-filter>
                @if (isset($websites) && $websites->count() > 0)
                    <p class="text-sm lg:block mx-2 hidden text-gray-500 font-medium dark:text-white leading-5">
                        {!! __('Showing') !!}
                        @if ($websites->firstItem())
                            <span class="font-medium">{{ $websites->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="font-medium">{{ $websites->lastItem() }}</span>
                        @else
                            {{ $websites->count() }}
                        @endif
                        {!! __('of') !!}
                        <span class="font-medium">{{ $websites->total() }}</span>
                        {!! __('results') !!}
                    </p>
                @endif
            </x-filter>


            @if (isset($websites) && $websites->count() > 0)
                @foreach ($websites as $website)
                    <div
                        class="md:p-0 p-3 md:flex-row flex-col relative flex items-center justify-between w-full border mb-3 border-gray-100 dark:border-slate-800 rounded-md">
                        <a href="{{ $website->url }}" target="_blank"
                            class="relative md:w-1/5 w-full md:p-0 flex justify-start items-center md:m-3 w-15 h-15 rounded-full text-primary-500 ">
                            <h2 class="text-slate-600 font-semibold text-sm flex justify-center items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                    class="h-4 w-4 pointer-events-none ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>

                            </h2>
                            <span
                                class="{{ $website->status == 'approved' ? 'bg-green-400' : ($website->status == 'pending' ? 'bg-yellow-400' : 'bg-red-400') }} absolute md:-left-1 left-2 md:top-0 top-3 h-2.5 w-2.5 border-white dark:border-slate-700 border-2 rounded-full"></span>
                            <p
                                class="text-xs flex justify-center items-center md:truncate pl-3  w-auto font-semibold text-slate-500/80 dark:text-slate-50">
                                {{ $website->title ?? 'Unavailable' }}
                            </p>
                        </a>


                        <div
                            class="relative max-w-xs text-xs md:text-center text-start md:w-1/5 w-full md:m-3 md:p-0 p-1.5 font-semibold text-slate-500/80 flex md:justify-center justify-start items-center">
                            <a href="{{ route('websites.show', $website) }}"
                                class="p-1 text-emerald-400 rounded-md mx-1 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>

                            </a>
                            @can('isSupperAdmin')
                                <a href="{{ route('websites.edit', $website) }}"
                                    class="p-1 text-indigo-400 rounded-md mx-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <a onclick="popupAction('destroy_website_id_{{ $website->id }}', '{{ __('Delete') }}', '{{ __('Are you sure you want to delete this website ? All of this website data will be permanently removed.') }}','{{ __('Delete') }}', )"
                                    class="p-1 text-red-400 rounded-md mx-1 cursor-pointer"> <svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4 pointer-events-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                                    </svg>
                                </a>
                                <form id="destroy_website_id_{{ $website->id }}"
                                    action="{{ route('websites.destroy', $website) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endcan
                        </div>

                        <div class="relative flex flex-auto items-center justify-start md:w-auto w-full">
                            <span
                                class="{{ $website->status == 'approved' ? 'bg-green-100 dark:bg-emerald-300 text-green-800' : ($website->status == 'pending' ? 'bg-yellow-100 dark:bg-yellow-300 text-yellow-800' : 'bg-red-100 dark:bg-red-300 text-red-800') }}  w-auto md:m-3 md:text-center text-start rounded-full px-3 py-1 text-xs font-medium">
                                {{ __(Str::ucfirst($website->status)) }}
                            </span>
                        </div>
                        <p
                            class="text-xs md:text-center text-start lg:block md:hidden block md:w-1/5 w-full md:m-3 md:p-0 p-1.5 font-semibold text-slate-500/80 dark:text-slate-300 ">
                            {{ $website->created_at->diffForHumans([
                                // 'parts' => 2,
                                // 'parts' => 3,
                                // 'join' => ', ',
                                // 'short' => true,
                            ]) }}
                        </p>
                    </div>
                @endforeach



                <div class="relative w-full">
                    {{ $websites->links() }}
                </div>
            @else
                <div
                    class="mt-1 h-60 p-4 flex justify-center items-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                    <div class="space-y-1 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 my-5 text-gray-400"
                            data-name="Layer 1" width="647.63626" height="632.17383"
                            viewBox="0 0 647.63626 632.17383" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path
                                d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z"
                                transform="translate(-276.18187 -133.91309)" fill="#f2f2f2" />
                            <path
                                d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path
                                d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z"
                                transform="translate(-276.18187 -133.91309)" fill="#6c63ff" />
                            <circle cx="190.15351" cy="24.95465" r="20" fill="#6c63ff" />
                            <circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff" />
                            <path
                                d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z"
                                transform="translate(-276.18187 -133.91309)" fill="#e6e6e6" />
                            <path
                                d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z"
                                transform="translate(-276.18187 -133.91309)" fill="#3f3d56" />
                            <path
                                d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z"
                                transform="translate(-276.18187 -133.91309)" fill="#6c63ff" />
                            <circle cx="433.63626" cy="105.17383" r="20" fill="#6c63ff" />
                            <circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff" />
                        </svg>
                        <div class=" text-sm text-center text-gray-600">
                            <a href="{{ route('websites.index') }}"
                                class="relative cursor-pointer rounded-md  font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>{{ __('Go back') }}</span>
                            </a>
                        </div>
                        <p class="text-xs text-gray-500">{{ __('No Data Available') }}.</p>
                    </div>
                </div>
            @endif
        </div>
    </x-content>
    <x-popup />

</x-app-layout>
