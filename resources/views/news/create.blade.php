@extends('master.master')
@section('content')
    <script src="{{ URL::asset('assets/ckeditor/ckeditor.js') }}"></script>
    <form method="POST">
        <div class="row">
            <div class=" small-12 large-8 large-offset-2 columns">
                <label>Title
                    <input type="text" name="title" id="title">
                </label>
            </div>
        </div>
        <div class="row">
            <div class="small-12 large-8 large-offset-2 columns">
                <label>Body
                    <textarea name="body" id="body"></textarea>
                </label>
            </div>
        </div>
        <div class="row" style="margin-top: 2rem;">
            <div class=" small-4 large-1 large-offset-2 columns">
                <button class="button success" type="submit">Create</button>
            </div>
            <div class=" small-4 large-1 columns" style="float: left;">
                <a href="{{ route('index') }}" class="button alert">Cancel</a>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
    <script type="text/javascript">
        CKEDITOR.replace('body');
    </script>
@stop