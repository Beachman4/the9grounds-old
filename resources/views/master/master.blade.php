<html>
    <head>
        <title>The Nine Grounds</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="{{ URL::asset('assets/nivo/nivo.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/nivo/themes/dark/dark.css') }}">
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/foundation/6.1.2/foundation.min.js"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
        <script src="{{ URL::asset('assets/nivo/nivo.js') }}"></script>
    </head>
    <body>

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
                        <li><a data-open="login_panel">Login</a></li>
                        <li><input type="search" placeholder="Search"></li>
                        <li><button type="submit" class="button success">Search</button></li>
                    </ul>
                </div>
            </div>
        </form>
        <div class="row wrapper">
            <div class="small-12 columns">
                @yield('content')
            </div>
        </div>
        <div class="footer">

        </div>


        <div class="reveal large" id="login_panel" data-reveal>
            <form method="post" action="/login">
                <div class="row">
                    <div class="small-6 small-offset-3 column">
                        <label>Username or Email
                            <input type="text" name="username_email" id="username_email">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-6 small-offset-3 column">
                        <label>Password
                            <input type="password" name="password" id="password">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-3 small-offset-3 columns">
                        <a href="/forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="row">
                    <div class="small-2 small-offset-3 columns">
                        <button type="submit" class="button success">Login</button>
                    </div>
                    <div class="small-3 columns" style="float:left">
                        <a class="button" data-open="register_panel">Create Account</a>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="reveal large" id="register_panel" data-reveal>
            <form method="post" action="/register">
                <div class="row">
                    <div class="small-6 small-offset-3 columns">
                        <div class="row">
                            <div class="small-12 columns">
                                <label>Email
                                    <input type="email" name="email" id="email">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <label>Username
                                    <input type="text" name="username" id="username">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <label>Password
                                    <input type="password" name="password" id="password">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                <label>Confirm Password
                                    <input type="password" name="confirm_password" id="confirm_password">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-12 columns">
                                {!! Recaptcha::render() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-6 columns">
                                <button type="submit" class="button success">Create</button>
                            </div>
                            <div class="small-6 columns" style="float:left">
                                <a data-open="login_panel" class="button">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
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