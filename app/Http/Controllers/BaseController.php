<?php

namespace App\Http\Controllers;

use App\News;
use Carbon\Carbon;
use App\Jobs\SendTestEmail;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use User;
use DB;
use App\Games;

class BaseController extends Controller
{
    public function index()
    {
        if ($_SERVER['REMOTE_ADDR'] != '67.216.96.44') {
            DB::table('botcatcher')->insert([
                'ip'    =>  $_SERVER['REMOTE_ADDR'],
                'log'   =>  'BOTTTTTTT',
            ]);
        }
        $user = User::Get();

        $games = Games::where('disabled', '!=', '1')->get();

        $news = News::where('hidden', 0)->paginate(3);
        return view('index', [
            'news'  =>  $news,
            'user'  =>  $user,
            'games' =>  $games
        ]);
    }

    public function getAbout()
    {
        return view('about');
    }
}
