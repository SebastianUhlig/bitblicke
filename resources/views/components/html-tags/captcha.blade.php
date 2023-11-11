@props([
    'wire_model' => null,
])

<div class="mt-8 flex flex-row space-x-6 items-center">
    <img src="{!! captcha_src() !!}" alt="Captcha" class="rounded-xl"/>

    <x:html-tags.input
        wire:model="$wire_model"
        :label="__('frontend.type_in_captcha')"
        id="_captcha"
        name="captcha"
        :placeholder="__('frontend.type_in_captcha')"
        error="captcha"
        class="w-52"
    ></x:html-tags.input>
</div>
