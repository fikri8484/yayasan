<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'activities_id', 'image'
    ];

    protected $hidden = [];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activities_id', 'id');
    }
}
