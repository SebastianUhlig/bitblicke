<?php

namespace App\View\Components\PageContent;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{

    public string|null $title;
    public string $type;
    public array $sender;
    public array $recipient;
    /**
     * Create a new component instance.
     */
    public function __construct(string|null $title, string $type, string|null $sender, string|null $recipient)
    {
        $this->title = $title;
        $this->type = $type;

        $this->sender = empty($sender) ? config('mail.from') : [$sender];
        $this->recipient = empty($recipient) ? config('mail.to') : [$recipient];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $type = $this->type;
        $sender = $this->sender;
        $recipient = $this->recipient;

        return view('components.page-content.form', compact('title', 'type', 'sender', 'recipient'));
    }
}
