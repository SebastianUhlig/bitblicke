<div class="grid grid-cols-1 md:grid-cols-2">
    <div class="{{ $classes['image_class'] }}">
        <img src="{{ url($image->url) }}" alt="{{ $image->alt }}" class="w-full md:w-auto rounded-2xl shadow-2xl shadow-zinc-500/50 dark:shadow-black/50">
    </div>

    <div class="{{ $classes['text_class'] }} flex flex-col space-y-4">
        {!! $text !!}
    </div>
</div>
