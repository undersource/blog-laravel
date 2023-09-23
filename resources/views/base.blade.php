<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/w3.css') }}">

        <style>
            body, h1, h2, h3, h4, h5 {
                font-family: 'Raleway';
                font-style: normal;
                font-weight: 400;
                src: url("{{ asset('fonts/Raleway-Regular.ttf') }}") format('ttf');
            }
        </style>
    </head>
    <body class="w3-light-grey">
        @if(Auth::check())
            <div class="w3-container w3-black w3-padding-24">
                {{ Auth::user()->name }}
                <a href="{{ Route('logout') }}" class="w3-right w3-margin-right" style="text-decoration:none">Logout</a>
                <a href="{{ Route('add_form') }}" class="w3-right w3-margin-right" style="text-decoration:none">New</a>
            </div>
        @endif
        <div class="w3-content" style="max-width:1400px">
            <header class="w3-container w3-center w3-padding-32">
                <h1>
                    <a href="{{ Route('index') }}" style="text-decoration:none">
                        UNDERGROUND's BLOG
                    </a>
                </h1>
                <p>
                    Welcome to the blog
                    <span class="w3-tag">stranger</span>
                </p>
            </header>
            @yield('content')
        </div>
        @yield('footer') 
    </body>
</html>