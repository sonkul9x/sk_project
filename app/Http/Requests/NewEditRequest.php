<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewEditRequest extends FormRequest
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
            'sltCate' => 'required',
            'txtTitle'=> 'required',
            'txtIntro' => 'required',
            'txtFull' => 'required',
            // 'newsImg' => 'image|mimes:png,jpg,jpeg,bmp',

        ];
    }
}
