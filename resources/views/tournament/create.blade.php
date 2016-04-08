@extends('master.master')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/foundation-datepicker.min.css') }}"/>
    <script src="{{ URL::asset('assets/js/foundation-datepicker.min.js') }}"></script>
    <form method="POST" action="/tournaments">
        <div class="row" style="margin-top: 2rem;">
            <div class="large-2 large-offset-1 columns">
                <p>*Name</p>
            </div>
            <div class="large-6 columns" style="float: left">
                <input type="text" name="name" id="name">
            </div>
        </div>
        <div class="row">
            <div class="large-2 large-offset-1 columns">
                <p>*Url</p>
            </div>
            <div class="large-6 columns" style="float: left">
                <div class="input-group">
                    <span class="input-group-label">the9grounds.com/tournaments/</span>
                    <input type="text" class="input-group-field" name="slug" id="slug">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="large-2 large-offset-1 columns">
                <p>*Date</p>
            </div>
            <div class="large-6 columns" style="float: left">
                <input type="text" id="date" name="date">
            </div>
        </div>
        <div class="row">
            <div class="large-2 large-offset-1 columns">
                <p>*Type</p>
            </div>
            <div class="large-4 columns" style="float: left">
                <select name="type">
                    <option>Select an option</option>
                    <option value="1">Single Elimination</option>
                    <option value="2">Double Elimination</option>
                    <option value="3">Group Play then Single Elimination(Maximum of 32 players)</option>
                    <option value="4">Group Play then Double Elimination(Maximum of 32 players)</option>
                    <option value="5">Round-Robin</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="large-2 large-offset-1 columns">
                <p>*Join Type</p>
            </div>
            <div class="large-4 columns" style="float: left">
                <select name="join_type">
                    <option>Select an option</option>
                    <option value="1">Free Join</option>
                    <option value="2">Invite Only</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="large-2 large-offset-1 columns">
                <button type="submit" class="button success">Create Tournament</button>
            </div>
        </div>
        {{ csrf_field() }}
    </form>

    <script>
        $(function() {
            $('#date').fdatepicker({
                format: 'yyyy-mm-dd hh:ii',
                pickTime: true
            });
        })
    </script>
@stop