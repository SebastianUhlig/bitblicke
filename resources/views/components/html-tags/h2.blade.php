@props([
    'title' => null,
    'slot' => null,
])
<h2 {{ $attributes->merge([
        'class' => 'font-semibold text-3xl leading-relaxed hyphens-auto'
    ]) }}
>
    {{ $title ?: $slot }}
</h2>
