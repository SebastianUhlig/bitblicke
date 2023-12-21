<div x-cloak class="relative inline-flex items-center gap-5 ml-4">

    <button x-on:click="theme = 'light'">
        <svg xmlns="http://www.w3.org/2000/svg"
             x-bind:class="{'outline-lime-500': theme === 'light', 'outline-gray-800': theme !== 'light'}"
             class="w-7 h-7 p-1 outline outline-2 outline-offset-2 text-gray-700 transition rounded-full cursor-pointer bg-white hover:bg-lime-500 hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        <span class="sr-only">Hell</span>
    </button>

    <button x-on:click="theme = 'dark'">
        <svg xmlns="http://www.w3.org/2000/svg"
             x-bind:class="{'outline-lime-500': theme === 'dark', 'outline-gray-800': theme !== 'dark'}"
             class="w-7 h-7 p-1 outline outline-2 outline-offset-2 text-gray-100 transition bg-gray-700 rounded-full cursor-pointer hover:bg-lime-500 hover:text-white" viewBox="0 0 20 20" fill="currentColor">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
        </svg>
        <span class="sr-only">Dunkel</span>
    </button>

    <button x-on:click="theme = 'system'">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            x-cloak
            x-show="! window.matchMedia('(prefers-color-scheme: dark)').matches"
            x-bind:class="{'outline-lime-500': theme === 'system', 'outline-gray-800': theme !== 'system'}"
            class="w-7 h-7 p-1 outline outline-2 outline-offset-2 text-gray-700 transition bg-gray-100 rounded-full cursor-pointer hover:bg-lime-500 hover:text-white"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>

        <svg
            xmlns="http://www.w3.org/2000/svg"
            x-show="window.matchMedia('(prefers-color-scheme: dark)').matches"
            x-bind:class="{'outline-lime-500': theme === 'system', 'outline-gray-800': theme !== 'system'}"
            class="w-7 h-7 p-1 outline outline-2 outline-offset-2 text-gray-100 transition bg-gray-700 rounded-full cursor-pointer hover:bg-lime-500 hover:text-white"
            x-cloak
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span class="sr-only">System</span>
    </button>
</div>


{{--
<button @click="darkMode=!darkMode" type="button" class="relative inline-flex flex-shrink-0 h-6 ml-4 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer bg-zinc-200 dark:bg-zinc-700 w-11 focus:outline-none focus:ring-2 focus:ring-neutral-700 focus:ring-offset-2" role="switch" aria-checked="false">
    <span class="sr-only">Use setting</span>
    <span class="relative inline-block w-5 h-5 transition duration-500 ease-in-out transform translate-x-0 bg-white rounded-full shadow pointer-events-none dark:translate-x-5 ring-0">
        <span class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-500 ease-in opacity-100 dark:opacity-0 dark:duration-100 dark:ease-out" aria-hidden="true">
             <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun w-4 h-4 text-neutral-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
             </svg>
        </span>
        <span class="absolute inset-0 flex items-center justify-center w-full h-full transition-opacity duration-100 ease-out opacity-0 dark:opacity-100 dark:duration-200 dark:ease-in" aria-hidden="true">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon w-4 h-4 text-neutral-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
             </svg>
        </span>
    </span>
</button>
--}}
