<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationOfObject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'programs_id',  'donor_name', 'phone', 'object', 'support'
    ];

    protected $hidden = [];


    public function program()
    {
        return $this->belongsTo(Program::class, 'programs_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
