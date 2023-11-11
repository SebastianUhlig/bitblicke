@props([
    'thead' => '',
    'tbody' => '',
    'rounded' => false,
])

<div class="relative overflow-x-auto dark:border-gray-700 {{ $rounded ? 'border rounded-lg' : 'border-t' }}">
    <table class="w-full table-auto divide-y text-start dark:divide-gray-700">
        <thead>
            {{ $thead }}
        </thead>
        <tbody class="divide-y whitespace-nowrap dark:divide-gray-700">
            {{ $tbody }}
        </tbody>
    </table>
</div>
