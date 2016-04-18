@extends('master.master')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/TextboxList.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/TextboxList.Autocomplete.css') }}">
    <script src="{{ URL::asset('assets/js/jquery.browser.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/GrowingInput.js') }}"></script>
    <script src="{{ URL::asset('assets/js/SuggestInput.js') }}"></script>
    <script src="{{ URL::asset('assets/js/TextboxList.js') }}"></script>
    <script src="{{ URL::asset('assets/js/TextboxList.Autocomplete.js') }}"></script>
    <form method="post" action="/clans">
        <div class="row">
            <div class="small-12 columns">
                <label>Clan Name
                    <input type="text" name="name">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="small-6 columns">
                <label>Members</label>
                <small>To delete a user from the list, use the arrow keys and press delete.</small>
                <div class="members_input">
                    <input type="text" name="members" value="" id="members_input">
                </div>
            </div>
        </div>
    </form>
    <script>
        var t = new $.TextboxList('#members_input', {unique: true, plugins: {autocomplete: {
            minLength: 3,
            queryRemote: true,
            remote: {url: '/clans/getUsers'}
        }}});

    </script>
@stop