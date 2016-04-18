<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function all($hidden = false);

    public function paginate($amt, $hidden = false);

    public function createOrUpdate($id = null, $request);

    public function find($id);

    public function findBy($field, $value);

    public function multiWhere($data = array());

    public function delete($id);
}