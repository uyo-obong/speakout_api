<?php

namespace Speakout\Modules\Account\Api\v1\Requests;

use Dingo\Api\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'userEmail'     => 'required|email|unique:users',
            'phone_no'      =>'numeric',
            'password'      => 'required|min:6',
            'fullName'      => 'required|string',
            'address'       => 'required|string',
            'contactNo'     => 'required',
            'state'         => 'required|string',
            'country'       => 'required|string',
            'pincode'       => 'required|string',
            
        ];
    }

    public function messages()
    {
        return [
            'userEmail.email'    => 'Provide a valid work email address',
            'userEmail.required' => 'Email is required',
            'userEmail.unique'   =>'Account already exists for the email provided, Login to add another company instead.',
            'password.required'  => 'Password is required to create your account',
            'fullName.required'  => 'Full Name is required',
            'address.numeric'    =>'Address is required'
        ];
    }
}