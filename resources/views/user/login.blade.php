@extends('master.master')
@section('content')
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="col-lg-12 columns">
            <h1>Login</h1>
        </div>
    </div>
    <form method="post">
        <div class="row" style="margin-top: 3rem;">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="username_email">Username Or Email</label>
                            <input type="text" class="form-control" name="username_email" id="username_email" placeholder="Username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 columns">
                        <a href="/forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-success" value="Login">Login</button>
                    </div>
                    <div class="col-lg-6">
                        <a class="btn btn-default" href="/register">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
    <script type="text/javascript">
        $(function() {
            $('#username_email').focus();
        });
    </script>
@stop