<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShelterAccount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'bank', 'account_number'
    ];

    protected $hidden = [];

    public function donation_confirmations()
    {
        return $this->hasMany(DonationConfirmation::class, 'donation_confirmations_id', 'id');
    }
}
