<x-app-layout>
    @section('head')
        <title>{{ __('Users') }} | Wp Plagirasm</title>
    @endsection
    <x-content>
        <div class="relative w-full overflow-x-hidden overflow-y-scroll ">
            @foreach ($users as $user)
                <div
                    class="md:p-0 p-3 md:flex-row flex-col relative flex items-center justify-between w-full border mb-3 border-gray-100 dark:border-slate-800 rounded-md">
                    <div
                        class="relative md:w-1/5 w-full md:p-0 flex justify-start items-center md:m-3 w-15 h-15 rounded-full text-primary-500 ">
                        <h2 class="text-slate-600 font-semibold text-sm flex justify-center items-center ">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z">
                                </path>
                            </svg>
                        </h2>
                        <span
                            class="{{ $user->status == 'activated' ? 'bg-green-400' : ($user->status == 'pending' ? 'bg-yellow-400' : 'bg-red-400') }} absolute md:-left-1 left-2
                            md:top-0 top-3 h-2.5 w-2.5 border-white dark:border-slate-700 border-2 rounded-full"></span>

                        <p class="text-xs md:truncate pl-3  w-auto font-semibold text-slate-500/80">
                            {{ $user->name() }}
                        </p>
                    </div>


                    <div
                        class=" text-xs md:text-center text-start md:w-1/5 w-full md:m-3 md:p-0 p-1.5 font-semibold text-slate-500/80 flex md:justify-center justify-start items-center">
                        <a href="{{ route('users.show', $user) }}" class="p-1 text-emerald-400 rounded-md mx-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                        </a>
                        @can('isSupperAdmin')
                            <a href="{{ route('users.edit', $user) }}" class="p-1 text-indigo-400 rounded-md mx-1 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <a href="" class="p-1 text-red-400 rounded-md mx-1 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9.75L14.25 12m0 0l2.25 2.25M14.25 12l2.25-2.25M14.25 12L12 14.25m-2.58 4.92l-6.375-6.375a1.125 1.125 0 010-1.59L9.42 4.83c.211-.211.498-.33.796-.33H19.5a2.25 2.25 0 012.25 2.25v10.5a2.25 2.25 0 01-2.25 2.25h-9.284c-.298 0-.585-.119-.796-.33z" />
                                </svg>
                            </a>
                        @endcan

                    </div>

                    <div class="relative ">
                        <span
                            class="{{ $user->email_verified_at != null ? 'bg-green-100 dark:bg-emerald-300 text-green-800' : 'bg-red-100 dark:bg-red-300 text-red-800' }} md:truncate md:w-1/5 w-auto md:m-3 md:text-center
                            text-start rounded-full px-3 py-1 text-xs font-medium">
                            {{ $user->email_verified_at != null ? 'Verified' : 'Unverified' }}

                        </span>
                    </div>


                    <p
                        class="text-xs md:text-center text-start  md:w-1/5 w-full md:m-3 md:p-0 p-1.5 font-semibold text-slate-500/80">
                        {{ $user->created_at->diffForHumans([
                            // 'parts' => 2,
                            // 'parts' => 3,
                            // 'join' => ', ',
                            // 'short' => true,
                        ]) }}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="relative w-full">

            {{ $users->links() }}
        </div>
    </x-content>

</x-app-layout>
