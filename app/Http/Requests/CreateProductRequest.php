<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'village_id' => [
                'required',
                'numeric',
                'min:0'
            ],
            'name' => [
                'required',
                'string',
                'min:3'
            ],
            'price' => [
                'required',
                'numeric',
                'min:1000'
            ],
            'category' => [
                'numeric',
                'min:0'
            ],
            'image' => [
                'required',
                'image',
                'max:10240 '
            ],
            'address' => [
                'string',
            ],
            'description' => [
                'string',
            ],
            'addtional_information' => [
                'string',
            ],
            'seller_name' => [
                'string',
            ],
            'is_published' => [

            ],
        ];
    }
}
