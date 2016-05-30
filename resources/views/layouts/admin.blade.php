<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title'){{ array_key_exists('title', View::getSections()) ? ' - ' : '' }}SystemPhone (Admin)</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.png">
</head>

<body>
    <div id="main">
        <header class="navbar navbar-fixed-top">
            <div class="navbar-logo-wrapper dark bg-dark">
                <a class="navbar-logo-image" href="index-2.html">
                    <img src="/images/logo.png" alt="" class="sb-l-o-logo">
                    <img src="/images/logo_small.png" alt="" class="sb-l-m-logo">
                </a>
            </div>
            <span id="sidebar_left_toggle" class="ad ad-lines navbar-nav navbar-left"></span>
            <form class="navbar-form navbar-left search-form square" role="search">
                <div class="input-group add-on">
                    <input type="text" class="form-control" placeholder="Pesquisar" onfocus="this.placeholder=''" onblur="this.placeholder='Pesquisar'">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-fuse">
                    <a href="#" class="dropdown-toggle mln" data-toggle="dropdown">
                        <span class="hidden-xs hidden-sm"><span class="name">{{ $user->name }}</span></span>
                        <span class="fa fa-caret-down hidden-xs hidden-sm"></span>
                        <span class="profile-online">
                            <img src="/images/avatars/profile_avatar.jpg" alt="avatar">
                        </span>
                    </a>
                    <ul class="dropdown-menu list-group keep-dropdown w190" role="menu">
                        <li class="list-group-item">
                            <a href="{{ route('user::profile') }}">
                                Perfil
                                <span class="fa fa-user"></span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="list-group-item">
                            <a href="{{ url('/logout') }}">
                                Sair
                                <span class="fa fa-sign-out"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>

        <aside id="sidebar_left" class="nano nano-light affix">
            <div class="sidebar-left-content nano-content">
                <header class="sidebar-header">
                    <div class="sidebar-widget author-widget">
                        <div class="media">
                            <a class="media-left profile-online" href="#">
                                <img src="/images/avatars/profile_avatar.jpg" class="img-responsive" alt="">
                            </a>

                            <div class="media-body">
                                <div>Bem Vindo</div>
                                <div class="media-author">{{ $user->name }}</div>
                            </div>
                        </div>
                    </div>
                </header>
                <ul class="nav sidebar-menu">
                    <li>
                        <a href="{{ route('admin::index') }}">
                            <span class="sidebar-title">Painel</span>
                            <span class="sb-menu-icon glyphicon glyphicon-dashboard"></span>
                        </a>
                    </li>
                    <li{!! is_finance() !!}>
                        <a class="accordion-toggle" href="#">
                            <span class="sidebar-title">Finanças</span>
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-line-chart"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li{!! Request::is('admin/finance/quotas') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.quotas.index') }}">Cotas</a>
                            </li>
                            <li{!! Request::is('admin/finance/quotas/create') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.quotas.create') }}">Criar Cota</a>
                            </li>
                            <li{!! Request::is('admin/finance/qrequests') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.qrequests.index') }}">Pedidos de Cota</a>
                            </li>
                            <li{!! Request::is('admin/finance/quotavalues/create') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.quotavalues.create') }}">Inserir Valor de Cota</a>
                            </li>
                            <li{!! Request::is('admin/finance/quotavalues') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.quotavalues.index') }}">Valores de Cota</a>
                            </li>
                            <li{!! Request::is('admin/finance/earnings') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.earnings.index') }}">Ganhos</a>
                            </li>
                            <li{!! Request::is('admin/finance/earnings/create') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.earnings.create') }}">Criar Ganhos</a>
                            </li>
                            <li{!! Request::is('admin/finance/withdrawals') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.withdrawals.index') }}">Saques</a>
                            </li>
                            <li{!! Request::is('admin/finance/wrequests') ? class_active() : '' !!}>
                                <a href="{{ route('admin.finance.wrequests.index') }}">Saques Pendentes</a>
                            </li>
                        </ul>
                    </li>
                    <li{!! is_users() !!}>
                        <a class="accordion-toggle" href="#">
                            <span class="sidebar-title">Usuários</span>
                            <span class="caret"></span>
                            <span class="sb-menu-icon fa fa-users"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li{!! Request::is('admin/users') ? class_active() : '' !!}>
                                <a href="{{ route('admin::users') }}">Usuários</a>
                            </li>
                        </ul>
                    </li>
                    <li{!! is_profile() !!}>
                        <a href="{{ route('user::profile') }}">
                            <span class="sidebar-title">Perfil</span>
                            <span class="sb-menu-icon glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <section id="content_wrapper">
            <header id="topbar" class="alt">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-icon">
                            <a href="{{ url('/admin') }}"><span class="fa fa-home"></span></a>
                        </li>
                        <li class="breadcrumb-link">
                            <a href="{{ url('/admin') }}">Início</a>
                        </li>
                        @yield('breadcrumb')
                    </ol>
                </div>
            </header>
            <section id="content" class="animated fadeIn">
            @yield('content')
            </section>
        </section>
    </div>
</body>
</html>