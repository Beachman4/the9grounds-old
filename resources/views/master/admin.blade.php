<html>
    <head>
        <title>The Nine Grounds</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/admin.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
        <script src="{{ URL::asset('assets/js/admin.js') }}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ URL::asset('assets/adminlte/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/adminlte/css/skins/_all-skins.min.css') }}">
        <script src="{{ URL::asset('assets/adminlte/js/app.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    </head>
    <body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!--
            <a href="/admin" class="logo">
                The Nine Grounds
            </a>
            -->
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    @if (count($buttons) > 0)
                        <ul class="nav navbar-nav navbar-right">
                            @foreach ($buttons as $button)
                                @foreach ($button as $key => $value)
                                    <li><a href="{{ $value }}">{{ $key }}</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                    @endif
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="header">The Nine Grounds</li>
                    <li><a href="/admin"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user"></i><span>Users</span> <i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user-list') }}"><i class="fa fa-list"></i>List</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('tournament-index') }}"><i class="fa fa-sitemap"></i><span>Tournaments</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-users"></i><span>Clans</span> <i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('clan-list') }}"><i class="fa fa-list"></i>List</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="/admin"><i class="fa fa-gamepad"></i><span>Games</span></a></li>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            @if ($title != '')
                <section class="content-header">
                    <h1>{{ $title }}</h1>
                </section>
            @endif
        @yield('content')
        </div>
    </div>
    </body>
</html>