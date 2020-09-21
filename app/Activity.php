<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'activity_tags_id', 'title', 'slug', 'description', 'time'
    ];

    protected $hidden = [];

    public function activity_gallery()
    {
        return $this->hasMany(ActivityGallery::class, 'activities_id', 'id');
    }


    public function activity_tag()
    {
        return $this->belongsTo(ActivityTag::class, 'activity_tags_id', 'id');
    }
}
