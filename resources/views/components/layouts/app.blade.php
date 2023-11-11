<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $page->meta_title }} - {{ config('app.name') }}</title>
        <meta name="description" content="{{ $page->meta_description }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.scss', 'resources/js/app.js'])
    </head>
    <body x-cloak x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode === true }" class="antialiased">
        <div class="bg-dotted-spacing-[3rem] bg-dotted-gray-400/50 dark:bg-dotted-gray-800 min-h-screen bg-gray-100 dark:bg-gray-900 selection:bg-primary-500 selection:text-white text-gray-900 dark:text-gray-200">
            <livewire:topbar></livewire:topbar>

            <livewire:navigation :logo="true" position="header"></livewire:navigation>

            <div class="relative">
                {{ $slot }}
            </div>

            <livewire:navigation :logo="true" position="footer"></livewire:navigation>
        </div>
    </body>
</html>
