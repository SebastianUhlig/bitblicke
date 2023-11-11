@if(auth()->user())
    @if($this->canReviewed)
        <form wire:submit.prevent="addReview" class="mt-6 mb-6">
            <x:fields.product.reviews.rating :rating="$this->rating" error="rating"></x:fields.product.reviews.rating>

            <x:html-tags.textarea
                wire:model.defer="text"
                label="{{ __('Write your review') }}"
                id="_text"
                name="text"
                error="text"
                rows="4"
                placeholder="{{ __('Type in your comment...') }}"
            >{{ old('text') }}</x:html-tags.textarea>
            <div class="mt-4 max-w-sm">
                <x:html-tags.button variant="button-primary-medium" type="submit">{{ __('Send') }}</x:html-tags.button>
            </div>
        </form>
    @endif
@else
    <x:html-tags.alert class="text-center justify-center mt-6 mb-6" type="neutral" title="{{ __('It seems that you aren\'t logged in yet.') }}">
        <div class="text-center">
            {{ __('Click on the button below to login or register, so that you can review this product.') }}
            <x:html-tags.button variant="button-primary-medium" class="mx-auto mt-2 max-w-sm" link="{{ config('filament.home_url') }}">{{ __('Log in / Register') }}</x:html-tags.button>
        </div>
    </x:html-tags.alert>
@endif
