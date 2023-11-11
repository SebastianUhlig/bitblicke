<?php

namespace App\View\Components\PageContent;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductList extends Component
{
    public ?string $title;
    /**
     * Create a new component instance.
     */
    public function __construct(?string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        return view('components.page-content.product-list', compact('title'));
    }
}
