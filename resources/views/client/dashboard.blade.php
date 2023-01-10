<x-client-layout>
    @section('head')
        <title>{{ __('Dashboard') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    <x-client>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate saepe tenetur impedit repellat voluptatem
            totam quasi necessitatibus repudiandae harum molestiae! Placeat reprehenderit repellat consectetur possimus
            optio. Voluptas ullam nam architecto.</p>
    </x-client>
</x-client-layout>
