<?php

namespace Speakout\Modules\Account\Api\v1\Repositories;

use DB;
use Hash;
use Speakout\Modules\Account\Api\v1\Transformers\UserTransformer;
use Speakout\Modules\Account\Models\Profile;
use Speakout\Modules\Account\Models\User;
use Speakout\Modules\BaseRepository;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserRepository extends BaseRepository
{

    /**
     * @var User
     */
    protected $users;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->users = $user;
    }


    /**
     * @param $data
     * @param null $session
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function createAccount($data, $session = null)
    {
        $user = User::create([
            'fullName'      => ucwords($data->fullName),
            'userEmail'     => strtolower($data->userEmail),
            'address'       => $data->address,
            'contactNo'     => $data->contactNo,
            'state'         => $data->state,
            'country'       => $data->country,
            'pincode'       => $data->pincode,
            'userImage'     => $data->userImage,
            'password'      => Hash::make($data->password),
            'regDate'       => currentTime(),
            'updationDate'  => currentTime(),


        ]);

        if (!$user) {
            DB::rollback();
            return false;
        }
        DB::commit();

        if ($session) {
            return $this->login($data, true);
        } else {
            return $this->login($data);
        }
    }


    /**
     * @param $data
     * @param null $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function login($data, $session = null)
    {

        $credentials = collect($data)->only(['userEmail', 'password']);

        if ($token = auth()->attempt($credentials->toArray())) {

            $user = auth()->user();

            $user = fractal($user, new UserTransformer())->serializeWith(new \Spatie\Fractalistic\ArraySerializer());
           

            return response()->json(["status" => "success", "user" => $user, "token" => $token]);
        }
    }



    public function logout()
    { }
}
