<x:layouts.app-minimal title="{{ $meta_title }}" description="{{ $meta_description }}">
    <div class="my-12 px-12">
        @if(!empty($cart_items))
            <form action="{{ route('frontend.shop.checkout.store') }}" method="POST">
                @method('POST')
                @csrf

                <div class="mx-auto justify-center lg:flex lg:space-x-6 px-0">
                    <div class="rounded-2xl lg:w-2/3">
                        <div class="grid space-y-6 mb-16">
                            @foreach($cart_items as $key => $cart_item)
                                <div
                                    class="justify-between rounded-2xl bg-white border dark:border-zinc-800 dark:bg-zinc-900 p-6 shadow-2xl md:flex md:justify-start">
                                    @if(!empty($cart_item['product']->public_images))
                                        <img src="{{ url($cart_item['product']->public_images[0]->url) }}"
                                             alt="{{ $cart_item['product']->public_images[0]->alt }}"
                                             class="w-full rounded-2xl md:w-40"/>
                                    @endif
                                    <div class="md:ml-4 md:flex md:w-full md:justify-between">
                                        <div class="mt-5 md:mt-0">
                                            <x:html-tags.h6>{{ str($cart_item['product']['name'])->limit(30) }}</x:html-tags.h6>
                                        </div>

                                        <div class="mt-4 flex justify-between md:space-y-6 md:mt-0 md:block">
                                            <div class="flex justify-end items-center border-zinc-100">
                                                <input
                                                    class="h-8 w-24 rounded-xl text-zinc-800 dark:text-zinc-200 border border-zinc-100 dark:border-zinc-800 bg-white dark:bg-zinc-900 text-center text-xs outline-none"
                                                    disabled type="number" value="{{ $cart_item['amount'] }}"/>
                                            </div>
                                            <div class="flex justify-end items-center space-x-4">
                                                <p class="text-sm">{{ $cart_item['product']->formatted_brutto_price }} €</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="grid space-y-6">
                            @if(!auth()->user())
                                <x:html-tags.alert class="text-center justify-center" type="neutral"
                                                   title="{{ __('It seems that you aren\'t logged in yet.') }}">
                                    <div class="text-center">
                                        {{ __('Click on the button below to login or register, so that you can continue your order.') }}
                                        <x:html-tags.button variant="button-primary-medium"
                                                            class="mx-auto mt-2 max-w-sm"
                                                            link="{{ config('filament.home_url') }}">{{ __('Log in / Register') }}</x:html-tags.button>
                                    </div>
                                </x:html-tags.alert>

                                <x:fields.checkout.account-data></x:fields.checkout.account-data>
                            @endif

                            <x:fields.checkout.personal-data></x:fields.checkout.personal-data>
                            <x:fields.checkout.invoice-data></x:fields.checkout.invoice-data>
                        </div>
                    </div>

                    <!-- Sub total -->
                    <div
                        class="top-24 sticky mt-6 h-full rounded-2xl border dark:border-zinc-800 bg-white dark:bg-zinc-900 p-6 shadow-2xl lg:mt-0 lg:w-1/3">
                        <div class="mb-2 flex justify-between">
                            <p class="text-zinc-700 dark:text-zinc-300">{{ __('Subtotal') }}</p>
                            <p class="text-zinc-700 dark:text-zinc-300">{{ number_format($total_netto_price, 2, ',', '.') }}
                                €</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-zinc-700 dark:text-zinc-300">{{ __('VAT') }}</p>
                            <p class="text-zinc-700 dark:text-zinc-300">{{ number_format($total_tax_price, 2, ',', '.') }}
                                €</p>
                        </div>
                        <hr class="my-4 border dark:border-zinc-800"/>
                        <div class="flex justify-between">
                            <p class="text-lg font-bold">{{ __('Total') }}</p>
                            <div class="">
                                <p class="mb-1 text-lg font-bold">{{ number_format($total_brutto_price, 2, ',', '.') }}
                                    €</p>
                                <p class="text-sm text-zinc-700 dark:text-zinc-300">{{ __('including VAT') }}</p>
                            </div>
                        </div>

                        <x:html-tags.button
                            link="{{ route('frontend.page') }}"
                            variant="button-white-medium"
                            class="mt-6 sm:mt-4 w-full">
                            {{ __('Back to Home') }}
                        </x:html-tags.button>

                        <x:html-tags.button
                            link="{{ route('frontend.shop.cart') }}"
                            variant="button-white-medium"
                            class="mt-6 sm:mt-4 w-full">
                            {{ __('Back to Cart') }}
                        </x:html-tags.button>

                        <x:html-tags.button
                            type="submit"
                            variant="button-primary-medium"
                            class="mt-6 sm:mt-4 w-full">
                            {{ __('Buy') }}
                        </x:html-tags.button>
                    </div>
                </div>
            </form>
        @else
            <x:html-tags.alert type="danger" title="{{ __('No products') }}">
                {{ __('There are no products in the shopping cart.') }}
            </x:html-tags.alert>
        @endif
    </div>
</x:layouts.app-minimal>
