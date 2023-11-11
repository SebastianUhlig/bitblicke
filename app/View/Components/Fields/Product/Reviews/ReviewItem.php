<?php

namespace App\View\Components\Fields\Product\Reviews;

use App\Models\ProductReview;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReviewItem extends Component
{
    public ProductReview $review;

    /**
     * Create a new component instance.
     */
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.product.reviews.review-item');
    }
}
