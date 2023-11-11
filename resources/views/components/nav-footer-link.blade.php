@props([
    'active' => false,
    'link' => null,
    'wire' => true,
])

@if ($wire)
    @if ($active)
        <li>
            <a
                class="text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                href="{{ $link }}"
                wire:navigate
            >
                {{ $slot }}
            </a>
        </li>
    @else
        <li>
            <a
                class="text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                href="{{ $link }}"
                wire:navigate
            >
                {{ $slot }}
            </a>
        </li>
    @endif
@else
    @if ($active)
        <li>
            <a
                class="text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                href="{{ $link }}"
            >
                {{ $slot }}
            </a>
        </li>
    @else
        <li>
            <a
                class="text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                href="{{ $link }}"
            >
                {{ $slot }}
            </a>
        </li>
    @endif
@endif
