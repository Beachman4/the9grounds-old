@extends('master.master')
@section('content')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{ asset('assets/js/pwstrength.js') }}"></script>
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="small-12 columns">
            <h1>Create Account</h1>
        </div>
    </div>
    <form method="post">
        <div class="row" style="margin-top: 3rem;">
            <div class="small-2 columns large-offset-2 text-right">
                <label>Username</label>
            </div>
            <div class="small-10 large-4 columns" style="float: left">
                <input type="text" name="username" id="username">
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns large-offset-2 text-right">
                <label>Email</label>
            </div>
            <div class="small-10 large-4 columns" style="float: left">
                <input type="email" name="email" id="email">
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns large-offset-2 text-right">
                <label>Password</label>
            </div>
            <div class="small-10 large-4 columns" style="float: left">
                <input type="password" name="password" id="password">
                <div id="messages"></div>
            </div>
        </div>
        <div class="row">
            <div class="small-2 columns large-offset-2 text-right">
                <label>Confirm Password</label>
            </div>
            <div class="small-10 large-4 columns" style="float: left">
                <input type="password" name="confirm_password" id="confirm_password">
            </div>
        </div>
        <div class="row" style="margin-bottom: 1rem;">
            <div class="small-2 small-offset-2 large-offset-4 columns">
                <div class="g-recaptcha" data-sitekey="6LdKXBcTAAAAANxLkVZQb51c4ylW8SJNUrhlEI_I"></div>
            </div>
        </div>
        <div class="row">
            <div class="small-6 large-2 columns small-offset-2 large-offset-4">
                <button type="submit" class="button success">Create Account</button>
            </div>
            <div class="small-4 large-2 columns" style="float: left">
                <a href="/login" class="button">Login</a>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
    {{--<div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-12 large-5 large-offset-2 columns other_services">
                    <h3>Sign in using other services</h3>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem;">
                <div class="small-3 large-2 columns large-offset-2 text-center">
                    <p>Facebook</p>
                    <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
                </div>
                <div class="small-3 large-2 columns text-center">
                    <p>Twitter</p>
                    <a href="#"><img src="https://g.twimg.com/dev/sites/default/files/images_documentation/sign-in-with-twitter-gray.png"></a>
                </div>
                <div class="small-3 large-2 columns text-center">
                    <p>Battle.net</p>
                    <a href="#"><img src="http://bnetcmsus-a.akamaihd.net/cms/blog_header/AHC770UXWJ7Z1376505580138.jpg"></a>
                </div>
                <div class="small-3 large-2 columns text-center" style="float: left;">
                    <p>Steam</p>
                    <a href="#"><img src="http://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_large_border.png"></a>
                </div>
            </div>
        </div>
    </div>--}}
    <script>
        $(function() {
            $('#username').focus();
            var options = {
                onLoad: function() {
                    //$('#messages').text('Start Typing a password');
                },
                onKeyUp: function (evt) {
                    $(evt.target).pwstrength("outputErrorList");
                }
            };
            $('#password').pwstrength(options);
        });
    </script>
@stop