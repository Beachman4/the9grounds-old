<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class BaseController extends Controller
{
    public function index()
    {
        if ($_SERVER['REMOTE_ADDR'] != '67.216.96.44' || $_SERVER['REMOTE_ADDR'] != '::1') {
            DB::table('botcatcher')->insert([
                'ip'    =>  $_SERVER['REMOTE_ADDR'],
                'log'   =>  'BOTTTTTTT',
            ]);
        }

        return view('index');
    }

    public function getAbout()
    {
        return view('about');
    }
}
