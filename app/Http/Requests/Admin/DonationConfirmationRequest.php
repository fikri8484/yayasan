<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DonationConfirmationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'programs_id' => 'required|integer|exists:programs,id',
            'shelter_accounts_id' => 'required|integer|exists:shelter_accounts,id',
            'nominal_donation' => 'required|integer',
            'donation_status' => 'required|string|in:SUKSES,BELUM_TRANSFER,BELUM_KONFIRM,SUDAH_KONFIRM,DITOLAK',
            'proof_payment' => 'required|image'
        ];
    }
}

// 'users_id' => 'required|integer|exists:users,id',
