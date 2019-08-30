<?php

namespace Speakout\Http\Controllers;

use Illuminate\Http\Request;
use Speakout\Modules\Account\Api\v1\Repositories\UserRepository;


use Speakout\Modules\Account\Api\v1\Requests\LoginRequest;
 

class UserController extends Controller
{
    //
    public function __construct (UserRepository $userRepository) 
    {
        $this->users = $userRepository;
    }

    public function index()
    {
        return $this->users->getSlug('Welcome home to my house. and you_ know-with\ this kind*special&characters he +has#home');
    }

    public function createAccount(Request $request)
    {
        //return $_POST;
        $user = $this->users->createAccount($request,true);
        return json_encode(auth()->user());
    }

    public function login(LoginRequest $request)
    {
        $login  = $this->users->login($request,true);
        if($login){
            return redirect('dashboard');
        }
        return redirect("login")->with('warning', 'Invalid email or password');
    }
}