@extends('master.master')
@section('content')
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="small-12 columns">
            <h1>Confirm your account</h1>
        </div>
    </div>
    <div class="row">
        <div class="large-6 large-offset-3 columns" style="margin-top: 4rem;">
            <h5>Would you like us to resend a confirmation email?</h5>
        </div>
    </div>
    <div class="row">
        <div class="large-4 large-offset-5 columns">
            <a href="/resend-confirmation" class="button success">Resend Confirm Email</a>
        </div>
    </div>
@stop