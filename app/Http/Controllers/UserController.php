<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;

class UserController extends Controller
{

    public function getLogin()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_username'    =>  'required',
            'password'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }
        if (Users::login($request)) {
            return redirect()->route('index');
        }

        Session::flash('notification', 'Something went wrong');
        return redirect()->back()->withInput();


    }

    public function getRegister()
    {
        return view('user.register');
    }

    public function testRegisterEmail()
    {
        return view('email.registered');
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' =>  'required|email|unique:users,email',
            'username'  =>  'required|unique:users,username',
            'password'  =>  'required|same:confirm_password',
            'confirm_password'  =>  'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        if ($user = Users::register($request)) {
            Mail::send('emails.registered', ['user' => $user], function($m) use ($user) {
                $m->from('the9grounds@gmail.com');

                $m->to($user->email)->subject('Confirm your account');
            });
            return view('user.registered');
        }

        Session::flash('notification', 'Something went wrong');
        return redirect()->back()->withInput();
    }
}
