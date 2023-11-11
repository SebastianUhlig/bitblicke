<?php

namespace App\View\Components\PageContent;

use Awcodes\Curator\Curator;
use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ParagraphWithImage extends Component
{
    public string $text;
    public Media $image;
    public array $classes;
    /**
     * Create a new component instance.
     */
    public function __construct(string $text, int $image_id, string $image_position)
    {
        $text = str_replace('<ul>', '<ul class="grid grid-cols-1 space-y-1 list-inside list-disc">', $text);
        $text = str_replace('<ol>', '<ol class="grid grid-cols-1 space-y-1 list-inside list-decimal">', $text);
        $this->text = $text;
        $this->image = Media::find($image_id);
        $this->classes = match ($image_position) {
            'text_left_img_right' => [
                'text_class' => 'order-1 pb-6 md:pb-0 md:pr-6',
                'image_class' => 'order-2 text-right w-full md:w-auto justify-self-end',
            ],
            'img_left_text_right' => [
                'text_class' => 'order-2 pt-6 md:pt-0 md:pl-6',
                'image_class' => 'order-1 text-left w-full md:w-auto justify-self-start',
            ],
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $text = $this->text;
        $image = $this->image;
        $classes = $this->classes;
        return view('components.page-content.paragraph-with-image', compact('text', 'image', 'classes'));
    }
}
