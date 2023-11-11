@if($teaser->link)
    <a href="{{ $teaser->link }}"
       class="translate-y-0 bg-white dark:bg-zinc-900 from-zinc-700/50 via-transparent rounded-2xl shadow-2xl shadow-zinc-500/20 dark:shadow-black/50 flex motion-safe:hover:-translate-y-2.5 ease-out transition-all duration-300 focus:outline focus:outline-2 focus:outline-primary-500">
        {!! $teaser->appearance_html !!}
    </a>
@else
    <div class="scale-100 bg-white dark:bg-zinc-900 from-zinc-700/50 via-transparent rounded-2xl shadow-2xl shadow-zinc-500/20 dark:shadow-black/50 flex focus:outline focus:outline-2 focus:outline-primary-500">
        {!! $teaser->appearance_html !!}
    </div>
@endif
