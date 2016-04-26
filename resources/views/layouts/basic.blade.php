<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Global Bet Brasil</title>

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <style type="text/css">
        *, html, body {
            font-family: "Lato";
            font-size: 12;
        }
    </style>
</head>
<body>
    <div class="basicbox vertical-center">
    @yield('content')
    </div>
</body>
</html>