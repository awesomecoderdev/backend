<x-client-layout>
    @section('head')
        <title>{{ __('Getting Started') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection
    <header class="bg-white dark:bg-gray-900">
        <x-container class=" px-6 py-16 mx-auto">
            <div class="items-center lg:flex">
                <div class="w-full lg:w-1/2">
                    <div class="lg:max-w-lg">
                        <h1 class="text-3xl font-semibold text-gray-800 dark:text-white lg:text-4xl">Best Place To
                            choose your Clothes</h1>

                        <p class="mt-4 text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Porro beatae error laborum ab amet sunt recusandae? Reiciendis natus
                            perspiciatis optio.</p>

                        <button
                            class="w-full px-5 py-2 mt-6 text-sm tracking-wider text-white uppercase transition-colors duration-300 transform bg-blue-600 rounded-md lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Shop
                            Now</button>
                    </div>
                </div>

                <div class="hidden lg:flex lg:items-center lg:w-1/2 lg:justify-center">
                    <img class="w-[28rem] h-[28rem] object-cover xl:w-[34rem] xl:h-[34rem] rounded-full"
                        src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=755&q=80"
                        alt="">
                </div>
            </div>
        </x-container>
    </header>
    <section class="bg-white dark:bg-gray-900">
        <x-container
            class=" flex flex-col px-6 py-4 mx-auto space-y-6 lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center">
            <div class="flex flex-col items-center w-full lg:flex-row lg:w-1/2">
                <div class="flex justify-center order-2 mt-6 lg:mt-0 lg:space-y-3 lg:flex-col">
                    <button class="w-3 h-3 mx-2 bg-blue-500 rounded-full lg:mx-0 focus:outline-none"></button>
                    <button
                        class="w-3 h-3 mx-2 bg-gray-300 rounded-full lg:mx-0 focus:outline-none hover:bg-blue-500"></button>
                    <button
                        class="w-3 h-3 mx-2 bg-gray-300 rounded-full lg:mx-0 focus:outline-none hover:bg-blue-500"></button>
                    <button
                        class="w-3 h-3 mx-2 bg-gray-300 rounded-full lg:mx-0 focus:outline-none hover:bg-blue-500"></button>
                </div>

                <div class="max-w-lg lg:mx-12 lg:order-2">
                    <h1 class="text-3xl font-semibold tracking-wide text-gray-800 dark:text-white lg:text-4xl">The
                        best Apple Watch apps</h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-300">Lorem ipsum, dolor sit amet consectetur
                        adipisicing elit. Aut quia asperiores alias vero magnam recusandae adipisci ad vitae
                        laudantium quod rem voluptatem eos accusantium cumque.</p>
                    <div class="mt-6">
                        <a href="#"
                            class="px-6 py-2.5 mt-6 text-sm font-medium leading-5 text-center text-white capitalize bg-blue-600 rounded-lg hover:bg-blue-500 lg:mx-0 lg:w-auto focus:outline-none">Download
                            from App Store</a>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
                <img class="object-cover w-full h-full max-w-2xl rounded-md"
                    src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80"
                    alt="apple watch photo">
            </div>
        </x-container>
    </section>
</x-client-layout>
