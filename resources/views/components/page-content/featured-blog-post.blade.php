<div class="grid grid-cols-1">
    <a href="{{ $blog_post->link }}"
       class="group scale-100 bg-white dark:bg-zinc-900 from-zinc-700/50 via-transparent rounded-2xl shadow-2xl shadow-zinc-500/20 dark:shadow-black/50 motion-safe:hover:scale-[1.03] transition-all duration-300 focus:outline focus:outline-2 focus:outline-primary-500 flex flex-col lg:flex-row justify-between">
        <div class="w-full lg:w-1/4 h-full bg-zinc-100 dark:bg-zinc-800 rounded-tl-2xl rounded-tr-2xl lg:rounded-tr-none rounded-bl-none lg:rounded-bl-2xl">
            @if(!empty($blog_post->public_image))
                <img src="{{ url($blog_post->public_image->url) }}" alt="{{ $blog_post->public_image->alt }}" class="h-full w-full object-cover object-center rounded-tl-2xl rounded-tr-2xl lg:rounded-tr-none rounded-bl-none lg:rounded-bl-2xl">
            @endif
        </div>
        <div class="w-full lg:w-3/4">
            <div class="p-6">
                <x:html-tags.h4>{{ str($blog_post->title)->limit(90) }}</x:html-tags.h4>

                <div class="pt-6">
                    {!! str(strip_tags($blog_post->content))->limit(302) !!}
                </div>

                <span class="group-hover:underline group-hover:text-primary-500 transition text-lg font-semibold block mt-6">{{ __('Read more') }}</span>
            </div>

            <div class="pt-0 p-6 text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">
                {{ $blog_post->published_at->diffForHumans() }} {{ __('by') }} <b>{{ $blog_post->user->name }}</b>

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
        </div>
    </a>
</div>
