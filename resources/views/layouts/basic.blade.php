<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title'){{ array_key_exists('title', View::getSections()) ? ' - ' : '' }}SystemPhone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.png">
</head>

<body class="utility-page sb-l-c sb-r-c">
    <div id="main" class="animated fadeIn">
    @yield('content')
    </div>
</body>