<?php

namespace App\View\Components\PageContent;

use App\Models\BlogPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedBlogPost extends Component
{
    public int|null $blog_post_id;
    /**
     * Create a new component instance.
     */
    public function __construct($blog_post_id)
    {
        $this->blog_post_id = $blog_post_id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $blog_post_id = $this->blog_post_id;

        if (empty($blog_post_id)) {
            $blog_post = BlogPost::query()->isPublic()->latest('published_at')->first();
        } else {
            $blog_post = BlogPost::query()->isPublic()->where('id', $blog_post_id)->first();
        }

        return view('components.page-content.featured-blog-post', compact('blog_post'));
    }
}
