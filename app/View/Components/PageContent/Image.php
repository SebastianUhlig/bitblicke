<?php

namespace App\View\Components\PageContent;

use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Image extends Component
{
    public Media $image;

    /**
     * Create a new component instance.
     */
    public function __construct(int $image_id)
    {
        $this->image = Media::find($image_id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $image = $this->image;
        return view('components.page-content.image', compact('image'));
    }
}
