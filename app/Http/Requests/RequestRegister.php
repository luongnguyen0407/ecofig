<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            //
            'email' => 'email|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.unique' => 'Email is exist',
            'email.email' => 'Invalid Email',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password and confirm password not match',
        ];
    }
}
