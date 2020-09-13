<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'gallery_categories_id', 'id');
    }
}
