<html>
    <head>
        <title>The Nine Grounds</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
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

        <script type="text/javascript">
            $(function() {
                /*
                var height = $('.ca').height(),
                    height2 = $('.login').height(),
                    user_stuff = $('.user_stuff').height(),
                    offset = user_stuff - height - 24.480,
                    offset2 = user_stuff - height2 - 24.480;
                $('.ca').css('margin-top', offset);
                $('.login').css('margin-top', offset2);*/
            });
        </script>
        <div class="row">
            @if ($UserLogged)
                @if ($admin)
                    <div class="small-12 medium-7 large-3 columns">
                        <ul class="dropdown menu" data-dropdown-menu>
                            <li>
                                <a href="#"><i class="fa fa-cogs"></i> Admin</a>
                                <ul class="menu">
                                    <li><a href="/news/create">Create News</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endif
            @endif
            <div class="small-10 medium-5 large-3 columns text-right user_stuff" id="user_stuff" style="float:right">
                @if ($UserLogged)
                    <script type="text/javascript">
                        $('#user_stuff').removeClass('user_stuff');
                        $('#user_stuff').addClass('logged_user');
                    </script>
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li>
                            <a href="#">Hello {{ $user->username }}!</a>
                            <ul class="menu">
                                <li><a href="#">My Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <div class="row">
                        <div class="small-4 large-4 columns login_button text-left">
                            <a href="/login" class="button login">Login</a>
                        </div>
                        <div class="small-8 large-8 columns register_button" style="position: relative; bottom: 0;">
                            <a href="/register" class="button ca">Create Account</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">

            </div>
        </div>
        <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Menu</div>
            </div>
        </div>
        <form method="post" action="/search">
            <div class="top-bar" id="main-menu">

                <div id="responsive-menu">
                    <div class="top-bar-left text-center">
                        <ul class="dropdown menu" data-dropdown-menu>
                            <li><a href="/">Home</a></li>
                            <li>
                                <a href="/tournaments">Tournaments</a>
                                @if ($UserLogged)
                                    <ul class="menu vertical">
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
                    <!--<div class="top-bar-right">
                        <ul class="dropdown menu" data-dropdown-menu>
                            if (!$UserLogged)
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Create Account</a></li>
                            endif
                            <li class="hide-for-small-only"><input type="search" placeholder="Search"></li>
                            <li class="hide-for-small-only"><button type="submit" class="button success">Search</button></li>
                        </ul>
                    </div>-->
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
                <div class="callout primary large" data-closable>
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
        @if ($_SERVER['REMOTE_ADDR'] != '::1')
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- the9grounds -->
        <div class="row" style="margin-top: 3rem; margin-bottom: 3rem;">
            <div class="small-12 columns">
                <ins class="adsbygoogle the9groundsad1"
                     style="display:block;width:728px;height:90px; margin: 0 auto;"
                     data-ad-client="ca-pub-2570031793397892"
                     data-ad-slot="2150618848"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        @endif


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
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-69355708-2', 'auto');
            ga('send', 'pageview');

        </script>
    </body>
</html>