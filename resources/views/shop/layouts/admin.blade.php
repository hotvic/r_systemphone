<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>@yield('title'){{ array_key_exists('title', View::getSections()) ? ' - ' : '' }}Loja SystemPhone (Admin)</title>

    <link href="{{ url('shop/admin/plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/admin/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/admin/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/admin/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/admin/css/pages.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/admin/css/menu.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/admin/css/responsive.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ url('shop/admin/js/modernizr.min.js') }}"></script>
</head>
<body class="fixed-left">
    <div id="wrapper">
        <div class="topbar">
            <div class="topbar-left">
                <div class="text-center">
                    <a href="{{ url('/') }}" class="logo">
                        <i class="md md-terrain"></i>
                        <span>Loja</span>
                    </a>
                </div>
            </div>

            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left">
                                <i class="fa fa-bars"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ $user->profile_picture_url }}" alt="user-img" class="img-circle"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/logout') }}"><i class="md md-settings-power"></i>&nbsp;Sair</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ $user->profile_picture_url }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ $user->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/logout') }}"><i class="md md-settings-power"></i>&nbsp;Sair</a></li>
                                </ul>
                            </div>

                            <p class="text-muted m-0">Administrador</p>
                        </div>
                    </div>

                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ url('/') }}" class="waves-effect waves-light active"><i class="md md-home"></i><span>&nbsp;Painel</span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-view-list"></i><span>&nbsp;Categorias</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('shop.admin.categories.list') }}">Todas</a></li>
                                    <li><a href="{{ route('shop.admin.categories.new') }}">Nova</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md md-poll"></i><span>&nbsp;Produtos</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('shop.admin.products.list') }}">Todos</a></li>
                                    <li><a href="{{ route('shop.admin.products.new') }}">Novo</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="content-page">
                <div class="content">
                @yield('content')
                </div>

                <footer class="footer text-right">
                    2016 © SystemPhone
                </footer>
            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <script src="{{ url('shop/admin/js/jquery.min.js') }}"></script>
        <script src="{{ url('shop/admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('shop/admin/js/detect.js') }}"></script>
        <script src="{{ url('shop/admin/js/fastclick.js') }}"></script>
        <script src="{{ url('shop/admin/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ url('shop/admin/js/jquery.blockUI.js') }}"></script>
        <script src="{{ url('shop/admin/js/waves.js') }}"></script>
        <script src="{{ url('shop/admin/js/wow.min.js') }}"></script>
        <script src="{{ url('shop/admin/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ url('shop/admin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ url('shop/admin/js/jquery.app.js') }}"></script>
        <script src="{{ url('shop/admin/plugins/moment/moment.js') }}"></script>
        <script src="{{ url('shop/admin/plugins/waypoints/lib/jquery.waypoints.js') }}"></script>
        <script src="{{ url('shop/admin/plugins/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ url('shop/admin/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

    @yield('page_scripts');
    </body>
</html>