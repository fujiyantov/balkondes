<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVillageRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3'
            ],
            'description' => [
                'string'
            ],
            'image' => [
                'required',
                'image',
                'max:10240'
            ],
            'video_id' => [
                'required',
                'string',
            ],
            'video_vr' => [
                'string',
            ],
            'lat' => [
                'required',
                'numeric'
            ],
            'long' => [
                'required',
                'numeric'
            ],
            'is_published' => [

            ],
        ];
    }
}
