@props([
    'title' => null,
    'type' => 'primary'
])

@switch($type)
    @case('announcement')
    @default
        <div {{ $attributes->merge([
                'class' => 'flex bg-blue-100 rounded-2xl p-4 mb-4 text-sm text-blue-700'
            ]) }} role="alert">
            <x-phosphor-megaphone-duotone class="h-5 w-5 inline mr-3 mt-1"/>
            <div class="hyphens-auto">
                @if(!empty($title))
                    <span class="font-semibold text-lg block hyphens-auto">{!! $title !!}</span>
                @endif

                {!! $slot !!}
            </div>
        </div>
        @break
    @case('primary')
        <div {{ $attributes->merge([
                'class' => 'flex bg-primary-100 rounded-2xl p-4 mb-4 text-sm text-primary-700'
            ]) }} role="alert">
            <x-phosphor-megaphone-duotone class="h-5 w-5 inline mr-3 mt-1"/>
            <div class="hyphens-auto">
                @if(!empty($title))
                    <span class="font-semibold text-lg block hyphens-auto">{!! $title !!}</span>
                @endif

                {!! $slot !!}
            </div>
        </div>
        @break
    @case('neutral')
        <div {{ $attributes->merge([
                'class' => 'flex bg-zinc-100 dark:bg-zinc-900 border dark:border-zinc-600 rounded-2xl p-4 mb-4 text-sm text-zinc-900 dark:text-white'
            ]) }} role="alert">
            <div class="hyphens-auto">
                @if(!empty($title))
                    <span class="font-semibold text-lg block hyphens-auto">{!! $title !!}</span>
                @endif

                {!! $slot !!}
            </div>
        </div>
        @break
    @case('info')
        <div {{ $attributes->merge([
                'class' => 'flex bg-blue-100 rounded-2xl p-4 mb-4 text-sm text-blue-700'
            ]) }} role="alert">
            <x-phosphor-info-duotone class="h-5 w-5 inline mr-3 mt-1"/>
            <div class="hyphens-auto">
                @if(!empty($title))
                    <span class="font-semibold text-lg block hyphens-auto">{!! $title !!}</span>
                @endif

                {!! $slot !!}
            </div>
        </div>
        @break
    @case('success')
        <div {{ $attributes->merge([
                'class' => 'flex bg-green-100 rounded-2xl p-4 mb-4 text-sm text-green-700'
            ]) }} role="alert">
            <x-phosphor-check-circle-duotone class="h-5 w-5 inline mr-3 mt-1"/>
            <div class="hyphens-auto">
                @if(!empty($title))
                    <span class="font-semibold text-lg block hyphens-auto">{!! $title !!}</span>
                @endif

                {!! $slot !!}
            </div>
        </div>
        @break
    @case('warning')
        <div {{ $attributes->merge([
                'class' => 'flex bg-yellow-100 rounded-2xl p-4 mb-4 text-sm text-yellow-700'
            ]) }} role="alert">
            <x-phosphor-warning-duotone class="h-5 w-5 inline mr-3 mt-1"/>
            <div class="hyphens-auto">
                @if(!empty($title))
                    <span class="font-semibold text-lg block hyphens-auto">{!! $title !!}</span>
                @endif

                {!! $slot !!}
            </div>
        </div>
        @break
    @case('danger')
        <div {{ $attributes->merge([
                'class' => 'flex bg-red-100 rounded-2xl p-4 mb-4 text-sm text-red-700'
            ]) }} role="alert">
            <x-phosphor-warning-duotone class="h-5 w-5 inline mr-3 mt-1"/>
            <div class="hyphens-auto">
                @if(!empty($title))
                    <span class="font-semibold text-lg block hyphens-auto">{!! $title !!}</span>
                @endif

                {!! $slot !!}
            </div>
        </div>
        @break
@endswitch
