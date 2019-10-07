<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel API Explorer</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
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

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .demo-link {
            color: #636b6f;
            line-height: 80px;
            transition: all 0.25s ease 0s;
            background: none;
            border-width: 2px;
            border-style: solid;
            border-color: initial;
            border-image: initial;
            margin: 0.5em;
            padding: 1em 2em;
            text-decoration: none;
            font-weight: bold;
        }

        .demo-link:hover {
            box-shadow: #ff2d20 0px 0px 0px 2em inset;
            color: rgb(255, 255, 255);
        }

        .m-b-md {
            margin-bottom: 30px;
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

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel API Explorer
            </div>

            <p>This application is just a demo for <a href="https://github.com/netojose/laravel-api-explorer/" target="_blank">Laravel API Explorer</a> package</p>
            <p>There are some API routes registered and this package creates an interactive API documentation, like swagger ui, but automagically, without annotations or something else</p>
            <p><a class="demo-link" href="{{ url('api-explorer') }}">Go to demo route</a></p>
        </div>
    </div>
</body>

</html>