<?php

namespace App\Repository;

use App\Repository\Repository;
use App\Users;

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


}


