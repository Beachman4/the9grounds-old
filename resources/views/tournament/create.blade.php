@extends('master.master')
@section('content')
    <style>
        .input-group-label-for-small {
            display: none;
        }
        @media screen and (max-width: 39.9375em) {
            .input-group-label {
                display: none;
            }
            .input-group-label-for-small {
                display: block;
            }
        }
    </style>
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
                    <span class="input-group-label-for-small">the9grounds.com/tournaments/</span>
                    <span class="input-group-label">the9grounds.com/tournaments/</span>
                    <input type="text" class="input-group-field" name="slug" id="slug"> <!-- TODO: Ajax check url -->
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
                {{--<select name="type">
                    <option>Select an option</option>
                    <option value="1">Single Elimination</option>
                    <option value="2">Double Elimination</option>
                    <option value="3">Group Play then Single Elimination(Maximum of 32 players)</option>
                    <option value="4">Group Play then Double Elimination(Maximum of 32 players)</option>
                    <option value="5">Round-Robin</option>
                </select>--}}
                <label>
                    <input type="radio" name="type" id="type_single">Single Stage
                </label>
                <label>
                    <input type="radio" name="type" id="type_double">Double Stage
                </label>
            </div>
        </div>
        <div class="row">
            <div class="large-2 large-offset-1 columns">
                <p class="format">*Format</p>
            </div>
            <div class="large-4 columns format_change" style="float: left;">

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
                <p>*Game</p>
            </div>
            <div class="large-4 columns" style="float: left">
                <select name="game">
                    <option>Select a Game</option>
                    @foreach ($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
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

    <section id="format_default" style="display: none;">
        <select name="format">
            <option>Select a Format</option>
            <option value="1">Single Elimination</option>
            <option value="2">Double Elimination</option>
            <option value="3">Round Robin</option>
        </select>
    </section>
    <section id="format_group" style="display: none;">
        <select name="final_format">
            <option>Select a Format</option>
            <option value="1">Single Elimination</option>
            <option value="2">Double Elimination</option>
            <option value="3">Round Robin</option>
        </select>
    </section>
    <section id="format_group_before" style="display: none;">
        <div class="row format_group_before" style="background-color: darkgray;">
            <div class="large-2 large-offset-1 columns">
                <p>*Group Format</p>
            </div>
            <div class="large-6 columns" style="float: left;">
                <div class="row">
                    <div class="large-2 columns">
                        <p>*Number of participants per group</p>
                    </div>
                    <div class="large-10 columns" style="float: left;">
                        <input type="number" name="group_num_per" id="group_num_per">
                    </div>
                </div>
                <div class="row">
                    <div class="large-2 columns">
                        <p>*Number of participants to advance</p>
                    </div>
                    <div class="large-10 columns" style="float: left;">
                        <input type="number" name="group_num_adv" id="group_num_adv">
                    </div>
                </div>
                <div class="row">
                    <div class="large-2 columns">
                        <p>*Format</p>
                    </div>
                    <div class="large-10 columns" style="float: left;">
                        <select name="group_format">
                            <option>Select a Format</option>
                            <option value="1">Single Elimination</option>
                            <option value="2">Double Elimination</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(function() {
            $('#date').fdatepicker({
                format: 'yyyy-mm-dd hh:ii',
                pickTime: true
            });
            $('.format_change').html($('#format_default').html());
        });
        $('#type_single').change(function() {
            if ($(this).val() == 'on') {
                if ($('.format_change').html() != $('#format_default').html()) {
                    $('.format_change').html($('#format_default').html());
                }
                if ($('.format').text() != '*Format') {
                    $('.format').text('*Format');
                }
                if ($('.format_group_before').length != 1) {
                    $('.format_group_before').first().remove();
                }
            }
        });
        $('#type_double').change(function() {
            if ($(this).val() == 'on') {
                if ($('.format_change').html() != $('#format_group').html()) {
                    $('.format_change').html($('#format_group').html());
                }
                if ($('.format').text() != '*Final Format') {
                    $('.format').text('*Final Format');
                }
                $('.format_change').parent().before($('#format_group_before').html());
            }
        });
    </script>
@stop