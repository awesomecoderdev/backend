@php
    $path = strtok(Route::currentRouteName(), '.');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{ secure_asset('site.webmanifest') }}" />
    {{-- start::head --}} @yield('head') {{-- end::head --}}
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <!-- Scripts -->

    {{--  start::preload:js --}}
    {{-- <link rel="preload" href="{{ secure_asset('js/alpine.min.js') }}" as="script" type="text/javascript" /> --}}
    <link rel="preload"
        href="{{ base(route('alpine', ['time' => Cache::get('alpine', md5(strtotime('+10 minutes')))])) }}"
        as="script" type="text/javascript" />
    {{-- <link rel="preload" href="{{ route('alpine', ['time' => time()]) }}" as="script" type="text/javascript" /> --}}
    {{-- <link rel="preload" href="{{ secure_asset('js/jquery.min.js') }}" as="script" type="text/javascript" /> --}}
    {{-- end::preload:js --}}

    {{-- start::chunk --}}
    {{-- <script src="{{ route('chunk', ['time' => Cache::get('chunk', md5(strtotime('+5 minutes')))]) }}"></script> --}}
    <script src="{{ base(route('chunk', ['time' => Cache::get('chunk', md5(strtotime('+5 minutes')))])) }}"></script>
    {{-- end::chunk --}}
    <!-- Node.js -->
    {{-- @viteReactRefresh --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans relative w-full antialiased bg-gray-50 dark:bg-gray-800 border-gray-100 dark:border-slate-800">
    <div id="__next" data-reactroot="">
        {{-- start::notifications --}}
        <x-notification>
            {!! $notifications ?? '' !!}
            @if (isset($errors) && $errors->any())
                @foreach ($errors->all() as $key => $error)
                    <x-alert delay="{{ $key }}" end="4" autoclose='true' type="error" title="Error!"
                        message="{{ $error }}" />
                @endforeach
            @endif

            @if (Session::has('success'))
                <x-alert delay="{{ $errors->any() ? count($errors->all()) + 1 : 1 }}" end="4" autoclose='true'
                    type="success" title="Success!" message="{{ __(Session::get('success')) }}" />
            @endif
        </x-notification>
        {{-- end::notifications --}}

        {{ $slot }}
    </div>

    <script defer src="{{ base(route('alpine', ['time' => Cache::get('alpine', md5(strtotime('+10 minutes')))])) }}">
    </script>
    {{-- <script defer src="{{ secure_asset('js/jquery.min.js') }}"></script> --}}

</body>

</html>
