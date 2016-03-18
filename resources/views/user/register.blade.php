@extends('master.master')
@section('content')
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="small-12 columns">
            <h1>Create Account</h1>
        </div>
    </div>
    <form method="post">
        <div class="row" style="margin-top: 3rem;">
            <div class="small-2 columns small-offset-2 text-right">
                <label>Username</label>
            </div>
            <div class="small-4 columns" style="float: left">
                <input type="text" name="username" id="username">
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns small-offset-2 text-right">
                <label>Email</label>
            </div>
            <div class="small-4 columns" style="float: left">
                <input type="email" name="email" id="email">
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns small-offset-2 text-right">
                <label>Password</label>
            </div>
            <div class="small-4 columns" style="float: left">
                <input type="password" name="password" id="password">
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns small-offset-2 text-right">
                <label>Confirm Password</label>
            </div>
            <div class="small-4 columns" style="float: left">
                <input type="password" name="con_password" id="con_password">
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns small-offset-4">
                <button type="submit" class="button success">Create Account</button>
            </div>
            <div class="small-2 columns" style="float: left">
                <a href="/login" class="button">Login</a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-5 small-offset-2 columns">
                    <h3>Sign in using other services</h3>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem;">
                <div class="small-2 columns small-offset-2">
                    <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
                </div>
                <div class="small-2 columns">
                    <a href="#"><img src="https://g.twimg.com/dev/sites/default/files/images_documentation/sign-in-with-twitter-gray.png"></a>
                </div>
                <div class="small-2 columns">

                </div>
                <div class="small-2 columns">

                </div>
            </div>
        </div>
    </div>
@stop