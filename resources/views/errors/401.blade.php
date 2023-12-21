@php($page = \App\Models\Page::where('slug', '=', '401')->first())

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
