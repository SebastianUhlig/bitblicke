<?php

namespace App\View\Components\Fields\Product\List;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RatingTotal extends Component
{
    public Product $product;
    public int $average_rating = 0;

    public function __construct(Product $product)
    {
        $this->product = $product;
        $this->average_rating = $this->product->reviews->map(function($product_review) {
            return $product_review->rating;
        })->sum();

        $this->average_rating = $this->average_rating > 0 ? round($this->average_rating / $this->product->reviews->count()) : $this->average_rating;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.product.list.rating-total');
    }
}
