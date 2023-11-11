<?php

namespace App\View\Components\HtmlTags;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class H5 extends Component
{
    public string|null $title;

    public function __construct($title = null)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        return view('components.html-tags.h5', compact('title'));
    }
}
