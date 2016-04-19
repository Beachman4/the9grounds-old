<?php

namespace App\Http\Controllers;

use App\TournamentsGroups;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tournament;
use App\TournamentsBrackets;
use App\TournamentsPart;
use Carbon\Carbon;
use App\TournamentsGroupsMatches;

class TournamentController extends Controller
{
    /*
     * Base Tournament Model
     * App\Tournament;
     */
    private $model_base;
    /*
     * Tournament Brackets Model
     * App\TournamentsBrackets
     */
    private $model_brackets;
    /*
     * Tournament Participants Model
     * App\TournamentsPart
     */
    private $model_part;


    /**
     * TournamentController constructor.
     * @param Tournament $tournament
     * @param TournamentsBrackets $tournamentsBrackets
     * @param TournamentsPart $tournamentsPart
     */
    public function __construct(Tournament $tournament, TournamentsBrackets $tournamentsBrackets, TournamentsPart $tournamentsPart)
    {
        $this->model_base = $tournament;
        $this->model_brackets = $tournamentsBrackets;
        $this->model_part = $tournamentsPart;

        $this->middleware('App\Http\Middleware\UserMiddleware', ['except' => [
            'index',
            'show',
            'test'
        ]]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tournaments = $this->model_base->where('complete', 0)->get();
        return view('tournament.index', [
            'tournaments'   =>  $tournaments
        ]);
    }

    /**
     * @param $id
     */
    public function show($id)
    {

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $games = \App\Games::where('disabled', '!=', 1)->get();
        return view('tournament.create', [
            'games' =>  $games
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $date = Carbon::parse($request->input('date'));
        dd($date);
    }

    /**
     * @param $id
     */
    public function edit($id)
    {

    }

    /**
     * @param $id
     * @param Request $request
     */
    public function update($id, Request $request)
    {

    }

    /**
     * Testing new Brackets System
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function test()
    {
        return view('tournament.test');
    }

    /**
     *
     */
    public function adminIndex()
    {

    }
}
