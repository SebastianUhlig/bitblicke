<?php

namespace App\Models;

use App\Traits\ComponentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Laravel\Scout\Searchable;

class Page extends Model
{
    use Searchable;
    use HasFactory;
    use ComponentTrait;

    protected $guarded = ['id'];

    protected $casts = [
        'content' => 'array'
    ];

    public function teasers()
    {
        return $this->hasMany(Teaser::class);
    }

    public function views()
    {
        return $this->hasMany(PageView::class);
    }

    public function childPages()
    {
        return $this->hasMany(__CLASS__, 'parent_page_id');
    }

    public function parentPage()
    {
        return $this->belongsTo(__CLASS__, 'parent_page_id');
    }

    public function pageSliderItems()
    {
        return $this->belongsToMany(SliderItem::class, 'page_slider_items')->withPivot('order');
    }

    public function publicPageSliderItems()
    {
        return $this->belongsToMany(SliderItem::class, 'page_slider_items')->where('online', true)->withPivot('order');
    }

    public function getLinkAttribute()
    {
        if (!empty($this->parentPage)) {
            return route('frontend.page', ['parentSlug' => $this->parentPage->slug, 'childSlug' => $this->slug]);
        }
        return route('frontend.page', $this->slug);
    }

    public function getFullSlugAttribute()
    {
        if (!empty($this->parentPage)) {
            return $this->parentPage->slug . '/' .$this->slug;
        }
        return $this->slug;
    }

    public function scopeOnline($query)
    {
        return $query->where('online', true);
    }

    public function scopeHeaderNav($query)
    {
        return $query->where('header_nav_active', true);
    }

    public function scopeFooterNav($query)
    {
        return $query->where('footer_nav_active', true);
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'slug' => $this->slug,
            'h1' => $this->h1,
            'subtitle' => $this->subtitle,
        ];
    }
}
