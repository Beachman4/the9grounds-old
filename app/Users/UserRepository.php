<?php

namespace App\Repository;

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
        if ($user = $this->model->where('username', $request->input('username_email'))->orWhere('email', $request->input('username_email'))->first()) {
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

    public function apiRegister($request)
    {
        $user = new $this->model;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $token = $this->model->generateConToken();
        $user->confirm_token = $token;
        if ($user->save()) {
            return $user;
        }
        return false;
    }


}


