<?php

namespace Speakout\Modules\Account\Api\v1\Repositories;

use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
use Speakout\Modules\Account\Api\v1\Transformers\UserTransformer;
use Speakout\Modules\Account\Models\Profile;
use Speakout\Modules\Account\Models\User;
use Speakout\Modules\BaseRepository;


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


    public function updateUser(array $data)
    {

        $data = (object)$data;


//        $userImage = auth()->user()->userImage;
//        $oldName = explode("/", $userImage);
//
//        //delete old profile image if exist
//        if(!empty($data->userImage)){
//            $checkOld =  Storage::disk('public')->exists($oldName[1]);
//            if ($checkOld)
//                Storage::disk('public')->delete($oldName[1]);
//        }

        $user = $this->users->where('id', auth()->user()->id)->update([

            'fullName'      => ucwords($data->fullName),
            'userEmail'     => strtolower($data->userEmail),
            'address'       => $data->address,
            'contactNo'     => $data->contactNo,
            'userImage'     => $data->userImage,
            'password'      => Hash::make($data->password),
            'updationDate'  => currentTime(),

        ]);

        if ($user == true)
            return auth()->user();

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
            'status'        => 1


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

        // Grab details from the request

        $credentials = $data->only('userEmail', 'password');
        
        try {
            //Attemt to verify the credentials and create a token for the user
            $token = auth()->attempt($credentials);

            if (!$token) {
                return response()->json(['status' => 'error', 'message' => 'Incorrect email or password'], 401);
            }
        } catch (JWTexception $e) {
            return response()->json(['status' => 'error', 'message' => 'You cannot login at this time'], 500);
        }


        $user = User::where('userEmail', $data->userEmail)->first();

        if (!$user)
            return response()->json(['status' => 'error', 'message' => 'You are not an admin user'], 401);


        $details = fractal($user, new UserTransformer())->serializeWith(new \Spatie\Fractalistic\ArraySerializer());
        //All good so return the token
        return response()->json(['status' => 'success', 'data' => $details, 'token' => $token]);
    }



    public function logout()
    { }



}
