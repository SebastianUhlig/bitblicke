@props([
    'page' => null,
    'items' => null,
    'activeParent' => false,
])

<div @click.away="open = false" class="relative" x-data="{ open: false }">
    @if ($activeParent)
        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-left rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 text-sm font-semibold text-gray-900 bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <span>{{ $slot }}</span>
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    @else
        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <span>{{ $slot }}</span>
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    @endif

    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="z-10 absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
        <div class="px-2 py-2 rounded-md shadow-2xl shadow-gray-500/30 dark:shadow-gray-900/90 text-gray-700 bg-white dark:text-gray-200 dark:bg-gray-800">
            @if(!empty($page))
                @if($page->childPages->count() > 0)
                    <x-nav-child-link active="{{ \Illuminate\Routing\Router::isWith('frontend.page', $page->slug) }}" link="{{ route('frontend.page', $page->slug) }}">{{ $page->header_nav_title }}</x-nav-child-link>

                    @foreach($page->childPages as $childPage)
                        <x-nav-child-link active="{{ \Illuminate\Routing\Router::isWith('frontend.page', [$page->slug, $childPage->slug]) }}" link="{{ route('frontend.page', [$page->slug, $childPage->slug]) }}">{{ $childPage->header_nav_title }}</x-nav-child-link>
                    @endforeach
                @else
                    <a class="transition block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('frontend.page', $page->slug) }}" wire:navigate>{{ $page->header_nav_title }}</a>
                @endif
            @elseif(count($items) > 0)
                @foreach($items as $slug => $title)
                    <a class="transition block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ $slug }}">{{ $title }}</a>
                @endforeach
            @endif
        </div>
    </div>
</div>
