<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentsGroups extends Model
{
    protected $table = 'tournaments_groups';

    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }

    public function matches()
    {
        return $this->hasMany('App\TournamentsGroupsMatches');
    }
}
