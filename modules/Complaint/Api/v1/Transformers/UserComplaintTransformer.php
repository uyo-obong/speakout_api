<?php

namespace Speakout\Modules\Complaint\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Speakout\Modules\Account\Models\User;

class UserComplaintTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {

        return [
            'id'         => $user->id,
            'fullName'   => $user->fullName,
            'userEmail'  => $user->userEmail,
            'address'    => $user->address,
            'state'      => $user->state,
            'country'    => $user->country,
            'pincode'    => $user->pincode,
            'userImage'  => $user->userImage,
            'complaint'  => $user->complaints,
            'regDate'    => formatDate($user->regDate),
        ];
    }
}