<div class="z-30 relative py-4 w-full text-gray-700">
    <div class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="flex-grow flex justify-end flex-row items-center">
            @if (Route::has('filament.app.auth.login'))
                @auth
                    <x-nav-link link="{{ route('filament.app.auth.login') }}" :wire="false">Dashboard</x-nav-link>
                    @if (auth()->user()?->is_admin)
                        <x-nav-link link="{{ route('filament.admin.auth.login') }}" :wire="false">Admin-Area</x-nav-link>
                    @endif
                @else
                    <x-nav-link link="{{ route('filament.app.auth.login') }}" :wire="false">Log in</x-nav-link>

                    @if (Route::has('filament.app.auth.register'))
                        <x-nav-link link="{{ route('filament.app.auth.register') }}" :wire="false">Register</x-nav-link>
                    @endif
                @endauth
            @endif

            <x-theme-toggle></x-theme-toggle>
        </div>
    </div>
</div>
