<a href="{{ $product->link }}" class="scale-100 p-6 bg-white dark:bg-zinc-900 from-zinc-700/50 via-transparent rounded-2xl shadow-2xl shadow-zinc-500/20 dark:shadow-black/50 flex justify-between motion-safe:hover:scale-[1.03] transition-all duration-300 focus:outline focus:outline-2 focus:outline-primary-500">
    <div class="flex flex-col md:flex-row w-full">
        <div class="h-100 min-w-[8rem] w-full md:w-[8rem] bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center rounded-2xl mr-0 md:mr-4">
            @if(!empty($product->public_images))
                <img src="{{ url($product->public_images[0]->url) }}" alt="{{ $product->public_images[0]->alt }}" class="object-cover h-full w-full rounded-2xl" />
            @endif
        </div>

        <div class="{{ !empty($product->public_images) ? 'mt-5 md:mt-0' : '' }} flex md:block flex-row md:flex-col items-center w-full">
            <div>
                <x:html-tags.h4>{{ $product->name }}</x:html-tags.h4>

                <div class="mt-4 max-w-[40rem] text-zinc-500 dark:text-zinc-400 text-sm leading-relaxed hyphens-auto">
                    {{ str(strip_tags($product->description))->limit(150) }}
                </div>

                <div class="mt-4 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 md:items-center">
                    <x:fields.product.list.rating-total :product="$product"></x:fields.product.list.rating-total>
                    <p class="text-2xl md:text-lg font-semibold text-zinc-900 dark:text-white">{{ $product->formatted_brutto_price }} €</p>
                </div>
            </div>

            <div class="hidden sm:block md:hidden ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-primary-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-primary-500 w-6 h-6 mx-6 hidden md:block">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
    </svg>
</a>
