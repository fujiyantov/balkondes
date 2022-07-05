<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVillageHistoryRequest extends FormRequest
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
            ],
            'name' => [
                'required',
                'string',
                'min:3'
            ],
            'description' => [
                'string'
            ],
            'image' => [
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
            'video_etc' => [
                'string',
            ],
        ];
    }
}
