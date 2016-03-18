@extends('master.master')
@section('content')
    <div class="row" style="margin-top: 2rem;">
        <div class="large-2 large-offset-1 columns">
            <p>*Name</p>
        </div>
        <div class="large-4 columns" style="float: left">
            <input type="text" name="name" id="name">
        </div>
    </div>
    <div class="row">
        <div class="large-2 large-offset-1 columns">
            <p>*Url</p>
        </div>
        <div class="large-4 columns" style="float: left">
            <div class="input-group">
                <span class="input-group-label">the9grounds.com/tournaments/</span>
                <input type="text" class="input-group-field" name="slug" id="slug">
            </div>
        </div>
    </div>
@stop