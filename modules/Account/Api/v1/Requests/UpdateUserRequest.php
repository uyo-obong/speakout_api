<?php

namespace Speakout\Modules\Account\Api\v1\Requests;

use Dingo\Api\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'userEmail'     => 'email',
            'password'      => 'min:6',
            'fullName'      => 'string',
            'address'       => 'string',
            'contactNo'     => 'numeric',

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
            'contactNo.numeric'    =>'Contact No must be numeric values'
        ];
    }
}