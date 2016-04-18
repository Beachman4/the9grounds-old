<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $table = 'tournament';

    public function participants()
    {
        return $this->hasMany('App\TournamentsPart');
    }

    public function brackets()
    {
        return $this->hasMany('App\TournamentsBrackets');
    }
}
