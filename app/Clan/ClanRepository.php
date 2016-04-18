<?php

namespace App\Repository;

use App\ClanMember;
use App\ClanWar;
use App\Repository\Repository;
use App\Clan;

class ClanRepository extends Repository
{

    public $clanwar;

    /**
     * ClanRepository constructor.
     */
    public function __construct(Clan $model, ClanWar $clanWar)
    {
        $this->model = $model;
        $this->clanwar = $clanWar;
    }

    /*
     * Call custom Eloquent queries below
     */
}


