<x-client-layout>
    @section('head')
        <title>{{ __('Settings') }} {{ config('settings.separator') }} {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <form action="{{ base(route('client.settings.update')) }}" method="post">
            @csrf
            <div class="mt-10 sm:mt-0 ">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="mt-5 md:col-span-6 md:mt-0">
                        <div class="overflow-hidden sm:rounded-md border border-gray-200 dark:border-slate-800">
                            <div class="relative p-5">
                                <div class="relative text-gray-900 dark:text-white space-y-6 ">
                                    <div>
                                        <legend class="sr-only">By Email</legend>
                                        <div class="text-base font-medium " aria-hidden="true">By Email
                                        </div>
                                        <div class="mt-4 space-y-4">
                                            <div class="flex items-start">
                                                <div class="flex h-5 items-center">
                                                    <input id="comments" name="comments" type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="comments"
                                                        class="font-medium text-gray-700 dark:text-slate-200">Comments</label>
                                                    <p class="text-gray-500 dark:text-slate-400">Get notified when
                                                        someones posts a comment on a posting.</p>
                                                </div>
                                            </div>
                                            <div class="flex items-start">
                                                <div class="flex h-5 items-center">
                                                    <input id="candidates" name="candidates" type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="candidates"
                                                        class="font-medium text-gray-700 dark:text-slate-200">Candidates</label>
                                                    <p class="text-gray-500 dark:text-slate-400">Get notified when a
                                                        candidate applies for a job.</p>
                                                </div>
                                            </div>
                                            <div class="flex items-start">
                                                <div class="flex h-5 items-center">
                                                    <input id="offers" name="offers" type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="offers"
                                                        class="font-medium text-gray-700 dark:text-slate-200">Offers</label>
                                                    <p class="text-gray-500 dark:text-slate-400">Get notified when a
                                                        candidate accepts or rejects an offer.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <legend class="contents text-base font-medium ">
                                            Push Notifications</legend>
                                        <p class="text-sm text-gray-500 dark:text-slate-400">These are delivered via
                                            SMS to your mobile phone.</p>
                                        <div class="mt-4 space-y-4">
                                            <div class="flex items-center">
                                                <input id="push-everything" name="push-notifications" type="radio"
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="push-everything"
                                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-slate-200">Everything</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="push-email" name="push-notifications" type="radio"
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="push-email"
                                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-slate-200">Same
                                                    as email</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="push-nothing" name="push-notifications" type="radio"
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="push-nothing"
                                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-slate-200">No
                                                    push notifications</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class=" bg-gray-50  dark:bg-gray-700/10 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-primary-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg> --}}
                                    <span class="mx-2">
                                        {{ __('Update') }}
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-client>
</x-client-layout>
