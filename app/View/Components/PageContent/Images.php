<?php

namespace App\View\Components\PageContent;

use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Images extends Component
{
    public ?string $title;
    public array $images;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $title, int|array $image_ids)
    {
        $this->title = $title;

        $images = [];

        if (is_array($image_ids)) {
            foreach($image_ids as $image_id) {
                $image = Media::find($image_id);
                $images[] = $image;
            }
        } else {
            $image = Media::find($image_ids);
            $images[] = $image;
        }

        $this->images = $images;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $title = $this->title;
        $chunked_images = array_chunk($this->images, 3);
        return view('components.page-content.images', compact('title', 'chunked_images'));
    }
}
