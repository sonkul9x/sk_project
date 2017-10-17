<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'txtusername' =>'required|unique:sk_users,username',
            'txtFullname' =>'required',
            'txtEmail' =>'required|email',
            'txtPhone' =>'required',
            'txtPass' =>'required',
            'txtRePass' => 'required|same:txtPass',
            'selGroup' => 'required'
        ];
    }
}
