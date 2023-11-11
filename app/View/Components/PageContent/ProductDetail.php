<?php

namespace App\View\Components\PageContent;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductDetail extends Component
{
    public ?Product $product;
    /**
     * Create a new component instance.
     */
    public function __construct(?int $product_id)
    {
        $this->product = Product::online()->where('id', $product_id)->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product = $this->product;
        return view('components.page-content.product-detail', compact('product'));
    }
}
