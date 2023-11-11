<x:html-tags.h3 class="!-mb-2 lg:!-mb-10">{{ $title }}</x:html-tags.h3>
<div class="grid grid-cols-1 md:grid-cols-{{ count($teasers) > 2 ? '3' : '2' }} gap-6 lg:gap-8">
    @each('contents.partials.teaser', $teasers, 'teaser')
</div>
