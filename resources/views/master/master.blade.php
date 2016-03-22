<html>
    <head>
        <title>The Nine Grounds</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ URL::asset('assets/nivo/nivo.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/nivo/themes/dark/dark.css') }}">
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.js"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
        <script src="{{ URL::asset('assets/nivo/nivo.js') }}"></script>
    </head>
    <body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '533611476819746',
                xfbml      : true,
                version    : 'v2.5'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <style>
        .nivo-controlNav {
            z-index: 1 !important;
        }
        .theme-dark .nivo-directionNav a {
            z-index: 1;
        }
    </style>

        <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Menu</div>
        </div>
        <form method="post" action="/search">
            <div class="top-bar" id="main-menu">
                <div class="top-bar-left">
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li class="menu-text">The Nine Grounds</li>
                        <li><a href="/">Home</a></li>
                        <li>
                            <a href="/tournaments">Tournaments</a>
                            @if ($UserLogged)
                                <ul class="menu">
                                    <li><a href="/tournaments/search">Search</a></li>
                                    <li><a href="/tournaments/create">Create</a></li>
                                </ul>
                            @endif
                        </li>
                        <li>
                        <a href="/clans">Clans</a>
                        @if ($UserLogged)
                            @if ($user->clan_id)
                                <ul class="menu">
                                    <li><a href="#">Dashboard</a></li>
                                </ul>
                            @endif
                        @endif
                        </li>
                        <li><a href="/about">About</a></li>
                    </ul>
                </div>
                <div class="top-bar-right">
                    <ul class="dropdown menu" data-dropdown-menu>
                        @if (!$UserLogged)
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Create Account</a></li>
                        @endif
                        <div class="hide-for-small-only">
                            <li><input type="search" placeholder="Search"></li>
                            <li><button type="submit" class="button success">Search</button></li>
                        </div>
                    </ul>
                </div>
            </div>
        </form>

        @if (count($errors) > 0)
            <div class="callout large alert" data-closable>
                @foreach ($errors->all() as $error)
                    <p style="color: black !important;">{{ $error }}</p>
                @endforeach
                <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (isset($notification))
            @if (count($notification) > 0)
                <div class="callout large" data-closable>
                    @foreach ($notification as $message)
                        <p style="color: black !important;">{{ $message }}</p>
                    @endforeach
                    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endif
        <div class="row wrapper">
            <div class="small-12 columns">
                @yield('content')
            </div>
        </div>
        <div class="footer">

        </div>
        <script type="text/javascript">
            $('.close_callout').click(function() {
                $(this).parent().hide();
            });
            $('.close_battle_callout').click(function() {
                $(this).parent().hide();
            });
            $(document).foundation();
        </script>
    </body>
</html>