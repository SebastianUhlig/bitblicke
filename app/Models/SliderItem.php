<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_slider_items');
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'image', 'id');
    }
}
