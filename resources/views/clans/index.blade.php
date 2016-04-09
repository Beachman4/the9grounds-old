@extends('master.master')
@section('content')
    <?php $user = \User::Get(); ?>
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="small-8 columns">
            <h1>Clans</h1>
        </div>
        @if ($user)
            @if ($user->clan_id == '' || empty($user->clan_id))
            <div class="small-4 columns text-right">
                <a href="/clans/create" class="button" style="margin-top: 5px;">Create Clan</a>
            </div>
            @endif
        @endif
    </div>
@stop