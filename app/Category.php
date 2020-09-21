<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_name'
    ];

    protected $hidden = [];


    public function programs()
    {
        return $this->hasMany(Program::class, 'categories_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'category_name';
    }
}
