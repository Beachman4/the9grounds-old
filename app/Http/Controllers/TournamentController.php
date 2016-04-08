<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tournament;
use Carbon\Carbon;

class TournamentController extends Controller
{


    /**
     * TournamentController constructor.
     */
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\UserMiddleware', ['except' => [
            'index',
            'show',
            'test'
        ]]);
    }

    public function index()
    {
        $tournaments = Tournament::where('complete', 0)->get();
        return view('tournament.index', [
            'tournaments'   =>  $tournaments
        ]);
    }

    public function show($id)
    {

    }

    public function create()
    {
        return view('tournament.create');
    }

    public function store(Request $request)
    {
        $date = Carbon::parse($request->input('date'));
        dd($date);
    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function test()
    {
        return view('tournament.test');
    }

    public function adminIndex()
    {

    }
}
