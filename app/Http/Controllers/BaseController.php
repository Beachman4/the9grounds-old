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
        $user = User::Get();

        $news = News::where('hidden', 0)->paginate(3);
        return view('index', [
            'news'  =>  $news,
            'user'  =>  $user
        ]);
    }

    public function getAbout()
    {
        return view('about');
    }
}
