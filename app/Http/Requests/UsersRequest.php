<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersRequest extends Request
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
            'phone' => 'required|unique:posts',
            'password' => 'required|min:6|confirmed'
        ];
    }
    public function messages()
    {
        return[
            'phone.requred' => 'A phone number will be min 12',
            'password.required' => 'Please enter a password min 6'
        ];
    }
}
