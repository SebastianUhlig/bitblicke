<div>
    @if($title)
        <x:html-tags.h3>{{ $title }}</x:html-tags.h3>
    @endif

    @if($type === 'contact')
        <livewire:forms.contact-form :sender="$sender" :recipient="$recipient"></livewire:forms.contact-form>
    @elseif($type === 'request')
        <livewire:forms.request-form :sender="$sender" :recipient="$recipient"></livewire:forms.request-form>
    @endif
</div>
