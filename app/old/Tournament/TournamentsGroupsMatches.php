<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentsGroupsMatches extends Model
{
    protected $table  = 'tournament_groups_matches';

    public function group()
    {
        return $this->belongsTo('App\TournamentsGroups');
    }
}
