<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Global Bet Brasil')</title>

    <!-- Styles -->
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <style type="text/css">
        *, html, body {
            font-family: "Lato";
            font-size: 12;
        }
    </style>
</head>
<body>
    <div id="header">
        <h1><a href="{{ url('/') }}">Global Bet Brasil</a></h1>
    </div>

    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li>
                <a href="{{ route('user::profile') }}">
                    <span class="i-w glyphicon glyphicon-user"></span>
                    <span class="text">Perfil</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ url('/admin/settings') }}">
                    <span class="i-w glyphicon glyphicon-cog"></span>
                    <span class="text">Configurações</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ url('/logout') }}">
                    <span class="i-w glyphicon glyphicon-share-alt"></span>
                    <span class="text">Sair</span>
                </a>
            </li>
        </ul>
    </div>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb">
                <a href="{{ url('/user') }}" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Início</a>
            @yield('breadcrumb')
            </div>
        </div>
        <div class="container-fluid">
        @yield('content')
        </div>
    </div>
</body>
</html>
