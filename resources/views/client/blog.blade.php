<x-client-layout>
    @section('head')
        <title>{{ __('Blog') }} {{ config('settings.separator') }}
            {{ __(config('settings.title')) }}</title>
    @endsection



    <section class="bg-white dark:bg-gray-900">
        <div class="sm:px-8 pt-16 sm:pt-32 py-20">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <header class="max-w-2xl">
                            <h1 class="text-4xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-5xl">
                                Writing on software design, company building, and the aerospace industry.</h1>
                            <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">All of my long-form thoughts on
                                programming, leadership, product design, and more, collected in chronological order.</p>
                        </header>
                        <div class="mt-16 sm:mt-20">
                            <div class="md:border-l md:border-zinc-100 md:pl-6 md:dark:border-zinc-700/40">
                                <div class="flex max-w-3xl flex-col space-y-16">
                                    <article class="md:grid md:grid-cols-4 md:items-baseline">
                                        <div class="md:col-span-3 group relative flex flex-col items-start">
                                            <h2
                                                class="text-base font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">
                                                <div
                                                    class="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl">
                                                </div><a
                                                    href="/articles/crafting-a-design-system-for-a-multiplanetary-future"><span
                                                        class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span
                                                        class="relative z-10">Crafting a design system for a
                                                        multiplanetary
                                                        future</span></a>
                                            </h2><time
                                                class="md:hidden relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5"
                                                datetime="2022-09-05"><span
                                                    class="absolute inset-y-0 left-0 flex items-center"
                                                    aria-hidden="true"><span
                                                        class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span></span>September
                                                5, 2022</time>
                                            <p class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">Most
                                                companies try to stay ahead of the curve when it comes to visual design,
                                                but
                                                for Planetaria we needed to create a brand that would still inspire us
                                                100
                                                years from now when humanity has spread across our entire solar system.
                                            </p>
                                            <div aria-hidden="true"
                                                class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                                                Read article<svg viewBox="0 0 16 16" fill="none" aria-hidden="true"
                                                    class="ml-1 h-4 w-4 stroke-current">
                                                    <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg></div>
                                        </div><time
                                            class="mt-1 hidden md:block relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500"
                                            datetime="2022-09-05">September 5, 2022</time>
                                    </article>
                                    <article class="md:grid md:grid-cols-4 md:items-baseline">
                                        <div class="md:col-span-3 group relative flex flex-col items-start">
                                            <h2
                                                class="text-base font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">
                                                <div
                                                    class="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl">
                                                </div><a href="/articles/introducing-animaginary"><span
                                                        class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span
                                                        class="relative z-10">Introducing Animaginary: High performance
                                                        web
                                                        animations</span></a>
                                            </h2><time
                                                class="md:hidden relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5"
                                                datetime="2022-09-02"><span
                                                    class="absolute inset-y-0 left-0 flex items-center"
                                                    aria-hidden="true"><span
                                                        class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span></span>September
                                                2, 2022</time>
                                            <p class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">When
                                                you’re building a website for a company as ambitious as Planetaria, you
                                                need
                                                to make an impression. I wanted people to visit our website and see
                                                animations that looked more realistic than reality itself.</p>
                                            <div aria-hidden="true"
                                                class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                                                Read article<svg viewBox="0 0 16 16" fill="none" aria-hidden="true"
                                                    class="ml-1 h-4 w-4 stroke-current">
                                                    <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg></div>
                                        </div><time
                                            class="mt-1 hidden md:block relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500"
                                            datetime="2022-09-02">September 2, 2022</time>
                                    </article>
                                    <article class="md:grid md:grid-cols-4 md:items-baseline">
                                        <div class="md:col-span-3 group relative flex flex-col items-start">
                                            <h2
                                                class="text-base font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">
                                                <div
                                                    class="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl">
                                                </div><a href="/articles/rewriting-the-cosmos-kernel-in-rust"><span
                                                        class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span
                                                        class="relative z-10">Rewriting the cosmOS kernel in
                                                        Rust</span></a>
                                            </h2><time
                                                class="md:hidden relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5"
                                                datetime="2022-07-14"><span
                                                    class="absolute inset-y-0 left-0 flex items-center"
                                                    aria-hidden="true"><span
                                                        class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span></span>July
                                                14, 2022</time>
                                            <p class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">When
                                                we
                                                released the first version of cosmOS last year, it was written in Go. Go
                                                is
                                                a wonderful programming language, but it’s been a while since I’ve seen
                                                an
                                                article on the front page of Hacker News about rewriting some important
                                                tool
                                                in Go and I see articles on there about rewriting things in Rust every
                                                single week.</p>
                                            <div aria-hidden="true"
                                                class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                                                Read article<svg viewBox="0 0 16 16" fill="none" aria-hidden="true"
                                                    class="ml-1 h-4 w-4 stroke-current">
                                                    <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg></div>
                                        </div><time
                                            class="mt-1 hidden md:block relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500"
                                            datetime="2022-07-14">July 14, 2022</time>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <x-container class=" px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">From the blog</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            How to use sticky note for problem solving
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            How to use sticky note for problem solving
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1544654803-b69140b285a1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            Morning routine to boost your mood
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 25 November 2020</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1530099486328-e021101a494a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1547&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            All the features you want to know
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 30 September 2020</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1484&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            Minimal workspace for your inspirations
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 13 October 2019</span>
                    </div>
                </div>

                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#"
                            class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            What do you want to know about Blockchane
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                    </div>
                </div>
            </div>
        </x-container>
    </section>
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
