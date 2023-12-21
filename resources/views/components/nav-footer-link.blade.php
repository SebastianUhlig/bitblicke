@props([
    'active' => false,
    'link' => null,
    'wire' => true,
])

@if ($wire)
    @if ($active)
        <li>
            <a
                class="text-gray-700 transition hover:text-primary-500 dark:text-white dark:hover:text-primary-500 underline hover:no-underline"
                href="{{ $link }}"
                wire:navigate
            >
                {{ $slot }}
            </a>
        </li>
    @else
        <li>
            <a
                class="text-gray-700 transition hover:text-primary-500 dark:text-white dark:hover:text-primary-500 underline hover:no-underline"
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
                class="text-gray-700 transition hover:text-primary-500 dark:text-white dark:hover:text-primary-500 underline hover:no-underline"
                href="{{ $link }}"
            >
                {{ $slot }}
            </a>
        </li>
    @else
        <li>
            <a
                class="text-gray-700 transition hover:text-primary-500 dark:text-white dark:hover:text-primary-500 underline hover:no-underline"
                href="{{ $link }}"
            >
                {{ $slot }}
            </a>
        </li>
    @endif
@endif
