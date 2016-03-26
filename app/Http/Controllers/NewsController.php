<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Session;

class NewsController extends Controller
{
    public function create()
    {
        return view('news.create');
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' =>  'required',
            'body'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (News::createNews($request)) {
            Session::flash('notification', 'News Created');
            return redirect()->route('index');
        }

        Session::flash('notification', 'Something went wrong');
        return redirect()->back()->withInput();
    }
}
