@extends('master.master')
@section('content')
    <style>
        .theme-dark.slider-wrapper {
            padding: 15px;
        }
        p {
            color: #404040 !important;
        }
    </style>
    <!--<div class="row">
        <div class="small-4 medium-8 large-12 columns">
            <div class="slider-wrapper theme-dark">
                <div class="ribbon">
                    <div class="nivoSlider" id="slider">
                        <img src="/glide/image1.jpg?w=1170&h=320&fit=contain">
                        <img src="/glide/image2.jpg?w=1170&h=320&fit=contain">
                        <img src="/glide/image3.jpg?w=1170&h=320&fit=contain">
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="row">
        <div class="small-12 columns text-center" style="border-bottom: 1px solid gray">
            <h1>News</h1>
        </div>
    </div>
    <div class="row" style="margin-top: 3rem;">
        <div class="small-12 columns">
            @foreach ($news as $article)
                <div class="row">
                    <div class="small-12 columns">
                        <h3>{{ $article->title }}</h3>
                        <?php /*echo htmlspecialchars_decode(stripslashes($article->body));*/ ?>
                        @html($article->body)
                    </div>
                </div>
            @endforeach
            {!! $news->links() !!}
        </div>
    </div>
    <div class="row" style="margin-top: 3rem;">
        <div class="small-6 columns text-center upcoming_tournaments">
            <h3>Upcoming Tournaments</h3>
        </div>
        <div class="small-6 columns text-center upcoming_clanwars">
            <h3>Upcoming Clan Wars</h3>
        </div>
    </div>
    <div class="row" style="border-bottom: 1px solid gray">
        <div class="large-12 columns text-center">
            <h1>Games</h1>
        </div>
    </div>
    <div class="row small-up-1 medium-up-2 large-up-4" style="margin-top: 4rem;">
        @foreach ($games as $game)
            <div class="column">
                <a href="/tournaments/games/{{ urlencode($game->name) }}">
                    <img src="/image/games/{{ $game->picture }}">
                    <p class="text-center">{{ $game->name }}</p>
                </a>
            </div>
        @endforeach
    </div>
@stop