<div class="w-full p-8">
    <div class="flex flex-col items-center h-full">
        <x:html-tags.h4>{{ $teaser->title }}</x:html-tags.h4>

        @if(!empty($teaser->content))
            <div class="mt-3 text-zinc-500 dark:text-zinc-400 text-center text-base leading-relaxed hyphens-auto">
                {{ $teaser->content }}
            </div>
        @endif
    </div>
</div>
