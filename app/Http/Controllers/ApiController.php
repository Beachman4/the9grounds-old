<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use App\Website;
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
        $response = $this->user->apiLogin($request);
        if (!is_bool($response)) {
            echo json_encode($array['message'] = $response);
        }
    }

    public function register(Request $request)
    {
        $response = $this->user->apiRegister($request);
        if (!is_bool($response)) {
            echo json_encode($array['message'] = $response);
        }
    }

    public function checkLogin()
    {
        if (\User::isSignedIn()) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function checkDomain(Request $request)
    {
        $domain = $request->input('domain')['value'];
        if (Website::where('domain', $domain)->count() > 0) {
            echo 'taken';
        }
    }

    public function website(Request $request)
    {
        $name = $request->input('name')['value'];
        $domain = $request->input('domain')['value'];
        if (Website::where('domain', $domain)->count() > 0) {
            echo "The requested domain is unavailable.";
        } else {
            $website = new Website();
            $website->name = $name;
            $website->domain = $domain . ".the9grounds.io";
            $website->owner = \User::Get()->id;
            $website->save();
        }
    }
}
