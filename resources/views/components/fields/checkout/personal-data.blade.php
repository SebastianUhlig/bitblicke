<div>
    <x:html-tags.h3 class="mb-6">{{ __('checkout.personal_data.title') }}</x:html-tags.h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="salutation" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.salutation') }}</label>
            <select id="salutation"
                    name="personal[salutation]"
                    class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                <option value="" disabled {{ empty(old('personal.salutation')) ? 'selected' : '' }}>{{ __('checkout.personal_data.fields.please_choose') }}</option>
                <option value="{{ \App\Enums\OrderCustomerEnum::SALUTATION_MR }}"
                        {{ !empty(old('personal.salutation')) && old('personal.salutation') == \App\Enums\OrderCustomerEnum::SALUTATION_MR ? 'selected' : '' }}>
                    {{ \App\Enums\OrderCustomerEnum::getSalutationName(\App\Enums\OrderCustomerEnum::SALUTATION_MR) }}
                </option>
                <option value="{{ \App\Enums\OrderCustomerEnum::SALUTATION_MRS }}"
                        {{ !empty(old('personal.salutation')) && old('personal.salutation') == \App\Enums\OrderCustomerEnum::SALUTATION_MRS ? 'selected' : '' }}>
                    {{ \App\Enums\OrderCustomerEnum::getSalutationName(\App\Enums\OrderCustomerEnum::SALUTATION_MRS) }}
                </option>
                <option value="{{ \App\Enums\OrderCustomerEnum::SALUTATION_DIVERS }}"
                        {{ !empty(old('personal.salutation')) && old('personal.salutation') == \App\Enums\OrderCustomerEnum::SALUTATION_DIVERS ? 'selected' : '' }}>
                    {{ \App\Enums\OrderCustomerEnum::getSalutationName(\App\Enums\OrderCustomerEnum::SALUTATION_DIVERS) }}
                </option>
            </select>
            @error('personal.salutation')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="title" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.title') }}</label>
            <input type="text"
                   id="title"
                   name="personal[title]"
                   value="{{ old('personal.title') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.title')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="first_name" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.first_name') }}</label>
            <input type="text"
                   id="first_name"
                   name="personal[first_name]"
                   value="{{ old('personal.first_name') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.first_name')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="last_name" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.last_name') }}</label>
            <input type="text"
                   id="last_name"
                   name="personal[last_name]"
                   value="{{ old('personal.last_name') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.last_name')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="email" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.email') }}</label>
            <input type="email"
                   id="email"
                   name="personal[email]"
                   value="{{ old('personal.email') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.email')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="phone" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.phone') }}</label>
            <input type="text"
                   id="phone"
                   name="personal[phone]"
                   value="{{ old('personal.phone') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.phone')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="col-span-1 sm:col-span-2">
            <label for="street" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.street') }}</label>
            <input type="text"
                   id="street"
                   name="personal[street]"
                   value="{{ old('personal.street') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.street')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-1">
            <label for="street_no" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.street_no') }}</label>
            <input type="text"
                   id="street_no"
                   name="personal[street_no]"
                   value="{{ old('personal.street_no') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.street_no')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="col-span-1">
            <label for="postcode" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.postcode') }}</label>
            <input type="text"
                   id="postcode"
                   name="personal[postcode]"
                   value="{{ old('personal.postcode') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.postcode')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-span-1 sm:col-span-2">
            <label for="city" class="text-sm font-semibold">{{ __('checkout.personal_data.fields.city') }}</label>
            <input type="text"
                   id="city"
                   name="personal[city]"
                   value="{{ old('personal.city') }}"
                   class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
            @error('personal.city')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
