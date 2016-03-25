@extends('master.master')
@section('content')
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="small-12 columns">
            <h1>Login</h1>
        </div>
    </div>
    <form method="post">
        <div class="row" style="margin-top: 3rem;">
            <div class="large-4 large-offset-4 columns">
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
                        <button type="submit" class="button success" value="Login">Login</button>
                    </div>
                    <div class="small-6 columns">
                        <a class="button" href="/register">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
@stop