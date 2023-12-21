<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - {{ config('app.name') }}</title>

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
            <div class="relative z-20 bg-gray-100 dark:bg-black/70 min-h-screen grid place-content-center p-4">
                <x-logo class="mb-8 text-center"></x-logo>

                <x-html-tags.h1 class="mb-8 text-center">@yield('title')</x-html-tags.h1>

                <p class="mb-8">
                    @yield('message')
                </p>

                <x-html-tags.alert title="Hast Du Fragen oder Probleme?" type="neutral">
                    Du kannst dich jederzeit bei mir an <x-html-tags.link href="mailto:sebastian@bitblicke.de">sebastian@bitblicke.de</x-html-tags.link> wenden.
                </x-html-tags.alert>
            </div>
        </div>
    </body>
</html>
