<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaser extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function getLinkAttribute()
    {
        if(!empty($this->url)) {
            return $this->url;
        }

        if(!empty($this->page_id) && $this->page) {
            return route('frontend.page', ['slug' => $this->page->slug]);
        }

        return null;
    }

    public function getAppearanceHtmlAttribute(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|null
    {
        $result = null;
        $teaser = $this;

        switch($this->appearance) {
            case 'icon':
                $result = view('contents.partials.teaser-with-icon', compact('teaser'));
                break;

            case 'image':
                $result = view('contents.partials.teaser-with-image', compact('teaser'));
                break;

            case 'text':
                $result = view('contents.partials.teaser-only-text', compact('teaser'));
                break;
        }

        return $result;
    }

    public function getPublicImageAttribute()
    {
        if(empty($this->image)) {
            return null;
        }

        return Media::find($this->image);
    }
}
