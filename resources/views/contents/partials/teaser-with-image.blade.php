<div class="w-full overflow-hidden group">
    <div class="absolute z-20 inset-0 transition-opacity opacity-0 group-hover:opacity-100 w-full h-full p-6 flex items-center justify-center">
        @if(!empty($teaser->content))
            <div class="text-white text-xl text-center leading-relaxed">
                {!! $teaser->content !!}
            </div>
        @endif
    </div>

    <div class="absolute z-10 inset-0 w-full h-full rounded-2xl bg-zinc-900/70 flex items-center justify-center">
        <x:html-tags.h4 class="text-white opacity-100 transition-opacity group-hover:opacity-0">
            {{ $teaser->title }}
        </x:html-tags.h4>
    </div>
    @if(!empty($teaser->public_image))
        <div class="w-full h-full">
            <img src="{{ url($teaser->public_image->url) }}" alt="{{ $teaser->public_image->alt }}" class="h-full w-full object-cover object-center rounded-2xl">
        </div>
    @endif
</div>
