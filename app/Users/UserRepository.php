<?php

namespace App\Repository;

use App\Events\UserWasCreated;
use App\Repository\Repository;
use App\Users;
use User;
use Hash;

class UserRepository extends Repository
{

    /**
     * UserRepository constructor.
     */
    public function __construct(Users $model)
    {
        $this->model = $model;
    }

    /*
     * Call custom Eloquent queries below
     */

    public function createOrUpdate($id = null, $request)
    {
        return $this->model->register($request);
    }
    
    public function paginateSearch($amt, $searchValue)
    {
        return $this->model->where('username', 'LIKE', '%'.$searchValue.'%')->orWhere('email', 'LIKE', '%'.$searchValue.'%')->paginate($amt);
    }

    public function search($value)
    {
        return $this->model->where('username', 'LIKE', '%'.$value.'%')->orWhere('email', 'LIKE', '%'.$value.'%')->get();
    }

    public function findResetBy($field, $value)
    {
        return $this->model->resets()->where($field, $value)->first();
    }

    public function apiLogin($request)
    {
        $username_email = $request->input('username_email')['value'];
        $password = $request->input('password')['value'];
        if ($user = $this->model->where('username', $username_email)->orWhere('email', $username_email)->first()) {
            if (Hash::check($password, $user->password)) {
                User::signUserIn($user->id);
                return true;
            } else {
                return "Your Username/Password is incorrect.";
            }
        } else {
            return "Your Username/Password is incorrect.";
        }
    }

    public function apiRegister($request)
    {
        $username = $request->input('username')['value'];
        $user = new $this->model;
        $user->username = $username;
        $email = $request->input('email')['value'];
        if ($this->model->where('email', $email)->count() > 0) {
            return 'Email has been taken.';
        } else {
            $user->email = $email;
        }
        $password = $request->input('password')['value'];
        $user->password = Hash::make($password);
        $token = $this->model->generateConToken();
        $user->confirm_token = $token;
        if ($user->save()) {
            event(new UserWasCreated($user));
            User::signUserIn($user->id);
            return true;
        }
        return "Something went wrong";
    }


}


