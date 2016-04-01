@extends('master.admin')
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <i class="ion ion-ios-gear-outline">

                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        CPU Usage
                    </span>
                    <span class="info-box-number">
                        {{ var_dump($cpu) }}
                        <small>%</small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red">
                    <i class="fa fa-cogs">

                    </i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">
                        Ram Usage
                    </span>
                    <span class="info-box-number">
                        {{ var_dump($ram) }}
                        <small>%</small>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">User Growth</a></li>
                    <li role="presentation"><a href="#tournament" aria-controls="tournament" role="tab" data-toggle="tab">Tournaments</a></li>
                    <li role="presentation"><a href="#clan" aria-controls="clan" role="tab" data-toggle="tab">Clan Growth</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="user">
                        <canvas id="userChart" width="1200" height="400"></canvas>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tournament">
                        <canvas id="tournamentChart" width="1200" height="400"></canvas>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="clan">
                        <canvas id="clanChart" width="1200" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var data2 = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var data3 = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var ctx = $("#userChart").get(0).getContext("2d");
        var ctx2 = $("#tournamentChart").get(0).getContext("2d");
        var ctx3 = $("#clanChart").get(0).getContext("2d");
        var myLineChart = new Chart(ctx).Line(data, {
            bezierCurve: false
        });
        var myLineChart2 = new Chart(ctx2).Line(data2, {
            bezierCurve: false
        });
        var myLineChart3 = new Chart(ctx3).Line(data3, {
            bezierCurve: false
        });*/
        var data = {
            <?php
                    $js_array = json_encode($user_date);
                    echo "labels: " . $js_array . ",";
                    ?>
            datasets: [
                {
                    label: "User Growth",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    //data: [65, 59, 80, 81, 56, 55, 40]
                    <?php
                        $js_array = json_encode($user_data);
                        echo "data: " . $js_array . "";
                    ?>
                }
            ]
        };
        var ctx = $("#userChart").get(0).getContext("2d");
        var myLineChart = new Chart(ctx).Line(data, {
            bezierCurve: false
        });
        $('a[href="#user"]').on('shown.bs.tab', function() {
            var data = {
                <?php
                    $js_array = json_encode($user_date);
                    echo "labels: " . $js_array . ",";
                ?>
                datasets: [
                    {
                        label: "User Growth",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        //data: [65, 59, 80, 81, 56, 55, 40]
                        <?php
                        $js_array = json_encode($user_data);
                        echo "data: " . $js_array . "";
                        ?>
                    }
                ]
            };
            var ctx = $("#userChart").get(0).getContext("2d");
            var myLineChart = new Chart(ctx).Line(data, {
                bezierCurve: false
            });
        });
        $('a[href="#tournament"]').on('shown.bs.tab', function() {
            var data2 = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            var ctx2 = $("#tournamentChart").get(0).getContext("2d");
            var myLineChart2 = new Chart(ctx2).Line(data2, {
                bezierCurve: false
            });
        });
        $('a[href="#clan"]').on('shown.bs.tab', function() {
            var data3 = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            var ctx3 = $("#clanChart").get(0).getContext("2d");
            var myLineChart3 = new Chart(ctx3).Line(data3, {
                bezierCurve: false
            });
        });
    </script>
@stop