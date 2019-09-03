<?php

namespace Speakout\Modules\Complaint\Api\v1\Requests;

use Dingo\Api\Http\FormRequest;

class CreateComplaintRequest extends FormRequest
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
            'complaintType'     => 'required|string',
            'noc'               => 'required|string',
            'complaintDetails'  => 'required|string',
            'complaintFile'     => 'required|string',

        ];
    }

}