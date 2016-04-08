<?php

namespace App\Http\Controllers;

use App\PasswordReset;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use User;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;
use Session;
use Admin;

class UserController extends Controller
{


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\UserMiddleware', ['only' =>  [
            'logout',
            'myprofile'
        ]]);
    }

    public function getLogin()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_email'    =>  'required',
            'password'  =>  'required'
        ]);


        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }
        if ($user = Users::login($request)) {
            if ($user->confirmed == 1) {
                return redirect()->route('index');
            } else {
                return view('user.notconfirmed');
            }
        }

        Session::flash('notification', 'Invalid Username/Password');
        return redirect()->back()->withInput();


    }
    public function postAndroidLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_email'    =>  'required',
            'password'  =>  'required'
        ]);

        if ($validator->fails()) {
            $message = 'Please complete all fields';
            die(json_encode($message));
        }
        if ($user = Users::androidLogin($request)) {
            if ($user->confirmed == 1) {
                $message = 'Login Successful';
                die(json_encode($message));
            } else {
                $message = 'You have not confirmed your account';
                die(json_encode($message));
            }
        }

        $message = 'Invalid Username/Password';
        die(json_encode($message));


    }

    public function getConfirmAccount($token)
    {

        if ($user = Users::where('confirm_token', $token)->first()) {
            $user->confirmed = 1;
            $user->save();
            return view('user.confirmed');
        }
        return redirect()->route('index');
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
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        if ($_SERVER['REMOTE_ADDR'] != '::1') {
            /*$json = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdKXBcTAAAAAJwfDO1mSJqMBQg4NtszZepJA5UC&response=" . $request->input('g-recaptcha-response') . "&remoteip=". $_SERVER['REMOTE_ADDR']), true);*/
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=6LdKXBcTAAAAAJwfDO1mSJqMBQg4NtszZepJA5UC&response=" . $request->input('g-recaptcha-response') . "&remoteip=". $_SERVER['REMOTE_ADDR'];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
            $curlData = curl_exec($curl);
            curl_close($curl);
            if (!$curlData) {
                session()->flash('notification', 'Please Complete the Captcha');
                return redirect()->route('register');
            }
        }

        if ($user = Users::register($request)) {
            Mail::queue('email.registered', ['user' => $user], function($m) use ($user) {
                $m->from('yoda@the9grounds.com', 'The Nine Grounds');

                $m->to($user->email)->subject('Confirm your account');
            });
            //return view('user.registered');
            return redirect()->route('index');
        }

        Session::flash('notification', 'Something went wrong');
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        if (User::signOut()) {
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }

    public function getForgot()
    {
        return view('user.forgot');
    }

    public function postForgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($token = Users::forgotPass($request)) {
            $user = Users::where('email', $request->input('email'))->first();
            Mail::queue('email.forgot', ['user'  =>  $user, 'token'  =>  $token], function($m) use($user) {
                $m->from('yoda@the9grounds.com', 'The Nine Grounds');
                $m->subject('Forgot Password');
                $m->to($user->email);
            });
            return view('user.doneforgot');
        }
        return view('user.doneforgot');

    }

    // TODO: Change password GET and POST
    public function tokenForgot($token)
    {
        try {
            $token = PasswordReset::where('token', $token)->first();
        } catch (ModelNotFoundException $e) {
            //TODO THROW SOME STUFF YO
        }

        if ($user = Users::find($token->user_id)) {
            $timetocheck = Carbon::now()->timestamp;
            $time = strtotime($token->created_at);
            $against = Carbon::createFromTimestamp($time)->addMinutes(15)->timestamp;
            if ($timetocheck >= $against) {
                session()->flash('notification', 'Please resubmit token request');
                return redirect('/forgot');
            }
            return view('user.changepassforgot');
        }
    }

    public function postTokenForgot($token, Request $request)
    {

    }

    public function resendConfirmation()
    {
        $user = User::Get();

        Mail::queue('email.registered', ['user' => $user], function($m) use ($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds');

            $m->to($user->email)->subject('Confirm your account');
        });

        return redirect()->route('index');

    }

    public function myprofile()
    {
        return view('user.profile');
    }

    public function adminIndex()
    {
        Admin::title('Users');
        Admin::button('Add User', '/webadmin/user/add');
        if (request()->input('search')) {
            $users = Users::where('username', 'LIKE', '%'.request()->input('search').'%')->orWhere('email', 'LIKE', '%'.request()->input('search').'%')->paginate(10);
        } else {
            $users = Users::paginate(15);
        }
        return view('user.admin.index', [
            'users' =>  $users
        ]);
    }

    public function testing()
    {

       /* $token = 'tok_17uWQvHNkmMm0m3SNPEqWY7E';
        $user = Users::find(1);*/
        #$user->newSubscription('main', 'premiumClan')->create();
        #$invoices = $user->invoices();
        #$invoice = $invoices[count($invoices) - 1];
        #dd($invoice);
        /*Mail::queue('email.receipt', ['user'  =>  $user, 'vendor'  =>  'The Nine Grounds', 'product'   =>  'Premium Clan'], function($m) use($user) {
            $m->from('yoda@the9grounds.com', 'The Nine Grounds');
            $m->subject('Order Receipt');
            $m->to($user->email);
        });*/
        //$user->charge(2000);
        return view('test');
    }
    public function postTest(Request $request)
    {

    }
}
