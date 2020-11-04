<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityTag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tag', 'slug'
    ];

    protected $hidden = [];

    public function activities()
    {
        return $this->hasMany(Activity::class, 'activity_tags_id', 'id');
    }
}
