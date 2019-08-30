<?php

namespace Speakout\Modules\Account\Api\v1\Transformers;

use Speakout\Modules\Account\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
            'regDate'    => formatDate($user->regDate),
        ];
    }
}