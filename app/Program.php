<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'categories_id', 'title', 'slug', 'image', 'brief_explanation', 'donation_target', 'time_is_up', 'donation_collected', 'description', 'is_selected'
    ];

    protected $hidden = [];


    public function donation_confirmation()
    {
        return $this->hasMany(DonationConfirmation::class, 'programs_id', 'id');
    }

    public function developments()
    {
        return $this->hasMany(Development::class, 'programs_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function getFoto()
    {
        return asset('images/program-images/' . $this->image);
    }
}
