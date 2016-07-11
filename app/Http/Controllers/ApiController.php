<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    private $user;

    /**
     * ApiController constructor.
     * @param $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    public function login(Request $request)
    {
        $this->user->apiLogin($request);
    }

    public function register(Request $request)
    {
        $this->user->apiRegister($request);
    }

    public function checkLogin()
    {
        if (\User::isSignedIn()) {
            echo "true";
        } else {
            echo "false";
        }
    }
}
