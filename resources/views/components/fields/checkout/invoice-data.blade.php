<div x-data="{ open: {{ !empty(old('individual')) ? 'true' : 'false' }} }">
    <x:html-tags.h3 class="mb-6">{{ __('checkout.invoice_data.title') }}</x:html-tags.h3>

    <div>
        <input @click="open = ! open" {!! !empty(old('individual')) ? 'checked=checked' : '' !!} type="checkbox" name="individual" id="individual" class="w-6 h-6 mr-2 rounded-xl border-0 accent-primary-500 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500">
        <label for="individual">{{ __('checkout.invoice_data.checkbox') }}</label>
    </div>

    <div x-show="open">
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="salutation" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.salutation') }}</label>
                <select id="salutation"
                        name="invoice[salutation]"
                        class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                    <option value="" disabled {{ empty(old('invoice.salutation')) ? 'selected' : '' }}>{{ __('checkout.invoice_data.fields.please_choose') }}</option>
                    <option value="{{ \App\Enums\OrderCustomerEnum::SALUTATION_MR }}"
                        {{ !empty(old('invoice.salutation')) && old('invoice.salutation') == \App\Enums\OrderCustomerEnum::SALUTATION_MR ? 'selected' : '' }}>
                        {{ \App\Enums\OrderCustomerEnum::getSalutationName(\App\Enums\OrderCustomerEnum::SALUTATION_MR) }}
                    </option>
                    <option value="{{ \App\Enums\OrderCustomerEnum::SALUTATION_MRS }}"
                        {{ !empty(old('invoice.salutation')) && old('invoice.salutation') == \App\Enums\OrderCustomerEnum::SALUTATION_MRS ? 'selected' : '' }}>
                        {{ \App\Enums\OrderCustomerEnum::getSalutationName(\App\Enums\OrderCustomerEnum::SALUTATION_MRS) }}
                    </option>
                    <option value="{{ \App\Enums\OrderCustomerEnum::SALUTATION_DIVERS }}"
                        {{ !empty(old('invoice.salutation')) && old('invoice.salutation') == \App\Enums\OrderCustomerEnum::SALUTATION_DIVERS ? 'selected' : '' }}>
                        {{ \App\Enums\OrderCustomerEnum::getSalutationName(\App\Enums\OrderCustomerEnum::SALUTATION_DIVERS) }}
                    </option>
                </select>
                @error('invoice.salutation')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="title" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.title') }}</label>
                <input type="text"
                       id="title"
                       name="invoice[title]"
                       value="{{ old('invoice.title') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.title')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.first_name') }}</label>
                <input type="text"
                       id="first_name"
                       name="invoice[first_name]"
                       value="{{ old('invoice.first_name') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.first_name')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="last_name" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.last_name') }}</label>
                <input type="text"
                       id="last_name"
                       name="invoice[last_name]"
                       value="{{ old('invoice.last_name') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.last_name')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="email" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.email') }}</label>
                <input type="email"
                       id="email"
                       name="invoice[email]"
                       value="{{ old('invoice.email') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.email')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="phone" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.phone') }}</label>
                <input type="text"
                       id="phone"
                       name="invoice[phone]"
                       value="{{ old('invoice.phone') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.phone')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="col-span-1 sm:col-span-2">
                <label for="street" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.street') }}</label>
                <input type="text"
                       id="street"
                       name="invoice[street]"
                       value="{{ old('invoice.street') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-zinc-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.street')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-1">
                <label for="street_no" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.street_no') }}</label>
                <input type="text"
                       id="street_no"
                       name="invoice[street_no]"
                       value="{{ old('invoice.street_no') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.street_no')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="col-span-1">
                <label for="postcode" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.postcode') }}</label>
                <input type="text"
                       id="postcode"
                       name="invoice[postcode]"
                       value="{{ old('invoice.postcode') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.postcode')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-span-1 sm:col-span-2">
                <label for="city" class="text-sm font-semibold">{{ __('checkout.invoice_data.fields.city') }}</label>
                <input type="text"
                       id="city"
                       name="invoice[city]"
                       value="{{ old('invoice.city') }}"
                       class="bg-zinc-100 dark:bg-zinc-900 text-zinc-900 dark:text-white block mt-2 w-full rounded-xl border-0 ring-1 ring-inset ring-zinc-300 dark:ring-zinc-600 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary-500 sm:text-sm sm:leading-6">
                @error('invoice.city')
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
