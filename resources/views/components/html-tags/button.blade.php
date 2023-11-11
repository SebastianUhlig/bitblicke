@props([
    'type' => 'button',
    'link' => null,
])

@if(!empty($link))
    <a href="{{ $link }}" {{ $attributes->merge([
        'class' => $variant_classes
    ]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge([
        'class' => $variant_classes
    ]) }}>
        {{ $slot }}
    </button>
@endif
