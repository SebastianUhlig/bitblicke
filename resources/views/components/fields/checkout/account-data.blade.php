<div>
    <x:html-tags.h3 class="mb-6">{{ __('If you don\'t have an account yet, you can create one now') }}</x:html-tags.h3>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="email" class="text-sm font-semibold">{{ __('E-Mail-Address') }}</label>
            <input type="email"
                   id="email"
                   name="account[email]"
                   value="{{ old('account.email') }}"
                   class="bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white block mt-2 w-full rounded-md border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('account.email')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="name" class="text-sm font-semibold">{{ __('Username') }}</label>
            <input type="text"
                   id="name"
                   name="account[name]"
                   value="{{ old('account.name') }}"
                   class="bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white block mt-2 w-full rounded-md border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('account.name')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="password" class="text-sm font-semibold">{{ __('Password') }}</label>
            <input type="password"
                   id="password"
                   name="account[password]"
                   value="{{ old('account.password') }}"
                   class="bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white block mt-2 w-full rounded-md border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('account.password')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password_confirmation" class="text-sm font-semibold">{{ __('Password confirmation') }}</label>
            <input type="password"
                   id="password_confirmation"
                   name="account[password_confirmation]"
                   value="{{ old('account.password_confirmation') }}"
                   class="bg-white dark:bg-zinc-800 text-zinc-900 dark:text-white block mt-2 w-full rounded-md border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('account.password_confirmation')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
