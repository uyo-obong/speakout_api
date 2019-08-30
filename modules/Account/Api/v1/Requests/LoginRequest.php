<?php

namespace Speakout\Modules\Account\Api\v1\Requests;

use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'userEmail'      => 'required',
            'password'   => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'userEmail.required' => 'Email is required',
            'password.required'  => 'Password is required',
        ];
    }
}