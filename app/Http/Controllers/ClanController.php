<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clan;
use App\ClanWar;
use App\ClanMember;


class ClanController extends Controller
{

    private $model_base;

    private $model_war;

    private $users;

    /**
     * ClanController constructor.
     * @param Clan $clan
     * @param ClanMember $clanMember
     * @param ClanWar $clanWar
     */
    public function __construct(Clan $clan, UserRepository $users, ClanWar $clanWar)
    {
        $this->model_base = $clan;
        $this->model_war = $clanWar;
        $this->users = $users;
        $this->middleware('App\Http\Middleware\UserMiddleware', ['except' =>
            'index',
            'view',
            'adminIndex'
        ]);
    }


    public function index()
    {
        return view('clans.index');
    }

    public function create()
    {
        return view('clans.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function view()
    {

    }

    public function destroy()
    {

    }

    public function adminIndex()
    {

    }

    public function getUsers()
    {
        $response = array();
        $search = request()->input('search');
        $users = $this->users->search($search);
        foreach ($users as $user)
        {
            if (!preg_match("/^$search/i", $user->username)) continue;
            $response[] = array($user->id, $user->username, null, '<img src="https://placehold.it/30x30"> ' . $user->username);
        }

        header('Content-type: application/json');
        echo json_encode($response);
    }
}
