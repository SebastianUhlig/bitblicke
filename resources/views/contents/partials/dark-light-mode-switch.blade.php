<x:html-tags.button
    variant="button-primary-small"
    class="z-10 sticky bottom-6 !rounded-3xl h-10 mx-auto bg-primary-500/60 backdrop-blur-lg"
    onclick="enableDisableDarkmode()">
    <span class="hidden dark:flex items-center">
        <x-phosphor-sun-duotone class="h-6 w-6 inline-block"/>

        <span class="px-3">
            {{ __('frontend.turn-on-light-mode') }}
        </span>
    </span>
    <span class="flex dark:hidden items-center">
        <x-phosphor-moon-duotone class="h-6 w-6 inline-block"/>

        <span class="px-3">
            {{ __('frontend.turn-on-dark-mode') }}
        </span>
    </span>
</x:html-tags.button>

<script type="text/javascript">
    function enableDisableDarkmode()
    {
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.remove('dark');
            localStorage.theme = 'light';
        } else {
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark';
        }
    }
</script>
