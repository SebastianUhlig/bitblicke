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
                    <x-html-tags.link
                        href="https://www.instagram.com/bastisleeps/"
                        rel="noreferrer"
                        target="_blank">
                        <span class="sr-only">Instagram</span>
                        @svg('fab-instagram', ['class' => 'w-8 h-8'])
                    </x-html-tags.link>
                </li>

                <li>
                    <x-html-tags.link
                        href="https://github.com/sebastianUhlig/"
                        rel="noreferrer"
                        target="_blank">
                        <span class="sr-only">GitHub</span>
                        @svg('fab-github', ['class' => 'w-8 h-8'])
                    </x-html-tags.link>
                </li>
            </ul>
        </div>
    </footer>
@endif
