@props([
    'title' => null,
    'slot' => null,
])
<h4 {{ $attributes->merge([
        'class' => 'font-semibold text-2xl leading-relaxed hyphens-auto'
    ]) }}
>
    {{ $title ?: $slot }}
</h4>
