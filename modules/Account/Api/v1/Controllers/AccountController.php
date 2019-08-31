<?php

namespace Speakout\Modules\Account\Api\v1\Controllers;

use Dingo\Api\Contract\Http\Request;
use Speakout\Modules\Account\Api\v1\Transformers\UserTransformer;
use Speakout\Modules\Account\Api\v1\Repositories\UserRepository;
use Speakout\Modules\Account\Api\v1\Requests\SignupRequest;
use Speakout\Modules\Account\Api\v1\Requests\LoginRequest;
use Speakout\Modules\BaseController as Controller;
use JWTAuth;


class AccountController extends Controller
{


    /**
     * @var UserRepository
     */
    protected $users;


    /**
     * @var UserTransformer
     */
    protected $userTransformer;


    /**
     * AccountController constructor.
     * @param UserRepository $users
     * @param UserTransformer $userTransformer
     */
    public function __construct(
        UserRepository $users,
        UserTransformer $userTransformer
    ) {
        $this->users = $users;
        $this->userTransformer = $userTransformer;
    }



    /**
     * Creates a new User account
     * @param SignupRequest $request
     * @return bool|\Jiggle\Modules\Account\Models\User
     */
    public function signup(SignupRequest $request)
    {

        return $this->users->createAccount($request);
    }


    /**
     * Logs in a user
     * @param LoginRequest $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        return $this->users->login($request);
    }


    /**
     * Handles logging out of a user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {

        auth()->logout();
        auth()->logout(true);

        return $this->success(["message" => "Successfully logged out"]);
    }
}
