@extends('master.master')
@section('content')
    <form method="post">
        <div class="row">
            <div class="small-4 small-offset-4 columns login_form">
                <div class="row">
                    <div class="small-12 columns">
                        <label>Username
                            <input type="text" name="username_email" id="username_email" placeholder="Username">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        <label>Password
                            <input type="password" name="password" id="password" placeholder="Password">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <a href="/forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 columns">
                        <button type="submit" class="button success">Login</button>
                    </div>
                    <div class="small-4 columns" style="float: left">
                        <a class="button" href="/register">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop