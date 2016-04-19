<?php

namespace App\Repository;

use App\Repository\Repository;
use App\Games;

class GameRepository extends Repository
{

    /**
     * GameRepository constructor.
     */
    public function __construct(Games $model)
    {
        $this->model = $model;
    }

    /*
     * Call custom Eloquent queries below
     */

}


