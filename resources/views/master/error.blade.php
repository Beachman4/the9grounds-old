<html>
<head>
    <title>The Nine Grounds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/main.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="col-sm-12 col-md-4 col-lg-3">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i> Admin</a>
                        <ul class="menu">
                            <li><a href="/admin">Admin Panel</a></li>
                            <li><a href="/news/create">Create News</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endif
    @endif
    {{--<div class="col-sm-12 col-md-3 col-lg-3" id="logo">
        <a href="/"><img src="/image/logo.png" style="height: 100px;" /></a>
    </div>--}}
</div>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img src="/image/logo.png" height="50"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/create-a-clan">Create a Clan</a></li>
                <li><a href="/about">About</a></li>
                @if (\User::isSignedIn())
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li style="margin-left: 15px;"><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="row wrapper">
    <div class="col-sm-12">
        @yield('content')
    </div>
</div>
@if ($_SERVER['REMOTE_ADDR'] != '::1')
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- the9grounds -->
    <div class="row" style="margin-top: 3rem; margin-bottom: 3rem;">
        <div class="small-12 columns">
            <!-- OLD<ins class="adsbygoogle the9groundsad1"
                 style="display:block;width:728px;height:90px; margin: 0 auto;"
                 data-ad-client="ca-pub-2570031793397892"
                 data-ad-slot="2150618848"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>-->
            <ins class="adsbygoogle"
                 style=""
                 data-ad-client="ca-pub-2570031793397892"
                 data-ad-slot="8124173240"
                 data-ad-format="auto" width="auto"></ins>
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