<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DonationOfObjectRequest extends FormRequest
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
            'donor_name' => 'required|string',
            'object' => 'required|string',
            'phone' => 'required'
        ];
    }
}

// 'users_id' => 'required|integer|exists:users,id',
