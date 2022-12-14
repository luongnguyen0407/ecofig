<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
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
            'email' => 'email',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Invalid Email',
            'password.required' => 'Password is required',
        ];
    }
}
