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
                            <a href="#" class="dropdown-toggle"><i class="icon-shopping-cart font18"></i>&nbsp;Carrinho de Compras&nbsp;<span class="label label-orange font14" id="cart-item-count">vazio</span> - <strong id="cart-price">R$0.00</strong> <b class="caret"></b></a>
                            <ul class="dropdown-menu topcartopen">
                                <li>
                                    <table>
                                        <tbody id="cart-items">
                                        </tbody>
                                    </table>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="textright"><b>Sub-Total:</b></td>
                                                <td class="textright" id="cart-subtotal">R$0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="textright"><b>Total:</b></td>
                                                <td class="textright" id="cart-total">R$0.00</td>
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
                        <a class="active home" href="{{ url('/') }}">
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
    <script type="text/javascript">
        window.Auth = {};

        window.Auth.logged = {{ Auth::check() ? 'true' : 'false' }};
        window.Auth.user = {!! Auth::user()->toJson() !!};

        window.Cart = $.extend({}, {
            itemsCount: 0,
            items: {},
            update: function () {
                if (!Auth.logged) return;

                $.ajax({
                    url: '{{ route("shop.api.cart.get") }}',
                    type: 'POST',
                    data: {
                        user_id: Auth.user.id,
                    },
                    success: function(data) {
                        Cart.itemsCount = Object.keys(data).length;
                        Cart.items = data;

                        $(document).trigger('shop.cart.updated');
                    }
                });
            },
            add: function (product_id) {
                if (!Auth.logged) return;

                $.ajax({
                    url: '{{ route("shop.api.cart.append") }}',
                    type: 'POST',
                    data: {
                        user_id: Auth.user.id,
                        product_id: product_id,
                    },
                    success: function(data) {
                        if (data.success)
                            alert("Item adicionado ao carrinho com sucesso!");

                        Cart.update();
                    }
                });
            },
        });

        $(document).on('shop.cart.updated', function () {
            if (Cart.itemsCount == 0)
                $('#cart-item-count').text("vazio");
            else
            {
                if (Cart.itemsCount > 1)
                    $('#cart-item-count').text(Cart.itemsCount.toString() + ' itens');
                else
                    $('#cart-item-count').text(Cart.itemsCount.toString() + ' item');
            }

            if (Cart.itemsCount > 0)
            {
                var totalPrice = 0;

                $('#cart-items').empty();

                for (var item in Cart.items)
                {
                    var item = Cart.items[item];

                    $tdImage = $('<td/>').addClass('image').append(
                        $('<a/>').attr('href', item.url).append(
                            $('<img/>').attr('width', 50).attr('height', 50).attr('src', '{{ url("shop/img/prodcut-40x40.jpg") }}').attr('alt', 'product')
                        )
                    );
                    $tdName = $('<td/>').addClass('name').append(
                        $('<a/>').attr('href', item.url).text(item.name)
                    );
                    $tdQuantity = $('<td/>').addClass('quantity').html('x&nbsp;' + item.amount);
                    $tdTotal = $('<td/>').addClass('total').text('R$' + (parseFloat(item.price) * item.amount).toFixed(2));
                    $tdRemove = $('<td/>').addClass('remove').html('<i class="icon-remove"></i>');

                    $tr = jQuery('<tr/>');
                    $tr.append($tdImage).append($tdName).append($tdQuantity).append($tdTotal).append($tdRemove);

                    $('#cart-items').append($tr);

                    totalPrice += parseFloat(item.price) * item.amount;
                }

                $('#cart-price').text('R$' + totalPrice.toFixed(2));
                $('#cart-subtotal').text('R$' + totalPrice.toFixed(2));
                $('#cart-total').text('R$' + totalPrice.toFixed(2));
            }
        });

        if (Auth.logged)
        {
            Cart.update();
        }
    </script>
</body>
</html>