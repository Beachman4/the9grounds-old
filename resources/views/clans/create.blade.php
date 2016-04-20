@extends('master.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/TextboxList.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/TextboxList.Autocomplete.css') }}">
    <script src="{{ asset('assets/js/jquery.browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/GrowingInput.js') }}"></script>
    <script src="{{ asset('assets/js/SuggestInput.js') }}"></script>
    <script src="{{ asset('assets/js/TextboxList.js') }}"></script>
    <script src="{{ asset('assets/js/TextboxList.Autocomplete.js') }}"></script>
    <form method="post" action="/clans">
        <div class="row">
            <div class="small-6 columns">
                <label>Clan Name</label>

                <input type="text" name="name">
            </div>
            <div class="small-6 columns">
                <label>Members</label>
                <small>To delete a user from the list, use the arrow keys and press delete.</small>
                <div class="members_input">
                    <input type="text" name="members" value="" id="members_input">
                </div>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
    <script>
        var t = new $.TextboxList('#members_input', {unique: true, plugins: {autocomplete: {
            minLength: 3,
            queryRemote: true,
            remote: {url: '/clans/getUsers'}
        }}});

    </script>
@stop