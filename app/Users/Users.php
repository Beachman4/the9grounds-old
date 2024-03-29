<?php

namespace App;

use App\Http\Requests\UserCreateRequest;
use App\PasswordReset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Hash;
use User;
use Laravel\Cashier\Billable;

class Users extends Model
{

    use Billable;

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

    protected $rules = [
        'email' =>  'required|email|unique:users,email',
        'username'  =>  'required|unique:users,username',
        'password'  =>  'required|same:confirm_password|min:6',
        'confirm_password'  =>  'required|min:6',
    ];

    public function resets()
    {
        return $this->hasOne('App\PasswordReset');
    }

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

    public static function generateForToken()
    {
        $token = str_random(32);
        if (self::checkForToken($token)) {
            return $token;
        } else {
            self::generateForToken();
        }
    }

    public static function checkForToken($token)
    {
        if (PasswordReset::where('token', $token)->count() > 0) {
            return false;
        }
        return true;
    }


    public static function login(Request $request)
    {
        if ($user = self::where('username', $request->input('username_email'))->orWhere('email', $request->input('username_email'))->first()) {
            if (Hash::check($request->input('password'), $user->password)) {
                User::signUserIn($user->id);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function androidLogin(Request $request)
    {
        if ($user = self::where('username', $request->input('username_email'))->orWhere('email', $request->input('username_email'))->first()) {
            if (Hash::check($request->input('password'), $user->password)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function register(UserCreateRequest $request)
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

    public static function forgotPass(Request $request)
    {
        if ($user = self::where('email', $request->input('email'))->first()) {
            $forgot = new PasswordReset();
            $token = self::generateForToken();
            $forgot->user_id = $user->id;
            $forgot->token = $token;
            $forgot->save();
            return $token;
        }
        return false;
    }
}
