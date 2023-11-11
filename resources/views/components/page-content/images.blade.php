<div class="-m-1 flex flex-wrap md:-m-2" x-data="{ image_url: '', image_alt: '', show: false }">
    <div x-show="show != false"
        class="z-40 fixed inset-0 bg-zinc-900/90">
        <div @click.outside="show = false"
             class="z-50 fixed bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2">
            <img :alt="image_alt"
                 class="block h-full w-full rounded-2xl shadow-2xl shadow-zinc-500/50 dark:shadow-black/50 object-cover object-center"
                 :src="image_url" />
        </div>
    </div>

    @foreach($chunked_images as $images)
        <div class="flex {{ count($chunked_images) === 1 ? 'w-full' : 'w-1/2' }} flex-wrap">
            @if($loop->iteration === 2)
                @foreach($images as $image)
                    <div class="{{ $loop->iteration === 3 ? 'w-full' : 'w-1/2' }} p-1 md:p-2">
                        <img alt="{{ $image->alt }}"
                             x-on:click="image_url = '{{ $image->url }}'; image_alt = '{{ $image->alt }}'; show = true;"
                             class="cursor-pointer aspect-square block h-full w-full max-h-96 max-w-7xl rounded-2xl shadow-2xl shadow-zinc-500/50 dark:shadow-black/50 object-cover object-center"
                             src="{{ url($image->url) }}" />
                    </div>
                @endforeach
            @else
                @foreach($images as $image)
                    <div class="{{ $loop->iteration === 1 ? 'w-full' : 'w-1/2' }} p-1 md:p-2">
                        <img alt="{{ $image->alt }}"
                             x-on:click="image_url = '{{ $image->url }}'; image_alt = '{{ $image->alt }}'; show = true;"
                             class="cursor-pointer aspect-square block h-full w-full max-h-96 max-w-7xl rounded-2xl shadow-2xl shadow-zinc-500/50 dark:shadow-black/50 object-cover object-center"
                             src="{{ url($image->url) }}" />
                    </div>
                @endforeach
            @endif
        </div>
    @endforeach
</div>
