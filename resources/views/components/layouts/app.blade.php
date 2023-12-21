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

    <body x-cloak
          x-data="{ theme: localStorage.getItem('theme') || localStorage.setItem('theme', 'system') }"
          x-init="$watch('theme', val => localStorage.setItem('theme', val))"
          x-bind:class="{'dark': theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
          class="antialiased">
        <div class="bg-gray-100 dark:bg-[#02174c] selection:bg-primary-500 selection:text-white text-gray-900 dark:text-gray-200">
            <div class="relative z-20 bg-gray-100 dark:bg-black/70 min-h-[calc(100vh-342px)]">
                <livewire:topbar></livewire:topbar>

                <livewire:navigation :logo="true" position="header"></livewire:navigation>

                <div class="relative">
                    {{ $slot }}
                </div>
            </div>

            <livewire:navigation :logo="true" position="footer"></livewire:navigation>
        </div>
    </body>
</html>
