@extends('master.master')
@section('content')
    <script src="{{ URL::asset('assets/js/brackets.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/brackets.css') }}" />


    <div class="test">
    tests
    </div>

    <script type="text/javascript">
        var data = {
            teams: [
                    ["Beachman4", "Sanfos"],
                    ["Unholybound", "DarkPrelate"],
                    ["Jason", "John"],
                    ["test", "test123"]
            ],
            results: [
                [[1, 2], [3, 4], [5, 6], [3, 0]],
                [[1,2], [2,3]],
                [[1, 3], [4, 5]]
            ]
        }
        $(function() {
            $('.test').bracket({
                init: data
            });
        });
    </script>
@stop