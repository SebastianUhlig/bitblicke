@push('breadcrumb')
    <nav class="my-12 px-12" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-2">
            <li>
                <div class="flex items-center">
                    <a href="{{ route('frontend.page', 'blog') }}" class="transition-all mr-2 text-sm font-medium text-zinc-900 dark:text-white">{{ __('Blog') }}</a>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-zinc-300">
                        <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                    </svg>
                </div>
            </li>

            <li class="text-sm">
                <span aria-current="page" class="transition-all font-medium text-zinc-500 dark:text-zinc-400 hover:text-zinc-600 cursor-default">
                    {{ $blog_post->title }}
                </span>
            </li>
        </ol>
    </nav>
@endpush

<x:layouts.app title="{{ $page->meta_title }}" description="{{ $page->meta_description }}">
    <div class="my-12 px-12">
        @if(!empty($blog_post->public_image))
            <div class="w-full h-96 shadow-2xl shadow-zinc-500/20 dark:shadow-black/50">
                <img src="{{ url($blog_post->public_image->url) }}" alt="{{ $blog_post->public_image->alt }}" class="h-full w-full object-cover object-center rounded-2xl ">
            </div>
        @endif

        <x:html-tags.h1 class="mt-10 mb-6">{{ $blog_post->title }}</x:html-tags.h1>

        <div>
            <x:html-tags.h3 class="sr-only">{{ __('Description') }}</x:html-tags.h3>

            <div class="flex flex-col space-y-4 text-base text-zinc-900 dark:text-white">
                {!! $blog_post->content !!}
            </div>

            <div class="pt-10 text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">
                {{ $blog_post->published_at->diffForHumans() }} {{ __('by') }} <b>{{ $blog_post->user->name }}</b>

                <div class="pt-10">
                    <ul class="flex space-x-3">
                        <li class="flex items-center">
                            <livewire:blog.detail.like :blog_post="$blog_post"></livewire:blog.detail.like>
                        </li>
                        <li class="flex items-center">
                            <b class="mr-1">{{ $blog_post->views->count() }}</b> {{ __('Views') }}
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <livewire:blog.detail.comments :blog_post="$blog_post"></livewire:blog.detail.comments>
            </div>
        </div>
    </div>
</x:layouts.app>
