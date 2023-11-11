@if($title)
    <x:html-tags.h3 class="md:-mb-6 lg:-mb-10">{{ $title }}</x:html-tags.h3>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-6">
    @foreach($blog_posts as $blog_post)
        <a href="{{ $blog_post->link }}"
           class="scale-100 bg-white dark:bg-zinc-900 rounded-2xl shadow-2xl shadow-zinc-500/20 dark:shadow-black/20 motion-safe:hover:scale-[1.07] transition-all duration-300 focus:outline focus:outline-2 focus:outline-primary-500 flex flex-col justify-between">
            <div class="p-4">
                @if(!empty($blog_post->public_image))
                    <img src="{{ url($blog_post->public_image->url) }}" alt="{{ $blog_post->public_image->alt }}" class="w-full aspect-square md:aspect-video md:h-36 object-cover object-center rounded-2xl">
                @else
                    <div class="w-full aspect-square md:aspect-video md:h-36 bg-zinc-100 dark:bg-zinc-800 rounded-2xl"></div>
                @endif
            </div>
            <div class="px-6">
                <x:html-tags.h5>{{ str($blog_post->title)->limit(28) }}</x:html-tags.h5>
            </div>

            <div class="pt-0 p-6 text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">
                {{ $blog_post->published_at->diffForHumans() }}<br/>{{ __('by') }} <b>{{ $blog_post->user->name }}</b>

                <div class="mt-4">
                    <ul class="flex space-x-5">
                        <li class="flex items-center">
                            <b class="mr-1.5">{{ $blog_post->comments->count() }}</b>
                            <x-phosphor-chat-teardrop-dots-duotone class="h-6 w-6"/>
                        </li>
                        <li class="flex items-center">
                            <b class="mr-1.5">{{ $blog_post->likes->count() }}</b>
                            <x-phosphor-heart-duotone class="h-6 w-6"/>
                        </li>
                        <li class="flex items-center">
                            <b class="mr-1.5">{{ $blog_post->views->count() }}</b> {{ __('Views') }}
                        </li>
                    </ul>
                </div>
            </div>
        </a>
    @endforeach
</div>
