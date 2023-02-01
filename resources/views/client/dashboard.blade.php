<x-client-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    {{-- diclare variables --}}
    <script>
        var ordersArr = [];
        var orders = [];
        var last12MonthsOrders = [];
    </script>
    <x-client>


    </x-client>
</x-client-layout>
