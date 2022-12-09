<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" href="{{ secure_asset('js/alpine.min.js') }}" as="script" />
    {{-- start::body --}} @yield('head') {{-- end::body --}}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans relative w-full antialiased">
    {{-- start::navigation --}}
    {{-- @include('layouts.navigation') --}}
    {{-- end::navigation --}}

    {{-- start::content --}}
    {{ $slot }}
    {{-- end::content --}}

    <script defer src="{{ secure_asset('js/alpine.min.js') }}"></script>
</body>

</html>
