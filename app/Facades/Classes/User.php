<?php
/**
 * Created by PhpStorm.
 * User: beach
 * Date: 2/1/2016
 * Time: 10:46 PM
 */

namespace App\Facades\Classes;

use Session;
use App\Users;

class User
{
    private static $session_id = 'user_id';

    public static function signUserIn($user_id)
    {
        return Session::put(self::$session_id, $user_id);
    }
    public static function signOut()
    {
        return Session::forget(self::$session_id);
    }
    public static function userExist()
    {
        if (Users::find(Session::get(self::$session_id))) {
            return true;
        } else {
            Session::forget(self::$session_id);
            return false;
        }
    }
    public static function isSignedIn()
    {
        if (Session::has(self::$session_id)) {
            if (self::userExist()) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function isAdmin()
    {
        $user = Users::find(session()->get(self::$session_id));
        if ($user && $user->admin == 1) {
            return true;
        }
        return false;
    }

    public static function Get()
    {
        return Users::find(Session::get(self::$session_id));
    }
}