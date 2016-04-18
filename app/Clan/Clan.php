<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clan extends Model
{
    protected $table = 'clans';

    public function members()
    {
        return $this->hasMany('App\ClanMember');
    }
}
