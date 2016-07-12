<html>
    <head>
        <title>The Nine Grounds</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/css/tether.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body id="app">
    <login></login>
    <register></register>
    <create-website></create-website>
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

        <nav class="navbar navbar-dark bg-primary">
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
                &#9776;
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-toggleable-xs" id="bs-example-navbar-collapse-1">
                <a class="navbar-brand" href="/"><img src="/image/logo.png" height="30"></a>
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#createWebsiteModal">Create a Clan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    {{--@if (\User::isSignedIn())
                    <li class="nav-item" style="margin-left: 15px;"><a class="nav-link" href="/logout">Logout</a></li>
                    @else
                    <li class="nav-item" style="margin-left: 15px;"><a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>
                    @endif--}}
                    <user-menu v-ref:user></user-menu>
                </ul>
            </div>
        </nav>


        @if (count($errors) > 0)
            <div class="alert alert-dismissable alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <p style="color: black !important;">{{ $error }}</p>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (isset($notification))
            @if (count($notification) > 0)
                <div class="alert alert-dismissable alert-info" role="alert">
                    @foreach ($notification as $message)
                        <p style="color: black !important;">{{ $message }}</p>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif
        @endif
        <div class="container-fluid">
            <div class="container">
                <div class="row wrapper">
                    <div class="col-sm-12 columns">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        {{--$_SERVER['REMOTE_ADDR'] != '::1'--}}
        @if (true)
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- the9grounds -->
        <div class="row" style="margin-top: 3rem; margin-bottom: 3rem;">
            <div class="col-sm-12 columns">
                <!-- OLD<ins class="adsbygoogle the9groundsad1"
                     style="display:block;width:728px;height:90px; margin: 0 auto;"
                     data-ad-client="ca-pub-2570031793397892"
                     data-ad-slot="2150618848"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>-->
                {{--<div class="ad">
                    <ins class="adsbygoogle"
                         data-ad-client="ca-pub-2570031793397892"
                         data-ad-slot="8124173240"
                         data-ad-format="auto"
                         style="display:block;width:728px;height:90px; margin: 0 auto;"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>--}}
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
            var mq = window.matchMedia( "(max-width: 39.9375em)" );
            if (mq.matches) {
                if (!$('#logo').hasClass('text-center')) {
                    $('#logo').addClass('text-center');
                }
                /*if ($('#user_stuff').hasClass('text-right')) {
                    $('#user_stuff').removeClass('text-right');
                    if (!$('#user_stuff').hasClass('text-center')) {
                        $('#user_stuff').addClass('text-center');
                    }
                }*/
            } else {
                if ($('#logo').hasClass('text-center')) {
                    $('#logo').removeClass('text-center');
                }
                /*if ($('#user_stuff').hasClass('text-center')) {
                    $('#user_stuff').removeClass('text-center');
                    if (!$('#user_stuff').hasClass('text-right')) {
                        $('#user_stuff').addClass('text-right');
                    }
                }*/
            }
            $(window).resize(function() {
                var mq = window.matchMedia( "(max-width: 39.9375em)" );
                if (mq.matches) {
                    if (!$('#logo').hasClass('text-center')) {
                        $('#logo').addClass('text-center');
                    }
                    /*if (!$('#user_stuff').hasClass('text-right')) {
                        $('#user_stuff').removeClass('text-right');
                        if (!$('#user_stuff').hasClass('text-center')) {
                            $('#user_stuff').addClass('text-center');
                        }
                    }*/
                } else {
                    if ($('#logo').hasClass('text-center')) {
                        $('#logo').removeClass('text-center');
                    }
                    /*if ($('#user_stuff').hasClass('text-center')) {
                        $('#user_stuff').removeClass('text-center');
                        if (!$('#user_stuff').hasClass('text-right')) {
                            $('#user_stuff').addClass('text-right');
                        }
                    }*/
                }
            });
        </script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-69355708-2', 'auto');
            ga('send', 'pageview');

        </script>
        <script src="/js/main.js"></script>
    </body>
</html>