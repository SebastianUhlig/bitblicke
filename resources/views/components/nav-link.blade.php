@props([
    'active' => false,
    'link' => null,
    'wire' => true,
])

@if ($wire)
    @if ($active)
        <a class="transition px-4 py-2 text-sm font-semibold text-white bg-primary-500 rounded-lg dark:focus:bg-primary-500 dark:focus:text-white dark:hover:text-white dark:text-white md:mt-0 focus:text-gray-900 hover:bg-primary-700 focus:bg-primary-700 focus:outline-none focus:shadow-outline" href="{{ $link }}" wire:navigate>{{ $slot }}</a>
    @else
        <a class="transition px-4 py-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ $link }}" wire:navigate>{{ $slot }}</a>
    @endif
@else
    @if ($active)
        <a class="transition px-4 py-2 text-sm font-semibold text-white bg-primary-500 rounded-lg dark:focus:bg-primary-500 dark:focus:text-white dark:hover:text-white dark:text-white md:mt-0 focus:text-gray-900 hover:bg-primary-700 focus:bg-primary-700 focus:outline-none focus:shadow-outline" href="{{ $link }}">{{ $slot }}</a>
    @else
        <a class="transition px-4 py-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-primary-500 dark:focus:bg-primary-500 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ $link }}">{{ $slot }}</a>
    @endif
@endif
