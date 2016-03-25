<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Jobs\SendTestEmail;
use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Mail;

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

        /*Mail::raw('Testing123', function ($message) {
            $message->from('yoda@the9grounds.com');
            $message->to('beachman19@gmail.com');
            $message->subject('Testing');
        });*/
        if (session()->has('user_id')) {
            $user = Users::find(session()->get('user_id'));
            //$this->dispatch(new SendTestEmail($user));
            $time = Carbon::now()->addWeek()->timestamp - Carbon::now()->timestamp;
            $job = (new SendTestEmail($user))->delay($time);
            $this->dispatch($job);
        }

        return view('index');
    }

    public function getAbout()
    {
        return view('about');
    }
}
