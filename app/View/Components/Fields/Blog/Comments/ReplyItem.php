<?php

namespace App\View\Components\Fields\Blog\Comments;

use App\Models\BlogPostComment;
use App\Models\BlogPostReply;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReplyItem extends Component
{
    public BlogPostReply $reply;

    /**
     * Create a new component instance.
     */
    public function __construct($reply)
    {
        $this->reply = $reply;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.blog.comments.reply-item');
    }
}
