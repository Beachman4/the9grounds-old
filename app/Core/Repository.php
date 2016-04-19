<?php
/**
 * Created by PhpStorm.
 * User: Aylon
 * Date: 4/15/2016
 * Time: 3:32 PM
 */

namespace App\Repository;

use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Repository implements RepositoryInterface
{
    use ValidatesRequests;

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
            return $this->model->create($request->all());
        }
        return $this->find($id)->update($request->all());
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findBy($field, $value)
    {
        return $this->where($field, $value)->first();
    }

    public function multiWhere($data = array())
    {
        $model = $this->model();
        foreach ($data as $field=>$value) {
            $model->where($field, $value);
        }
        return $model->get();
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function validateModel($request)
    {
        \Log::emergency('testing');
        $this->validate($request, $this->model->rules);
    }
}