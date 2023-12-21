@push('slider')
    @if($page->publicPageSliderItems->count() > 0)
        <!-- Slider main container -->
        <div class="{{ $page->publicPageSliderItems->count() > 2 ? 'swiper-three' : 'swiper' }} relative overflow-hidden">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach($page->publicPageSliderItems->sortBy('pivot.order') as $pageSliderItem)
                    @if(!empty($pageSliderItem->media))
                        <div class="swiper-slide">
                            <div class="
                                    before:absolute before:z-10
                                    before:bg-gradient-to-t before:from-zinc-50 dark:before:from-zinc-950 before:from-0% before:to-transparent before:to-50%
                                    before:block before:inset-0 before:w-full before:h-full
                                    relative w-full max-h-[calc(100vh-64px)] min-h-[calc(100vh-64px)] md:max-h-[600px] md:min-h-[600px] {{--max-h-[calc(100vh-64px)] min-h-[calc(100vh-64px)]--}} overflow-hidden bg-no-repeat bg-cover bg-center grid"
                                 style="background-image: url('{{ $pageSliderItem->media->url }}')">
                                <div class="w-full h-full flex flex-col justify-center items-center {{ !empty($pageSliderItem->text) ? 'backdrop-blur-sm' : '' }} z-20 text-center text-white drop-shadow-lg px-8 py-4">
                                    <div class="max-w-2xl">
                                        <div class="py-4 px-6 bg-zinc-950/50 dark:bg-zinc-950/20 backdrop-blur-3xl rounded-xl">
                                            <x:html-tags.h3>{{ $pageSliderItem->title }}</x:html-tags.h3>
                                            @if(!empty($pageSliderItem->text))
                                                <p class="mt-2">
                                                    {!! $pageSliderItem->text !!}
                                                </p>
                                            @endif
                                        </div>

                                        @if(!empty($pageSliderItem->btn_link))
                                            <x:html-tags.button
                                                variant="button-primary-large"
                                                link="{{ $pageSliderItem->btn_link }}"
                                                class="mt-10 !inline-block">
                                                {{ $pageSliderItem->btn_label }}
                                            </x:html-tags.button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="swiper-slide">
                            <div class="
                                    before:absolute before:z-10
                                    before:bg-gradient-to-t before:from-zinc-50 dark:before:from-zinc-950 before:from-0% before:to-transparent before:to-50%
                                    before:block before:inset-0 before:w-full before:h-full
                                    bg-primary-500 relative w-full max-h-[calc(100vh-64px)] min-h-[calc(100vh-64px)] md:max-h-[600px] md:min-h-[600px] {{--max-h-[calc(100vh-64px)] min-h-[calc(100vh-64px)]--}} overflow-hidden bg-no-repeat bg-cover bg-center grid"
                            >
                                <div class="w-full h-full flex flex-col justify-center items-center {{ !empty($pageSliderItem->text) ? 'backdrop-blur-sm' : '' }} z-20 text-center text-white drop-shadow-lg px-8 py-4">
                                    <div class="max-w-2xl">
                                        <div class="py-4 px-6">
                                            <x:html-tags.h3>{{ $pageSliderItem->title }}</x:html-tags.h3>
                                            @if(!empty($pageSliderItem->text))
                                                <p class="mt-2">
                                                    {!! $pageSliderItem->text !!}
                                                </p>
                                            @endif
                                        </div>

                                        @if(!empty($pageSliderItem->btn_link))
                                            <x:html-tags.button
                                                variant="button-primary-large"
                                                link="{{ $pageSliderItem->btn_link }}"
                                                class="mt-10 !inline-block">
                                                {{ $pageSliderItem->btn_label }}
                                            </x:html-tags.button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev after:text-primary-500 !hidden md:!flex {{ $page->publicPageSliderItems->count() > 2 ? 'md:!hidden' : '' }}"></div>
            <div class="swiper-button-next after:text-primary-500 !hidden md:!flex {{ $page->publicPageSliderItems->count() > 2 ? 'md:!hidden' : '' }}"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    @endif
@endpush

<x-layouts.app :page="$page">
    <div class="max-w-7xl mx-auto p-6 lg:p-8 w-full">
        <div class="mb-8">
            <x:html-tags.h1 class="mb-6">{{ $page->h1 }}</x:html-tags.h1>
            @if(!empty($page->subtitle))
                <x:html-tags.h2 class="mb-6">{{ $page->subtitle }}</x:html-tags.h2>
            @endif
        </div>

        @if(!empty($page->content))
            <div class="flex flex-col space-y-8 lg:space-y-16">
                @foreach($page->content as $content)
                    {!! $page->prepareContent($content) !!}
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>
