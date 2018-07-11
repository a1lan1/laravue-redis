<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraVue</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: flex-start;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif

        <div id="app" style="margin-top: 50px">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Props</a></li>
                <li><a data-toggle="tab" href="#tab2">Ajax</a></li>
                <li><a data-toggle="tab" href="#tab3">LineChart</a></li>
                <li><a data-toggle="tab" href="#tab4">PieChart</a></li>
                <li><a data-toggle="tab" href="#tab5">RandomChart</a></li>
                <li><a data-toggle="tab" href="#tab6">SocketChart</a></li>
                <li><a data-toggle="tab" href="#tab7">SocketChat</a></li>
                <li><a data-toggle="tab" href="#tab8">SocketPrivateChat</a></li>
            </ul>

            <div class="tab-content">
                <div id="tab1" class="tab-pane fade in active">
                    <prop-component :urldata="{{ json_encode($url_data) }}"></prop-component>
                </div>
                <div id="tab2" class="tab-pane fade">
                    <ajax-component></ajax-component>
                </div>
                <div id="tab3" class="tab-pane fade">
                    <chartline-component></chartline-component>
                </div>
                <div id="tab4" class="tab-pane fade">
                    <chartpie-component></chartpie-component>
                </div>
                <div id="tab5" class="tab-pane fade">
                    <chartrandom-component></chartrandom-component>
                </div>
                <div id="tab6" class="tab-pane fade">
                    <socket-component></socket-component>
                </div>
                <div id="tab7" class="tab-pane fade">
                    <socketchat-component></socketchat-component>
                </div>
                <div id="tab8" class="tab-pane fade">
                    @if (Auth::check())
                    <socketprivatechat-component
                            :users="{{ \App\User::select('email', 'id')->where('id', '!=', Auth::id())->get() }}"
                            :user="{{ Auth::user() }}">
                    </socketprivatechat-component>
                    @endif
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>

    </div>
</body>
</html>
