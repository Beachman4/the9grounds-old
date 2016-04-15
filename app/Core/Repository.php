<?php
/**
 * Created by PhpStorm.
 * User: Aylon
 * Date: 4/15/2016
 * Time: 3:32 PM
 */

namespace App\Repository;

use Illuminate\Http\Request;


abstract class Repository implements \RepositoryInterface
{
    public $model;

    public function all($hidden = false)
    {
        if ($hidden) {
            return $this->model->where('hidden', '!=', '1')->get();
        }
        return $this->model->get();
    }

    public function paginate($amt, $hidden = false)
    {
        if ($amt == 0) {
            $amt = 5;
        }
        if ($hidden) {
            return $this->model->where('hidden', '!=', '1')->paginate($amt);
        }
        return $this->model->paginate($amt);
    }

    public function createOrUpdate($id = null, $request)
    {
        if (is_null($id)) {

        }
    }

    public function find($id)
    {

    }

    public function findBy($field, $value)
    {

    }

    public function multiWhere($data = array())
    {

    }

    public function delete($id)
    {

    }
}