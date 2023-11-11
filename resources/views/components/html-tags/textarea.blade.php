@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'error' => null,
    'placeholder' => null,
    'rows' => '2',
])

<div>
    <label
        for="{{ $id }}"
        {{ $attributes->merge([
            'class' => 'relative block rounded-xl border border-zinc-300 dark:border-zinc-700 shadow-md focus-within:border-primary-500 focus-within:ring-1 focus-within:ring-primary-500'
        ]) }}
    >
        <textarea
            {{ $attributes->wire('model') }}
            id="{{ $id }}"
            name="{{ $name }}"
            rows="{{ $rows }}"
            class="peer border-none bg-transparent placeholder-transparent rounded-xl focus:border-transparent focus:outline-none focus:ring-0 w-full"

            @if(!empty($placeholder))
                placeholder="{!! $placeholder !!}"
            @endif
        >{{ $slot }}</textarea>

        @if(!empty($label))
            <span
                class="duration-100 pointer-events-none absolute start-2.5 top-0 bg-zinc-50 dark:bg-zinc-950 p-1 text-xs text-zinc-900 dark:text-zinc-50 transition-inputLabel peer-placeholder-shown:top-2 peer-placeholder-shown:text-sm peer-focus:-top-3.5 peer-focus:text-xs"
            >
                {!! $label !!}
            </span>
        @endif
    </label>

    @if (!empty($error))
        @error($error)
            <span class="text-red-500 text-sm font-medium pt-2 pl-2">{{ $message }}</span>
        @enderror
    @endif
</div>
