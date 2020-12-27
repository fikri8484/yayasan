<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Body extends Model
{

    protected $fillable = [
        'title', 'description', 'fb', 'whatsapp', 'address', 'email', 'image1', 'image2', 'image3', 'users_id'
    ];

    protected $hidden = [];
}
