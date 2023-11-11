<?php

namespace App\View\Components\Fields\Blog\Comments;

use App\Models\BlogPostComment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentItem extends Component
{
    public BlogPostComment $comment;

    /**
     * Create a new component instance.
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.blog.comments.comment-item');
    }
}
