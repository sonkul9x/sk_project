<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAddRequest extends FormRequest
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
            'txtTitle'=> 'required|unique:sk_news,title',
            'txtIntro' => 'required',
            'txtFull' => 'required',
          //  'newsImg' => 'required|image|mimes:png,jpg,jpeg,bmp',
            'meta_description' => 'required',
            'meta_keywords' => 'required'

        ];
    }    
}
