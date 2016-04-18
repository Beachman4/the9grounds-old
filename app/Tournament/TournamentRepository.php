<?php

namespace App\Repository;

use App\Repository\Repository;
use App\Tournament;

class TournamentRepository extends Repository
{

    /**
     * TournamentRepository constructor.
     */
    public function __construct(Tournament $model)
    {
        $this->model = $model;
    }

    /*
     * Call custom Eloquent queries below
     */
}


