@extends('master.master')
@section('content')
    <style>
        .theme-dark.slider-wrapper {
            padding: 15px;
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
        <div class="small-6 columns">
            <h1>News</h1>
        </div>
        <div class="small-6 columns">
            <div class="row">
                <div class="small-12 columns upcoming_tournaments">
                    <h3>Upcoming Tournaments</h3>
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns upcoming_clanwars">
                    <h3>Upcoming Clan Wars</h3>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#slider').nivoSlider({
            effect: 'random',
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            directionNav: true,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Prev',
            nextText: 'Next',
            randomStart: false,
            beforeChange: function(){},
            afterChange: function(){},
            slideshowEnd: function(){},
            lastSlide: function(){},
            afterLoad: function(){}
        });
    </script>
@stop