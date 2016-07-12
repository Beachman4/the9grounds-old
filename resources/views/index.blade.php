@extends('master.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Why Choose Us?</h1>
            <p>....Memes....Dank Memes.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 columns text-center" style="border-bottom: 1px solid gray">
            <h1>News</h1>
        </div>
    </div>
    <div class="row" style="margin-top: 3rem;">
        <div class="col-sm-12 columns">
            @foreach ($news as $article)
                <div class="row">
                    <div class="col-sm-12 columns">
                        <h3>{{ $article->title }}</h3>
                        @html($article->body)
                    </div>
                </div>
            @endforeach
            {!! $news->links() !!}
        </div>
    </div>
@stop