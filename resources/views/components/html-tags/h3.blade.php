@props([
    'title' => null,
])
<h3 {{ $attributes->merge([
        'class' => 'font-semibold text-2xl leading-relaxed hyphens-auto'
    ]) }}
>
    {{ $title ?: $slot }}
</h3>
