@if ($this->position == 'header')
    <div class="max-w-full xl:max-w-7xl mx-auto z-20 top-0 xl:top-8 sticky">
        <div class="xl:rounded-2xl backdrop-blur shadow-2xl dark:shadow-none shadow-gray-500/30 dark:shadow-gray-900/90 w-full text-gray-700 dark:text-gray-200 bg-gradient-to-r from-0% from-gray-300/60 dark:from-[#02174c]/80 to-white/60 dark:to-[#02174c]/80 to-100%">
            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="px-2 md:px-0 py-4 flex flex-row items-center justify-between">
                    @if ($this->logo)
                        <x-logo></x-logo>
                    @endif

                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                    @foreach($pages as $page)
                        @if($page->childPages->count() > 0)
                            <x-nav-dropdown activeParent="{{ \Illuminate\Routing\Router::isWith('frontend.page', $page->slug) }}" :page="$page">{{ $page->header_nav_title }}</x-nav-dropdown>
                        @elseif(empty($page->parent_page_id))
                            <x-nav-link active="{{ \Illuminate\Routing\Router::isWith('frontend.page', $page->slug) }}" link="{{ route('frontend.page', $page->slug) }}">{{ $page->header_nav_title }}</x-nav-link>
                        @endif
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
@elseif ($this->position == 'footer')
    <footer
        class="z-10 px-6 py-8 w-full text-gray-700 dark:text-gray-200 bg-gradient-to-r from-0% from-gray-300/50 dark:from-[#02174c] to-white dark:to-[#02174c]/90 to-100%"
    >
        <div class="max-w-full xl:max-w-7xl mx-auto relative">
            <div class="flex justify-center">
                @if ($this->logo)
                    <x-logo></x-logo>
                @endif
            </div>

            <p class="mx-auto mt-6 max-w-xl leading-relaxed text-center">
                Willkommen auf meiner Webseite! Ich bin Sebastian Uhlig, ein leidenschaftlicher Full Stack Entwickler,
                mit dem Hauptaugenmerk auf die Gestaltung, Planung und Entwicklung von Laravel basierten Projekten.
            </p>

            <ul class="mt-8 flex flex-wrap justify-center gap-6 md:gap-8 lg:gap-12">
                @foreach($pages as $page)
                    <x-nav-footer-link active="{{ \Illuminate\Routing\Router::isWith('frontend.page', $page->slug) }}" link="{{ route('frontend.page', $page->slug) }}">{{ $page->footer_nav_title }}</x-nav-footer-link>
                @endforeach
            </ul>

            <ul class="mt-12 flex justify-center gap-6 md:gap-8">
                <li>
                    <a
                        href="/"
                        rel="noreferrer"
                        target="_blank"
                        class="text-gray-700 transition hover:text-primary-500 dark:text-white dark:hover:text-primary-500"
                    >
                        <span class="sr-only">Instagram</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                </li>

                <li>
                    <a
                        href="/"
                        rel="noreferrer"
                        target="_blank"
                        class="text-gray-700 transition hover:text-primary-500 dark:text-white dark:hover:text-primary-500"
                    >
                        <span class="sr-only">Twitter/X</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                            />
                        </svg>
                    </a>
                </li>

                <li>
                    <a
                        href="/"
                        rel="noreferrer"
                        target="_blank"
                        class="text-gray-700 transition hover:text-primary-500 dark:text-white dark:hover:text-primary-500"
                    >
                        <span class="sr-only">GitHub</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
@endif
