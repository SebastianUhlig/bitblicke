@props([
    'title' => null,
    'slot' => null,
])
<h5 {{ $attributes->merge([
        'class' => 'font-semibold text-xl leading-relaxed hyphens-auto'
    ]) }}
>
    {{ $title ?: $slot }}
</h5>
