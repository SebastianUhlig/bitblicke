@props([
    'link' => null,
    'dropdownAlpine' => false
])

@if($dropdownAlpine)
    @if(!empty($link))
        <a href="{{ $link }}" @mouseover="open = true" {{ $attributes->merge([
          'class' => 'block transition-all font-semibold text-zinc-600 hover:text-primary-500 dark:text-zinc-200 dark:hover:text-primary-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-primary-500'
        ]) }}>
            {{ $slot }}
        </a>
    @else
        <span @mouseover="open = true" {{ $attributes->merge([
          'class' => 'block text-zinc-600 dark:text-zinc-200'
        ]) }}>
            {{ $slot }}
        </span>
    @endif
@else
    @if(!empty($link))
        <a href="{{ $link }}" {{ $attributes->merge([
          'class' => 'block transition-all font-semibold text-zinc-600 hover:text-primary-500 dark:text-zinc-200 dark:hover:text-primary-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-primary-500'
        ]) }}>
            {{ $slot }}
        </a>
    @else
        <span {{ $attributes->merge([
          'class' => 'block text-zinc-700 dark:text-zinc-200'
        ]) }}>
            {{ $slot }}
        </span>
    @endif
@endif
