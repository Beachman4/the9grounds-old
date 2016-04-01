@extends('master.master')
@section('content')
    <div class="row expanded" style="border-bottom: 1px solid gray">
        <div class="small-12 columns">
            <h1>Tournaments</h1>
        </div>
    </div>
    <div class="row" style="margin-top: 1rem;">
        <div class="small-8 columns">
            @if (count($tournaments) > 0)
            <div class="row small-up-1 medium-up-2 large-up-3">
                <div class="column tournament">
                    <a href="/tournament/id"><img src="//placehold.it/300x300" class="thumbnail" alt=""></a>
                    <a href="/tournament/id">Tournament Name</a>
                    <p>Round of Tournament Rounds.</p>
                </div>
            </div>
            @else
            <h3>There are no tournaments.  Create one <a href="/tournaments/create" class="button success tiny"><i class="fa fa-plus-circle"></i>here</a>.</h3>
            @endif
        </div>
        <div class="small-4 columns">
            <div class="row">
                <div class="small-12 columns text-center tournaments_featured">
                    <h5>Featured</h5>
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns tournaments_winners text-center">
                    <h5>Recent Winners</h5>
                </div>
            </div>
        </div>
    </div>
@endsection