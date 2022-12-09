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

<div
    class="relative bg-white text-slate-500 dark:text-slate-400 dark:bg-slate-900 flex mx-auto justify-between w-full h-fit">
    <div
        class="md:block hidden relative overflow-x-hidden w-72 h-auto max-h-[90vh] border-r border-gray-100 dark:border-slate-800">
        {{-- fixed w-60  --}}
        <div class=" md:min-h-[90vh] md:max-h-[90vh] h-auto overflow-x-hidden overflow-y-scroll">
            <div class="relative text-slate-600 font-sans font-semibold">
                @include('layouts.navigation')
            </div>
        </div>
    </div>

    <div id="content" class="relative p-4 flex-auto w-full h-auto md:max-h-[90vh] overflow-x-hidden overflow-y-scroll">
        {{ $slot }}
    </div>
</div>
