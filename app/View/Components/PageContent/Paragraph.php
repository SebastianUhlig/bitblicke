<?php

namespace App\View\Components\PageContent;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Paragraph extends Component
{
    public string $text;
    /**
     * Create a new component instance.
     */
    public function __construct(string $text)
    {
        $text = str_replace('<ul>', '<ul class="grid grid-cols-1 space-y-1 list-inside list-disc">', $text);
        $text = str_replace('<ol>', '<ol class="grid grid-cols-1 space-y-1 list-inside list-decimal">', $text);
        $text = str_replace('<pre>', '<pre><code>', $text);
        $text = str_replace('</pre>', '</code></pre>', $text);

        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $text = $this->text;
        return view('components.page-content.paragraph', compact('text'));
    }
}
