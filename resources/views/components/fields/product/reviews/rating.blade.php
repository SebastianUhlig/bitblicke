@props([
    'error' => null,
])

<div>
    <div x-data="
                {
                    rating: {{ $rating }},
                    hoverRating: {{ $rating }},
                    ratings: [
                        {'amount': 1, 'label':'{{ __('Terrible') }}'},
                        {'amount': 2, 'label':'{{ __('Bad') }}'},
                        {'amount': 3, 'label':'{{ __('Okay') }}'},
                        {'amount': 4, 'label':'{{ __('Good') }}'},
                        {'amount': 5, 'label':'{{ __('Great') }}'}
                    ],
                    rate(amount) {
                        if (this.rating == amount) {
                            this.rating = 0;
                        } else {
                            this.rating = amount;
                        }
                    },
                    currentLabel() {
                        let r = this.rating;
                        if (this.hoverRating != this.rating) r = this.hoverRating;
                        let i = this.ratings.findIndex(e => e.amount == r);
                        if (i >=0) {return this.ratings[i].label;} else {return ''}
                    }
                }
            ">
        <div class="flex">
            <template x-for="(star, index) in ratings" :key="index">
                @if($changeable)
                    <button x-on:click="$wire.setRating(star.amount)" @click="rate(star.amount)" @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating"
                            type="button"
                            aria-hidden="true"
                            :title="star.label"
                            class="rounded-sm text-zinc-300 fill-current focus:outline-none focus:shadow-outline w-5 m-0 cursor-pointer"
                            :class="{'text-zinc-600': hoverRating >= star.amount, '!text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                        <svg class="h-5 w-5 transition duration-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @else
                    <span type="button"
                            aria-hidden="true"
                            :title="star.label"
                            class="rounded-sm text-zinc-300 fill-current focus:outline-none focus:shadow-outline w-5 m-0"
                            :class="{'text-zinc-600': hoverRating >= star.amount, '!text-yellow-400': rating >= star.amount && hoverRating >= star.amount}">
                        <svg class="h-5 w-5 transition duration-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
                    </span>
                @endif
            </template>
            <div class="ml-3 text-sm flex items-center">
                <template x-if="rating || hoverRating">
                    <p x-text="currentLabel()"></p>
                </template>
                <template x-if="!rating && !hoverRating">
                    <p>{{ __('Please Rate!') }}</p>
                </template>
            </div>
        </div>
    </div>

    @if (!empty($error))
        <div class="mb-4">
            @error($error)
                <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>
    @endif
</div>
