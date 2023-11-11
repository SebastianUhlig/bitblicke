@props([
    'options' => [],
    'label' => null,
    'id' => null,
    'name' => null,
    'selected' => false,
    'emptyFirst' => false,
    'emptyFirstDisabled' => true,
    'emptyFirstText' => '',
])

@php
    $selected = $selected && !is_array($selected) ? [$selected] : $selected
@endphp

<div>
    <label
        for="{{ $id }}"
        {{ $attributes->merge([
            'class' => 'relative block rounded-xl border border-zinc-300 dark:border-zinc-700 shadow-md focus-within:border-primary-500 focus-within:ring-1 focus-within:ring-primary-500'
        ]) }}
    >
        <select
            {{ $attributes->wire('model') }}
            id="{{ $id }}"
            name="{{ $name }}"
            class="peer border-none bg-transparent placeholder-transparent rounded-xl focus:border-transparent focus:outline-none focus:ring-0 w-full"
            value="{{ is_array($selected) ? $selected[0] : '' }}"
        >
            @if ($emptyFirst !== false)
                <option {{ (!$attributes->wire('model')->value() && !$selected) ? 'selected' : '' }} value=""
                    {{ $emptyFirstDisabled ? 'disabled' : null }}>
                    {!! __($emptyFirstText) !!}
                </option>
            @endif

            @foreach ($options as $key => $value)
                <option value="{{ $key }}" {{ !$attributes->wire('model')->value() && $selected && in_array($key, $selected) ? 'selected' : '' }}>
                    {{ __($value) }}
                </option>
            @endforeach
        </select>

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
