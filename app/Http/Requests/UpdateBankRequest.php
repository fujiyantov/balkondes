<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankRequest extends FormRequest
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
            'bank' => [
                'required',
                'string',
                'min:3'
            ],
            'account_holder' => [
                'required',
                'string',
                'min:3'
            ],
            'account_number' => [
                'required',
                'numeric'
            ],
            'image' => [
                'required',
                'image',
                'max:10240'
            ],
        ];
    }
}
