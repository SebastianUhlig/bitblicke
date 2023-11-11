@props([
    'label' => null,
    'type' => 'text',
    'id' => null,
    'name' => null,
    'value' => null,
    'error' => null,
    'placeholder' => null,
    'multiple' => false,
])

<div>
    <label
        for="{{ $id }}"
        {{ $attributes->merge([
            'class' => 'relative block rounded-xl border border-zinc-300 dark:border-zinc-700 shadow-md focus-within:border-primary-500 focus-within:ring-1 focus-within:ring-primary-500'
        ]) }}
    >
        <input
            type="{{ $type }}"
            {{ $attributes->wire('model') }}
            {!! $multiple ? 'multiple' : '' !!}
            id="{{ $id }}"
            name="{{ $name }}"
            value="{{ $value }}"
            class="peer border-none bg-transparent placeholder-transparent rounded-xl focus:border-transparent focus:outline-none focus:ring-0 w-full
               file:mr-4 file:py-2 file:px-4
               file:rounded-l-md file:border-0
               file:text-sm file:font-medium
               file:cursor-pointer
               file:bg-zinc-50 file:text-zinc-900
               dark:file:bg-zinc-950 dark:file:text-white"

            @if(!empty($placeholder))
                placeholder="{!! $placeholder !!}"
            @endif
        />

        @if(!empty($label))
            <span
                class="duration-100 pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-zinc-50 dark:bg-zinc-950 p-1 text-xs text-zinc-900 dark:text-zinc-50 transition-inputLabel peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs"
            >
                {!! $label !!}
            </span>
        @endif
    </label>

    @if (!empty($error))
        @error($error)
            <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
        @enderror
    @endif
</div>
