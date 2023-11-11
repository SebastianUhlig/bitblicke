@if(auth()->user())
    <form wire:submit.prevent="replyComment({{ $comment->id }})" class="mb-6">
        <x:html-tags.textarea
            wire:model.defer="replyComment"
            label="{{ __('Reply on') }} {{ $comment->user->name }}"
            id="_replyComment"
            name="replyComment"
            error="replyComment"
            rows="2"
            placeholder="{{ __('Type in your comment...') }}"
        >{{ old('replyComment') }}</x:html-tags.textarea>
        <div class="mt-4 max-w-sm">
            <x:html-tags.button variant="button-primary-medium" type="submit">{{ __('Reply') }}</x:html-tags.button>
        </div>
    </form>
@else
    <x:html-tags.alert class="text-center justify-center" type="neutral" title="{{ __('It seems that you aren\'t logged in yet.') }}">
        <div class="text-center">
            {{ __('Click on the button below to login or register, so that you can reply on this comment.') }}
            <x:html-tags.button variant="button-primary-medium" class="mx-auto mt-2 max-w-sm" link="{{ config('filament.home_url') }}">{{ __('Log in / Register') }}</x:html-tags.button>
        </div>
    </x:html-tags.alert>
@endif
