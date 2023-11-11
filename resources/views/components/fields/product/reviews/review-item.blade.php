<div class="flex flex-row w-full py-4">
    <div class="mr-4">
        <div class="h-12 w-12 bg-zinc-200 dark:bg-zinc-900 rounded-full"></div>
    </div>
    <div>
        <div>
            <x:fields.product.reviews.rating :rating="$review->rating" :changeable="false"></x:fields.product.reviews.rating>
        </div>
        <div class="flex mt-4 text-sm text-zinc-900 dark:text-white">
            <a href="#" class="font-semibold mr-1">{{ $review->user->name }}</a> &middot; {{ $review->created_at->diffForHumans() }}
        </div>

        <div class="mt-1 max-w-[40rem] text-zinc-500 dark:text-zinc-400 leading-relaxed">
            {!! nl2br($review->text) !!}
        </div>

        <div class="mt-3 flex text-sm text-zinc-900 dark:text-white">
            <!--<span class="mr-1">HERZ</span> / <span class="mx-1">ANZAHL</span> &middot;-->
            @if($review->user_id == auth()->user()?->id)
                <button onclick="confirm('Möchtest du deine Bewertung wirklich löschen?') || event.stopImmediatePropagation()"
                        wire:click="deleteReview({{ $review->id }})"
                        class="font-semibold">
                    {{ __('Delete') }}
                </button>
            @endif
        </div>
    </div>
</div>
