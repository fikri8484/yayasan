<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationConfirmation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'programs_id', 'users_id', 'shelter_accounts_id', 'id_transaction', 'donor_name', 'email', 'nominal_input', 'nominal_donation', 'support', 'proof_payment', 'donation_status'
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

    public function shelter_account()
    {
        return $this->belongsTo(ShelterAccount::class, 'shelter_accounts_id', 'id');
    }

    public function getFoto()
    {
        return asset('images/proof_payment/' . $this->proof_payment);
    }
}
