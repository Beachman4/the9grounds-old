<?php

namespace App\Http\Controllers;

use App\Games;
use Illuminate\Http\Request;

use App\Http\Requests;
use Admin;
use Validator;
use App\Repository\GameRepository;

class GamesController extends Controller
{
    private $games;

    /**
     * GamesController constructor.
     * @param $games
     */
    public function __construct(GameRepository $games)
    {
        $this->games = $games;
    }


    public function index()
    {
        if ($search = request()->input('search')) {
            $games = Games::where('name', 'LIKE', '%'.$search.'%')->paginate(10);
        } else {
            $games = Games::paginate(10);
        }

        Admin::button('Add Game', '/admin/games/create');
        Admin::title('Games');

        return view('games.admin.index', [
            'games' =>  $games
        ]);
    }
    public function create()
    {

        Admin::title('Add Game');

        return view('games.admin.create', [
            'update'    =>  false
        ]);
    }
    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'name'  =>  'required'
            //'picture'   =>  'required'
        ]);*/

        /*if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }*/
        $this->games->validateModel($request);
        $file = $request->file('picture');
        $allowed_array = array('image/png', 'image/jpeg', 'image/bmp');
        if (in_array($file->getClientMimeType(), $allowed_array)) {
            if (Games::addGame($request)) {
                session()->flash('notification', $request->input('name') . 'Game Added');
                return redirect('/admin/games');
            }
            session()->flash('notification', 'Something went wrong');
            return redirect()->back()->withInput();
        }
        session()->flash('notification', 'Wrong File Type...Allowed Types: PNG/BMP/JPG');
        return redirect()->back()->withInput();
    }
    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
