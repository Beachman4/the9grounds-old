@extends('master.master')
@section('content')
    <script src="{{ asset('assets/js/bracket.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bracket.css') }}"/>
    <script src="{{ asset('assets/js/socket.io.js') }}"></script>

    <div class="testing">

    </div>

    <div class="bracket">
        <div class="row">
            <div class="groups">
                <div class="large-3 columns text-center">
                <div class="group" id="A">
                    <h4>Group A</h4>
                    <ul class="group_part">
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                    </ul>
                </div>
                </div>
                <div class="large-3 columns text-center">
                <div class="group" id="B">
                    <h4>Group B</h4>
                    <ul class="group_part">
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                    </ul>
                </div>
                </div>
                <div class="large-3 columns text-center">
                <div class="group" id="C">
                    <h4>Group C</h4>
                    <ul class="group_part">
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                    </ul>
                </div>
                </div>
                <div class="large-3 columns text-center">
                <div class="group" id="D">
                    <h4>Group D</h4>
                    <ul class="group_part">
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                        <li>Beachman4</li><span class="match_number">4</span>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var options = {
            type: "double",
            group: "single",
            number: 256
        }
        /*var data = {
            groups: [["Beachman4", "Adam", "Jason", "nope"]],
            groups_results:
        }*/
        data = {
            groups: [[["Beachman4", "test", "Sanfos", "Jason"],[["Beachman4", "test", '4-0'], ["Beachman4", "Sanfos", '4-0'], ["Beachman4", "Jason", '4-0'], ["test", "Sanfos", '4-3'], ["test", "Jason", '3-4'], ["Sanfos", "Jason", '0-4']]]],
            data: []
        };
        $('.bracket').brackets(data, options);
    </script>
    <script>
        var socket = io('http://localhost:3000');
        socket.on("test-channel:App\\Events\\TestBroadCast", function(message) {
            if ($('.testing123').length ==1) {
                $('.testing123').remove();
            }
            var html = '<div class="testing123 callout small">' +
                    '<h5>TEST</h5>' +
                    '</div>';
            $('.top-bar').after(html);
        });
    </script>
@stop