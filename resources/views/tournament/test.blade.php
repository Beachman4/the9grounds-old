@extends('master.master')
@section('content')
    <script src="{{ URL::asset('assets/js/bracket.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bracket.css') }}"/>


    <div class="bracket">
        <div class="groups">
            <div class="group" id="A">
                <ul class="group_part">
                    <li>Beachman4<span class="match_number">4</span></li>
                    <li>Beachman4<span class="match_number">4</span></li>
                    <li>Beachman4<span class="match_number">4</span></li>
                    <li>Beachman4<span class="match_number">4</span></li>
                </ul>
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
@stop