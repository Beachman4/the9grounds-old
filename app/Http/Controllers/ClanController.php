<?php

namespace App\Http\Controllers;

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

    private $model_members;

    /**
     * ClanController constructor.
     * @param Clan $clan
     * @param ClanMember $clanMember
     * @param ClanWar $clanWar
     */
    public function __construct(Clan $clan, ClanMember $clanMember, ClanWar $clanWar)
    {
        $this->model_base = $clan;
        $this->model_war = $clanWar;
        $this->model_members = $clanMember;
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

    }

    public function store()
    {

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
}
