@extends('master.master')
@section('content')
    <div class="row">
        <div class="large-12 columns">
            <div class="progress" role="progressbar" tabindex="0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <span class="progress-meter">
                    <p class="progress-meter-text">0%</p>
                </span>
            </div>
            <script>
                $('.progress-meter').animate({width: "25%"});
                $('.progress-meter-text').html('25%');
            </script>
        </div>
    </div>
@stop