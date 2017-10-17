<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateAddRequest extends FormRequest
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
            'txtCateName' => 'required|unique:sk_category,name',
        ];
    }
    public function messages()
    {
        return [
            'txtCateName.required' => 'Vui lòng nhập danh mục',
            'txtCateName.unique'   => 'Danh mục đã tồn tại'
        ];
    }
}
