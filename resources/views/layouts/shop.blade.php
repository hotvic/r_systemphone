<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title'){{ array_key_exists('title', View::getSections()) ? ' - ' : '' }}Loja SystemPhone</title>

    <link href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/css/bootstrap-responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/css/cloud-zoom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/css/portfolio.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/layerslider/css/layerslider.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('shop/layerslider/css/layersliderstyle.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <div class="headerstrip">
            <div class="container">
                <div class="pull-left welcometxt">
                    Bem Vindo a Loja SystemPhone,
                    @if (Auth::check())
                        {{ $user->name }},
                        <a class="orange" href="{{ url('/logout') }}">Sair</a>
                    @else
                        <a class="orange" href="{{ route('auth.login', ['redirectPath' => '/']) }}">Entrar</a> ou <a class="orange" href="{{ url('/register') }}">Criar uma Conta</a>
                    @endif
                </div>
                <!-- Top Nav Start -->
                <div class="pull-right">
                    <div class="navbar" id="topnav">
                        <div class="navbar-inner">
                            <ul class="nav" >
                                <li>
                                    <a class="home active" href="{{ url('/') }}"><i class="icon-home"></i>&nbsp;Home</a>
                                </li>
                                <li>
                                    <a class="myaccount" href="{{ url('/account') }}"><i class="icon-user"></i>&nbsp;Minha Conta</a>
                                </li>
                                <li>
                                    <a class="shoppingcart" href="{{ url('/cart') }}"><i class="icon-shopping-cart"></i>&nbsp;Carrinho de Compras</a> </li>
                                <li>
                                    <a class="checkout" href="{{ url('/checkout') }}"><i class="icon-ok-circle"></i>&nbsp;CheckOut</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="headerdetails">
                <a class="logo pull-left" href="{{ url('/') }}">
                    <img title="Loja SystemPhone" alt="Loja SystemPhone" src="{{ url('shop/img/logo.png') }}">
                </a>
                <div class="pull-left">
                    <form class="form-search top-search">
                        <input type="text" class="input-medium search-query" placeholder="Pesquisar…">
                        <button class="btn btn-orange btn-small tooltip-test" data-original-title="Pesquisar"> <i class="icon-search icon-white"></i> </button>
                    </form>
                </div>
                <div class="pull-right">
                    <ul class="nav topcart pull-left">
                        <li class="dropdown hover carticon">
                            <a href="#" class="dropdown-toggle"><i class="icon-shopping-cart font18"></i>&nbsp;Carrinho de Compras&nbsp;<span class="label label-orange font14">1 item(s)</span> - $589.50 <b class="caret"></b></a>
                            <ul class="dropdown-menu topcartopen">
                                <li>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="image"><a href="product.html"><img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product"></a></td>
                                                <td class="name"><a href="product.html">MacBook</a></td>
                                                <td class="quantity">x&nbsp;1</td>
                                                <td class="total">$589.50</td>
                                                <td class="remove"><i class="icon-remove"></i></td>
                                            </tr>
                                            <tr>
                                                <td class="image"><a href="product.html"><img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product"></a></td>
                                                <td class="name"><a href="product.html">MacBook</a></td>
                                                <td class="quantity">x&nbsp;1</td>
                                                <td class="total">$589.50</td>
                                                <td class="remove"><i class="icon-remove "></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="textright"><b>Sub-Total:</b></td>
                                                <td class="textright">$500.00</td>
                                            </tr>
                                            <tr>
                                                <td class="textright"><b>Eco Tax (-2.00):</b></td>
                                                <td class="textright">$2.00</td>
                                            </tr>
                                            <tr>
                                                <td class="textright"><b>VAT (17.5%):</b></td>
                                                <td class="textright">$87.50</td>
                                            </tr>
                                            <tr>
                                                <td class="textright"><b>Total:</b></td>
                                                <td class="textright">$589.50</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="well pull-right buttonwrap">
                                        <a class="btn btn-orange" href="{{ url('/cart') }}">Ver Carrinho</a> <a class="btn btn-orange" href="{{ url('/checkout') }}">Checkout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="categorymenu">
            <nav class="subnav">
                <ul class="nav-pills categorymenu container">
                    <li>
                        <a class="active home" href="index-2.html">
                            <i class="icon-home icon-white font18"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a>Categorias</a>
                        <div>
                            <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('shop.catalog', ['category' => $category->slug]) }}">{{ $category->title }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="malito:contato@systemphonne.com">Entrar em Conato</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Header End -->

    <div id="maincontainer">
    @yield('content')
    </div>

    <footer id="footer">
        <section class="footersocial">
            <div class="container">
                <div class="row">
                    <div class="span3 info">
                        <h2><i class="icon-link"></i> Links</h2>
                        <ul>
                            <li>
                                <a href="{{ url('/account') }}">Minha Conta</a>
                            </li>
                            <li>
                                <a href="{{ config('app.url') }}">SystemPhone</a>
                            </li>
                            <li>
                                <a href="#">Termos &amp; Condições</a>
                            </li>
                        </ul>
                    </div>
                    <div class="span3 twitter">
                    </div>
                    <div class="span3 facebook">
                    </div>
                    <div class="span3 contact">
                        <h2> <i class="icon-phone-sign"></i> Contato</h2>
                        <ul>
                            <li class="email">contato@systemphonne.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="copyrightbottom">
            <div class="container">
                <div class="row">
                    <div class="span5 social">
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-google-plus"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <div class="span2 textcenter">SystemPhone © 2016</div>
                    <div class="span5 paymentsicons"></div>
                </div>
            </div>
        </section>

        <a id="gotop" href="#">Ir Para o Topo</a>
    </footer>

    <script src="{{ url('shop/js/jquery.js') }}" type="text/javascript" ></script>
    <script src="{{ url('shop/js/jquery.easing.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/respond.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.fancybox.js') }}" type="text/javascript" defer></script>
    <script src="{{ url('shop/js/jquery.flexslider.js') }}" type="text/javascript" defer></script>
    <script src="{{ url('shop/layerslider/js/jquery-transit-modified.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/layerslider/js/layerslider.transitions.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/layerslider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.tweet.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/cloud-zoom.1.0.2.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.carouFredSel-6.1.0-packed.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.mousewheel.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.touchSwipe.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.gmap.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/jquery.countdown.js') }}" type="text/javascript"></script>
    <script src="{{ url('shop/js/custom.js') }}" type="text/javascript" defer></script>
</body>
</html>