<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShelterAccount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'bank', 'account_number', 'on_name'
    ];

    protected $hidden = [];

    public function donation_confirmation()
    {
        return $this->hasMany(DonationConfirmation::class, 'shelter_accounts_id', 'id');
    }
}
