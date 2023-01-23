@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }
    
    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp

{{-- start::notifications --}}
<x-slot name="notifications">
    {!! $notifications ?? '' !!}
</x-slot>
{{-- end::notifications --}}

<div
    class="relative bg-white text-slate-500 dark:text-slate-400 dark:bg-slate-900 flex mx-auto justify-between w-full h-fit z-0">
    <div {{-- class="md:block hidden relative overflow-x-hidden w-72 h-[calc(100vh-64px)] border-r border-gray-100 dark:border-slate-800"> --}}
        class="md:block hidden relative overflow-x-hidden w-72 h-auto max-h-[90vh] border-r border-gray-100 dark:border-slate-800">
        {{-- fixed w-60  --}}
        <div class=" md:min-h-[90vh] md:max-h-[90vh] h-auto overflow-x-hidden overflow-y-scroll">
            <div class="relative text-slate-600 font-sans font-semibold">
                @include('layouts.navigation')
                {{-- <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a onclick="event.preventDefault();
                            this.closest('form').submit();"
                        class="fixed w-60 bottom-0 bg-red-50 dark:hover:bg-slate-700 px-2 py-3 border-red-500  flex cursor-pointer flex-row items-center  border-r-2  ">
                        <div class="flex flex-row items-center text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" class="h-5 w-5 pointer-events-none mx-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                            {{ __('Log Out') }}
                        </div>
                    </a>
                </form> --}}
            </div>
        </div>
    </div>

    <div id="content" class="relative p-4 flex-auto w-full h-auto md:max-h-[90vh] overflow-x-hidden overflow-y-scroll">
        {{ $slot }}
    </div>
</div>
