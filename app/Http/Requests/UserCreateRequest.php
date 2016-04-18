<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'email' =>  'required|email|unique:users,email',
            'username'  =>  'required|unique:users,username',
            'password'  =>  'required|same:confirm_password|min:6',
            'confirm_password'  =>  'required|min:6',
        ];
    }
}
