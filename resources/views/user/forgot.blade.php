@extends('master.master')
@section('content')
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="small-12 columns">
            <h1>Forgot Password</h1>
        </div>
    </div>
    <form method="post">
        <div class="row" style="margin-top: 3rem;">
            <div class="small-4 small-offset-4 columns">
                <div class="row">
                    <div class="small-12 columns">
                        <label>Email Address
                            <input type="email" name="email" id="email" placeholder="Email Address">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-6 small-centered columns">
                        <button class="button success" type="submit">Forgot Password!</button>
                    </div>
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
@stop