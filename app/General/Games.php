<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Games extends Model
{
    protected $table = 'games';

    public static function addGame(Request $request)
    {
        $game = new self;
        $game->name = $request->input('name');
        if (!is_null($request->input('disabled'))) {
            $game->disabled = 1;
        } else {
            $game->disabled = 0;
        }

        $file = $request->file('picture');
        $name = explode(' ', $request->input('name'));
        $file->move($_SERVER['DOCUMENT_ROOT'] . '/assets/img/games/', $name[0]);
        $game->picture = $name[0];


        if ($game->save()) {
            return true;
        }
        return false;
    }
}
