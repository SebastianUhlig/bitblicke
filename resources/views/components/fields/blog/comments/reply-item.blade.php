<div class="flex flex-row w-full py-4">
    <div class="mr-4">
        <div class="h-12 w-12 bg-zinc-200 dark:bg-zinc-900 rounded-full"></div>
    </div>
    <div>
        <div class="flex text-sm text-zinc-900 dark:text-white">
            <a href="#" class="font-semibold mr-1">{{ $reply->user->name }}</a> &middot; {{ $reply->created_at->diffForHumans() }}
        </div>

        <div class="mt-1 max-w-[40rem] text-zinc-500 dark:text-zinc-400 leading-relaxed">
            {!! nl2br($reply->comment) !!}
        </div>

        @if($reply->user_id == auth()->user()?->id)
            <div class="mt-3 flex text-sm text-zinc-900 dark:text-white">
                <!--<span class="mr-1">HERZ</span> / <span class="mx-1">ANZAHL</span> &middot;-->
                <button onclick="confirm('Möchtest du deine Antwort wirklich löschen?') || event.stopImmediatePropagation()"
                        wire:click="deleteReplyComment({{ $reply->id }}, {{ $reply->blog_post_comment_id }})"
                        class="ml-1 font-semibold">
                    {{ __('Delete') }}
                </button>
            </div>
        @endif
    </div>
</div>
