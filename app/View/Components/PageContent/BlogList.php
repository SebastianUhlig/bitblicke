<?php

namespace App\View\Components\PageContent;

use App\Models\BlogPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogList extends Component
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
        $blog_posts = BlogPost::query()->isPublic()->orderByDesc('published_at')->get();
        return view('components.page-content.blog-list', compact('title', 'blog_posts'));
    }
}
