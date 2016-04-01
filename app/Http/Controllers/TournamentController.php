<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tournament;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::where('complete', 0)->get();
        return view('tournament.index', [
            'tournaments'   =>  $tournaments
        ]);
    }

    public function view($id)
    {

    }

    public function create()
    {
        return view('tournament.create');
    }

    public function test()
    {
        return view('tournament.test');
    }

    public function adminIndex()
    {

    }
}
