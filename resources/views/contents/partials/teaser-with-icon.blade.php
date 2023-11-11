<div class="w-full p-8">
    <div class="flex flex-col items-center h-full">
        @if($teaser->icon)
            <div class="h-24 w-24 bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center rounded-full mb-4">
                <x-dynamic-component
                    :component="$teaser->icon"
                    class="h-12 w-12 shrink-0"
                    style="{{ !empty($teaser->icon_color) ? 'color: '.$teaser->icon_color : '' }}"
                />
            </div>
        @endif

        <x:html-tags.h4>{{ $teaser->title }}</x:html-tags.h4>

        @if(!empty($teaser->content))
            <div class="mt-3 text-zinc-500 dark:text-zinc-400 text-center text-base leading-relaxed hyphens-auto">
                {{ $teaser->content }}
            </div>
        @endif
    </div>
</div>
