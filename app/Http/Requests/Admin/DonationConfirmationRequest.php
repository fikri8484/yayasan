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
            'users_id' => 'required|integer|exists:users,id',
            'shelter_accounts_id' => 'required|integer|exists:shelter_accounts,id',
            'donor_name' => 'required|max:255',
            'email' => 'required|max:255',
            'nominal_donation' => 'required|integer',
            'support' => 'required'
        ];
    }
}
