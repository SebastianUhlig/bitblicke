@props([
    'title' => null,
    'slot' => null,
])
<h1 {{ $attributes->merge([
        'class' => 'font-semibold text-4xl text-primary-500 dark:text-primary-500 hyphens-auto'
    ]) }}
>
    {{ $title ?: $slot }}
</h1>
