@push('breadcrumb')
    <nav class="my-12 px-12" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-2">
            <li>
                <div class="flex items-center">
                    <a href="{{ route('frontend.page', 'shop') }}" class="transition-all mr-2 text-sm font-medium text-zinc-900 dark:text-white">{{ __('Shop') }}</a>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-zinc-300">
                        <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                    </svg>
                </div>
            </li>

            <li class="text-sm">
                <span aria-current="page" class="transition-all font-medium text-zinc-500 dark:text-zinc-400 hover:text-zinc-600 cursor-default">
                    {{ $product->name }}
                </span>
            </li>
        </ol>
    </nav>
@endpush

<x:layouts.app title="{{ $page->meta_title }}" description="{{ $page->meta_description }}">
    <div class="my-12 px-12">
        <!-- Image gallery -->
        <div class="md:grid md:grid-cols-3 md:gap-x-8">
            @if(!empty($product->public_images))
                @foreach($product->public_images as $public_image)
                    <div class="first:block hidden md:block aspect-h-5 aspect-w-4 md:aspect-h-4 md:aspect-w-3 sm:overflow-hidden">
                        <img src="{{ url($public_image->url) }}" alt="{{ $public_image->alt }}" class="h-full w-full object-cover object-center rounded-2xl">
                    </div>
                @endforeach
            @endif
            <!--
            <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-2xl md:block">
            <div class="hidden md:grid md:grid-cols-1 md:gap-y-8">
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-2xl">
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-2xl">
            </div>
            <div class="aspect-h-5 aspect-w-4 md:aspect-h-4 md:aspect-w-3 sm:overflow-hidden sm:rounded-2xl">
            -->
        </div>

        <!-- Product info -->
        <div class="mx-auto pb-16 pt-10 md:grid md:grid-cols-3 md:grid-rows-[auto,auto,1fr] md:gap-x-8 md:pb-24 md:pt-16">
            <div class="md:col-span-2 md:border-r dark:border-r-zinc-600 md:pr-8">
                <x:html-tags.h1>{{ $product->name }}</x:html-tags.h1>
            </div>

            <!-- Options -->
            <div class="mt-4 md:row-span-3 md:mt-0">
                <x:html-tags.h2 class="sr-only">{{ __('Product informations') }}</x:html-tags.h2>
                <p class="relative text-4xl font-semibold tracking-tight text-zinc-900 dark:text-white">{{ $product->formatted_brutto_price_only_euro }}<span class="absolute inline-block font-light text-base top-0.5">{{ $product->formatted_brutto_price_only_cent }}&nbsp;&nbsp;€</span></p>

                <!-- Reviews -->
                <div class="mt-6">
                    <x:html-tags.h3 class="sr-only">{{ __('Reviews') }}</x:html-tags.h3>
                    <div class="flex items-center">
                        <livewire:product.detail.rating-total :product="$product"></livewire:product.detail.rating-total>
                    </div>
                </div>

                <livewire:add-to-cart-button :product="$product"></livewire:add-to-cart-button>
            </div>

            <div class="py-10 md:col-span-2 md:col-start-1 md:border-r dark:border-r-zinc-600 md:pb-16 md:pr-8 md:pt-6">
                <!-- Description and details -->
                <div>
                    <x:html-tags.h3 class="sr-only">{{ __('Description') }}</x:html-tags.h3>

                    <div class="space-y-6 text-base text-zinc-900 dark:text-white hyphens-auto">
                        {!! nl2br($product->description) !!}
                    </div>
                </div>

                @if(!empty($product->highlights))
                    <div class="mt-10">
                        <x:html-tags.h3>{{ __('Highlights') }}</x:html-tags.h3>

                        <div class="mt-4">
                            {!! nl2br($product->highlights) !!}
                        </div>
                    </div>
                @endif

                <div class="mt-10">
                    <livewire:product.detail.reviews :product="$product"></livewire:product.detail.reviews>
                </div>
            </div>
        </div>
    </div>
</x:layouts.app>
