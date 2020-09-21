<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'gallery_categories_id', 'image', 'title'
    ];

    protected $hidden = [];

    public function gallery_category()
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_categories_id', 'id');
    }
}
