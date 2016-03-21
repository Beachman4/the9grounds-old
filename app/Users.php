<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Hash;
use User;

class Users extends Model
{

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public static function generateConToken()
    {
        $token = str_random(32);
        if (self::checkConToken($token)) {
            return $token;
        } else {
            self::generateConToken();
        }
    }

    public static function checkConToken($token)
    {
        if (self::where('confirm_token', $token)->count() > 0) {
            return false;
        }
        return true;
    }


    public static function login(Request $request)
    {
        if ($user = self::where('username', $request->input('username_email'))->orWhere('email', $request->input('username_email'))->first()) {
            if (Hash::check($request->input('password'), $user->password)) {
                User::signUserIn($user->id);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function register(Request $request)
    {
        $user = new self;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $token = self::generateConToken();
        $user->confirm_token = $token;
        if ($user->save()) {
            return $user;
        }
        return false;
    }
}
