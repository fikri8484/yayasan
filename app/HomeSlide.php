<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlide extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image', 'title', 'description'
    ];

    protected $hidden = [];
}
