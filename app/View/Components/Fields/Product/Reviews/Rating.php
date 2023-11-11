<?php

namespace App\View\Components\Fields\Product\Reviews;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Rating extends Component
{
    public int $rating;
    public bool $changeable;

    /**
     * Create a new component instance.
     */
    public function __construct($rating = 0, $changeable = true)
    {
        $this->rating = $rating;
        $this->changeable = $changeable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.product.reviews.rating');
    }
}
