<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationConfirmation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'programs_id', 'users_id', 'shelter_accounts_id', 'id_transaction', 'donor_name', 'email', 'nominal_donation', 'support', 'proof_payment'
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

    public function ShelterAccount()
    {
        return $this->belongsTo(ShelterAccount::class, 'shelter_accounts_id', 'id');
    }

    public function getFoto()
    {
        return asset('images/bukti_pembayaran/' . $this->bukti_pembayaran);
    }
}
