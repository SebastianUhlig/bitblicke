@props([
    'title' => null,
    'slot' => null,
])
<h6 {{ $attributes->merge([
        'class' => 'font-semibold text-lg leading-relaxed hyphens-auto'
    ]) }}
>
    {{ $title ?: $slot }}
</h6>
