@props(['type' => 'success', 'autoclose' => 'false', 'delay' => 1, 'end' => 5, 'title' => __('Success!'), 'message' => __('Successfully updated. Please try again after sometimes. Successfully updated. Please try again after sometimes.Successfully updated. Please try again after sometimes.')])

@php
    $alertKey = 'alert_' . rand(rand(0, 99999), time());
    
    switch ($type) {
        case 'success':
            $alert = true;
            break;
        case 'error':
            $alert = false;
            break;
        default:
            $alert = true;
            break;
    }
    
    $content = Str::limit(__($message), 65);
    $open = 250 * intval($delay);
    $close = 450 * intval($delay);
    $close = $close + intval($end) * 1000;
@endphp
{{-- :class="{ 'block': {{ $alertKey }}, 'hidden': !{{ $alertKey }} }" --}}
<div x-data="{ '{{ $alertKey }}': false }" id="{{ $alertKey }}" x-init="setTimeout(() => {
    document.getElementById('{{ $alertKey }}').classList.remove('hidden');
    {{ $alertKey }} = true;
}, {{ $open }});
@if($autoclose == 'true')
setTimeout(() => { {{ $alertKey }} = false; }, {{ $close }});
@endif" x-show="{{ $alertKey }}"
    x-transition:enter="transform ease-in-out duration-200 transition"
    x-transition:enter-start="translate-y-2 opacity-0 md:translate-y-0 md:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 md:translate-x-0"
    x-transition:leave="transform ease-in-out duration-200 transition"
    x-transition:leave-start="translate-y-0 md:translate-x-0 opacity-100"
    x-transition:leave-end="translate-y-5 md:translate-y-0 md:translate-x-2 opacity-0"
    class="hidden w-full z-[100] max-w-sm bg-white dark:bg-gray-800 border-gray-100 dark:border-slate-700 border dark:text-slate-300 shadow-lg drop-shadow-sm shadow-black/10  rounded-lg transition-all duration-500 ring-1 ring-black ring-opacity-5 overflow-hidden cursor-text">
    <div class="p-4">
        <div class="flex items-start">
            @if ($alert)
                <div
                    class=" bg-green-50 dark:bg-slate-700 relative flex items-center justify-center rounded-full flex-shrink-0 w-10 h-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true"
                        class="text-green-600 stroke-current w-6 h-6 font-bold z-20" role="img">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            @else
                <div
                    class="  bg-red-50 dark:bg-slate-700  relative flex items-center justify-center rounded-full flex-shrink-0 w-10 h-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true"
                        class="stroke-current text-red-600 w-6 h-6 font-bold z-20" role="img">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"></path>
                    </svg>
                </div>
            @endif

            <div class="ml-3 w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-slate-900 dark:text-white">{{ __($title) }}</p>
                <p class="mt-1 text-sm text-gray-600 dark:text-slate-50">{{ $content }}</p>
            </div>
            <div class="flex-shrink-0 flex -mr-2 -mt-2">
                <div @click="{{ $alertKey }} = false"
                    class="flex flex-row w-auto justify-between items-center cursor-pointer transition-all ease-in-out duration-150 hover:bg-gray-50 hover:dark:bg-slate-700  p-1 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true"
                        class=" h-5 w-5 font-semibold text-slate-600 dark:text-slate-300 pointer-events-none"
                        role="img">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
