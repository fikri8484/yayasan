<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Development extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'programs_id', 'title', 'description', 'time'
    ];

    protected $hidden = [];


    public function program()
    {
        return $this->belongsTo(Program::class, 'programs_id', 'id');
    }
}
