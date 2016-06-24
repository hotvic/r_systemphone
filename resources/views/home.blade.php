<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>SystemPhone</title>

    <link rel="stylesheet" href="{{ url('css/revslider.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('css/mmenu.css') }}" type="text/css" media="all" />
    <link rel='stylesheet' href="{{ url('css/vendor.css') }}" type='text/css' media="all" />
    <link rel='stylesheet' href="{{ url('css/home.css') }}" type='text/css' media="all" />
    <link rel="stylesheet" href="{{ url('css/masterslider.main.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('css/master-custom.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat%3A400%2C400italic%2C500%2C600%2C700%7CMontserrat%3A400%2C400italic%2C500%2C600%2C700%7CMontserrat%3A400%2C400italic%2C500%2C600%2C700%7CMontserrat%3A400%2C400italic%2C500%2C600%2C700%7CRoboto%3A400%2C400italic%2C500%2C600%2C700&amp;subset&amp;ver=4.2.2" type="text/css" media="all" />
</head>

<body id="one-page-home" class="page page-id-704 page-template page-template-template-onepage page-template-template-onepage-php custom-background _masterslider _msp_version_2.9.12 waves-pagebuilder menu-fixed theme-full">

    <div id="theme-layout">
        <div class="header-container">
            <header id="header" class="header-large clearfix">
                <div class="show-mobile-menu clearfix">
                    <a href="#" class="mobile-menu-icon">
                    <span></span><span></span><span></span><span></span>
                    </a>
                </div>
                <div class="tw-logo">
                    <a class="logo" href="index.html"><img class="logo-img" src="images/logo.png" alt="Theme Lion"/></a>
                </div>
                <nav class="menu-container clearfix">
                    <div class="tw-menu-container">
                        <ul id="menu" class="sf-menu">
                            <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a href="#one-page-home">Home</a>
                            <li class="menu-item"><a href="#about">Sobre</a></li>
                            <li class="menu-item"><a href="#team">Donos</a></li>
                            <li class="menu-item"><a href="#services">Produtos</a></li>
                            <li class="menu-item"><a href="#contact">Contato</a></li>
                        @if (\Auth::check())
                            @if (\Auth::user()->is('admin'))
                                <li class="menu-item"><a href="{{ url('/admin') }}">Administrar</a></li>
                            @else
                                <li class="menu-item"><a href="{{ url('/user') }}">Painel do Usuário</a></li>
                            @endif
                            <li class="menu-item"><a href="{{ url('/logout') }}">Sair</a></li>
                        @else
                            <li class="menu-item"><a href="{{ url('/login') }}">Login</a></li>
                            <li class="menu-item"><a href="{{ url('/register') }}">Registro</a></li>
                        @endif
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="header-clone">
            </div>
        </div>
        <div id="slider">
            <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" style="background-color:#E9E9E9;padding:0px;">
                <!-- START REVOLUTION SLIDER 4.6.5 fullscreen mode -->
                <div id="rev_slider_1_1" class="rev_slider fullscreenbanner" style="display:none;">
                    <ul>
                        <!-- SLIDE  -->
                        <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="upload/bg-for-slider3-320x200.jpg" data-delay="13000" data-saveperformance="off" data-title="Our Workplace">
                        <!-- MAIN IMAGE -->
                        <img src="{{ url('/images/patterns/backgrounds/home-slider.jpg') }}" alt="home-slider" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption twslidersmalltop customin" data-x="center" data-hoffset="4" data-y="center" data-voffset="-120" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1500" data-start="500" data-easing="Power4.easeInOut" data-splitin="words" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" data-endspeed="1000" data-endeasing="Power1.easeOut" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                            TELEFONIA VOIP / ECOMMERCE INTERNACIONAL
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption twslidermain randomrotate" data-x="center" data-hoffset="1" data-y="center" data-voffset="-10" data-speed="800" data-start="1700" data-easing="Power4.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" data-endspeed="300" data-endeasing="Power1.easeOut" style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">
                            VENHA FAZER PARTE DESTE GRANDE PROJETO!
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption skewfromleft tp-resizeme" data-x="center" data-hoffset="-105" data-y="center" data-voffset="173" data-speed="400" data-start="2100" data-easing="Power4.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" data-endspeed="300" data-endeasing="Power1.easeOut" data-linktoslide="prev" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                            <a href="{{ url('/login') }}" target="_blank" class="btn btn-border btn-m white-button" style="border-color:#fff;color:#fff">Login</a>
                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption skewfromright tp-resizeme" data-x="center" data-hoffset="109" data-y="center" data-voffset="173" data-speed="600" data-start="2400" data-easing="Power4.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" data-endspeed="300" data-endeasing="Power1.easeOut" data-linktoslide="next" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
                            <a href="{{ url('/register') }}" target="_blank" class="btn btn-border btn-m white-button" style="border-color:#fff;color:#fff">Registrar</a>
                        </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer">
                    </div>
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->
        </div>

        <!-- Start Main -->
        <section id="main">
        <div id="page">

            <!-- about -->
            <div id="about" class="row-container dark bg-scroll service-custom" style="background-color:#232a34;">
                <div class="waves-container container">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="tw-element waves-heading center col-md-12" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">Sobre a SystemPhone</h3>
                                        <p>
                                             A SystemPhone é uma empresa que usa o Marketing para impulsionar suas vendas e conquistar novos clientes e parceiros por todo o mundo.<br/>
                                            O grande diferencial da <span>SystemPhone</span> é que ela pensa em seus parceiros. Com seu agressivo plano de negócio ela divide para seus parceiros 80% do seu faturamento todos os dias.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element style_3 col-md-3" style="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end about -->

            <!-- parallax -->
            <div class="row-container light bg-parallax" id="team" style="background-image:url({{ url('/images/bg-for-test.jpg') }});">
                <div class="waves-container container">
                    <div class="row">
                        <div style="padding-top:20px">
                        </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="tw-element divider-center tw-divider-space col-md-12" style="display:block;margin-bottom:80px;margin-top:80px;">
                                    <div style=''>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element carousel-container col-md-12" style="">
                                    <div class="waves-carousel-testimonial list_carousel clearfix without-avatar" data-autoplay="false">
                                        <div class="waves-carousel">
                                            <div class="testimonial-item clearfix">
                                                <div class="testimonial-content">
                                                    <p>
                                                        “A vide do empreendedor é feita daqueles que não desistem, que tem objetivo e que tem, sobretudo, capacidade de trabalhar em equipe.”
                                                    </p>
                                                </div>
                                                <a class="testimonial-name" href="#">- João Dória Jr -</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element divider-center tw-divider-space col-md-12" style="display:block;margin-bottom:80px;margin-top:80px;">
                                    <div style=''>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-bottom:20px">
                    </div>
                </div>
            </div>
            <!-- end parallax -->

            <!-- amazin facts -->
            <div class="row-container dark bg-fixed" style="background-color:transparent;background-image:url({{ url('images/bg-for-milest.jpg') }});">
                <div class="waves-container container">
                    <div class="row">
                        <div style="padding-top:20px">
                        </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="tw-element divider-center tw-divider-space col-md-12" style="display:block;margin-bottom:40px;margin-top:40px;">
                                    <div style=''>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element waves-heading center col-md-12" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">System Phone</h3>
                                        <p>
                                            Venha fazer parte desta empresa que está mudando o conceito de marketing no mundo.<br/>
                                            Faça como muitos outros e venha ter sucesso conosco.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element col-md-3" style="">
                                    <div class="tw-circle-chart tw-animate" data-percent="0" data-padding="6" data-percent-update="70" data-line-cap="butt" data-line-width="10" data-size="228" data-color="#fc0" data-track-color="transparent" data-animation-delay="">
                                        <span style="color:#fc0;font-size:60px;">48 <span>Países</span></span>
                                    </div>
                                </div>
                                <div class="tw-element col-md-3" style="">
                                    <div class="tw-circle-chart tw-animate" data-percent="0" data-padding="6" data-percent-update="70" data-line-cap="butt" data-line-width="10" data-size="228" data-color="#fff" data-track-color="transparent" data-animation-delay="">
                                        <span style="color:#fff;font-size:60px;">150 <span>Produtos</span></span>
                                    </div>
                                </div>
                                <div class="tw-element col-md-3" style="">
                                    <div class="tw-circle-chart tw-animate" data-percent="0" data-padding="6" data-percent-update="85" data-line-cap="butt" data-line-width="10" data-size="228" data-color="#fff" data-track-color="transparent" data-animation-delay="">
                                        <span style="color:#fff;font-size:60px;">4367 <span>Parceiros</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-bottom:60px">
                    </div>
                </div>
            </div>
            <!--end amazing facts -->


            <!-- service -->
            <div id="services" class="row-container dark bg-scroll" style="background-color:#232a34;">
                <div class="waves-container container">
                            <div class="row">
                                <div class="tw-element waves-heading center col-md-12" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">SOMOS UMA EMPRESA QUE PENSA NOS PARCEIROS</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element col-md-4" style="">
                                    <div class="tw-service-box left-service style_5 no-titleline" style="">
                                        <div class="tw-service-icon" style="">
                                            <i class="tw-font-icon fa fa-book " style="border-style: solid;font-style:normal;text-align:center;font-size:44px;width:46px;line-height:46px;padding:5px;color:#dddddd;background-color:transparent;border-color:#000;border-width:0px;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius:0px;"></i>
                                        </div>
                                        <div class="tw-service-content desc_unstyle" style="margin-left:79px;">
                                            <h3>CURSOS ONLINE</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                                Centro de treinamento online com diversos cursos em várias áreas de atuação para nossos parceiros.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-element col-md-4" style="">
                                    <div class="tw-service-box left-service style_5 no-titleline" style="">
                                        <div class="tw-service-icon" style="">
                                            <i class="tw-font-icon fa fa-shopping-cart " style="border-style: solid;font-style:normal;text-align:center;font-size:44px;width:46px;line-height:46px;padding:5px;color:#dddddd;background-color:transparent;border-color:#000;border-width:0px;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius:0px;"></i>
                                        </div>
                                        <div class="tw-service-content desc_unstyle" style="margin-left:79px;">
                                            <h3>ECOMMERCE</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                                Ecommerce online com cobertura internacional e diversos tipos de produtos como eletrônicos e vestuário.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-element col-md-4" style="">
                                    <div class="tw-service-box left-service style_5 no-titleline" style="">
                                        <div class="tw-service-icon" style="">
                                            <i class="tw-font-icon fa fa-phone-square " style="border-style: solid;font-style:normal;text-align:center;font-size:44px;width:46px;line-height:46px;padding:5px;color:#dddddd;background-color:transparent;border-color:#000;border-width:0px;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius:0px;"></i>
                                        </div>
                                        <div class="tw-service-content desc_unstyle" style="margin-left:79px;">
                                            <h3>SERVIÇO VOIP</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                                Sua mensalidade será convertida em minutos VOIP. Você terá um serviço estável e de qualidade para fazer ligações em todo o mundo.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element col-md-4" style="">
                                    <div class="tw-service-box left-service style_5 no-titleline" style="">
                                        <div class="tw-service-icon" style="">
                                            <i class="tw-font-icon fa fa-users " style="border-style: solid;font-style:normal;text-align:center;font-size:44px;width:46px;line-height:46px;padding:5px;color:#dddddd;background-color:transparent;border-color:#000;border-width:0px;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius:0px;"></i>
                                        </div>
                                        <div class="tw-service-content desc_unstyle" style="margin-left:79px;">
                                            <h3>INDICAÇÃO DIRETA</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                                A empresa te paga 10% de indicação sobre todas as compras de pacote que seus indicados fizerem.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-element col-md-4" style="">
                                    <div class="tw-service-box left-service style_5 no-titleline" style="">
                                        <div class="tw-service-icon" style="">
                                            <i class="tw-font-icon fa fa-money " style="border-style: solid;font-style:normal;text-align:center;font-size:44px;width:46px;line-height:46px;padding:5px;color:#dddddd;background-color:transparent;border-color:#000;border-width:0px;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius:0px;"></i>
                                        </div>
                                        <div class="tw-service-content desc_unstyle" style="margin-left:79px;">
                                            <h3>DIVISÃO DE LUCROS</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                                Ao comprar um pacote e se tornar um parceira da System Phone, você receberá uma divisão de lucros diarios.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-element col-md-4" style="">
                                    <div class="tw-service-box left-service style_5 no-titleline" style="">
                                        <div class="tw-service-icon" style="">
                                            <i class="tw-font-icon fa fa-desktop " style="border-style: solid;font-style:normal;text-align:center;font-size:44px;width:46px;line-height:46px;padding:5px;color:#dddddd;background-color:transparent;border-color:#000;border-width:0px;border-radius:0px;-webkit-border-radius:0px;-moz-border-radius:0px;"></i>
                                        </div>
                                        <div class="tw-service-content desc_unstyle" style="margin-left:79px;">
                                            <h3>BACKOFFICE</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                                Acesse suas informações como saldo, indicados, compre pacotes e produtos e efetue saques.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-container dark bg-scroll" style="background-image:url({{ url('images/bg-video.jpg') }});overflow: hidden;position:relative;">
                <div class="video-mask">
                </div>
                <div class="video-mask-color">
                </div>
                <div class="background-video">
                    <div id="jquery_jplayer_8" class="jp-jplayer jp-jplayer-bgvideo" data-pid="8" data-m4v="#" data-thumb="upload/bg-video.jpg">
                    </div>
                </div>
                <div class="waves-container container" style="position:relative; z-index:4">
                    <div class="row">
                        <div style="padding-top:190px">
                        </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="tw-element col-md-12" style="">
                                    <div class="bg-video-container bg-video-horizontal">
                                        <h2 class="bg-video-first-text">CLICK NO BOTÃO AO LADO</h2>
                                        <i class="bg-video-play tw-font-icon fa fa-play" data-pattern="" data-size="" data-color="" data-opacity="30"></i>
                                        <h2 class="bg-video-last-text">E ASSISTA NOSSO VÍDEO</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-bottom:190px">
                    </div>
                </div>
            </div>

            <!-- Scoailize -->
            <div class="row-container light bg-scroll" style="background-image:url(upload/bg-for-home1.jpg);">
                <div class="waves-container container">
                    <div class="row">
                        <div style="padding-top:20px">
                        </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="tw-element divider-center tw-divider-space col-md-12" style="display:block;margin-bottom:40px;margin-top:40px;">
                                    <div style=''>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element waves-heading center col-md-12" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">MÍDIAS SOCIAIS</h3>
                                        <p>
                                            Estamos nos preparando para dar suporte a todos os nossos afiliados atravez das principais mídias sociais.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element col-md-3" style="">
                                    <div class="tw-service-box top-service style_4 no-titleline" style="margin-top:64px;">
                                        <div class="tw-service-icon" style="margin-top:-64px;">
                                            <i class="tw-font-icon fa fa-facebook" style="border-style: solid;font-style:normal;text-align:center;font-size:48px;width:50px;line-height:50px;padding:40px;color:#fff;background-color:rgba(52,52,52,0.45);border-color:#000;border-width:0px;border-radius:150px;-webkit-border-radius:150px;-moz-border-radius:150px;"></i>
                                        </div>
                                        <div class="tw-service-content " style="">
                                            <h3>FACEBOOK</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-element col-md-3" style="">
                                    <div class="tw-service-box top-service style_4 no-titleline" style="margin-top:64px;">
                                        <div class="tw-service-icon" style="margin-top:-64px;">
                                            <i class="tw-font-icon fa fa-twitter" style="border-style: solid;font-style:normal;text-align:center;font-size:48px;width:50px;line-height:50px;padding:40px;color:#fff;background-color:rgba(52,52,52,0.45);border-color:#000;border-width:0px;border-radius:150px;-webkit-border-radius:150px;-moz-border-radius:150px;"></i>
                                        </div>
                                        <div class="tw-service-content " style="">
                                            <h3>TWITTER</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-element col-md-3" style="">
                                    <div class="tw-service-box top-service style_4 no-titleline" style="margin-top:64px;">
                                        <div class="tw-service-icon" style="margin-top:-64px;">
                                            <i class="tw-font-icon fa fa-google-plus" style="border-style: solid;font-style:normal;text-align:center;font-size:48px;width:50px;line-height:50px;padding:40px;color:#fff;background-color:rgba(52,52,52,0.45);border-color:#000;border-width:0px;border-radius:150px;-webkit-border-radius:150px;-moz-border-radius:150px;"></i>
                                        </div>
                                        <div class="tw-service-content " style="">
                                            <h3>Google+</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tw-element col-md-3" style="">
                                    <div class="tw-service-box top-service style_4 no-titleline" style="margin-top:64px;">
                                        <div class="tw-service-icon" style="margin-top:-64px;">
                                            <i class="tw-font-icon fa fa-pinterest" style="border-style: solid;font-style:normal;text-align:center;font-size:48px;width:50px;line-height:50px;padding:40px;color:#fff;background-color:rgba(52,52,52,0.45);border-color:#000;border-width:0px;border-radius:150px;-webkit-border-radius:150px;-moz-border-radius:150px;"></i>
                                        </div>
                                        <div class="tw-service-content " style="">
                                            <h3>PINTEREST</h3>
                                            <div class="service-title-sep">
                                            </div>
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element divider-center tw-divider-space col-md-12" style="display:block;margin-bottom:40px;margin-top:40px;">
                                    <div style=''>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-bottom:20px">
                    </div>
                </div>
            </div>

            <!-- skills -->
            <div class="row-container dark bg-scroll" style="background-color:#232a34;">
                <div class="waves-container container">
                    <div class="row">
                        <div style="padding-top:90px">
                        </div>
                        <div class="col-md-6 ">
                            <div class="row">
                                <div class="tw-element waves-heading left col-md-12 no-bottom" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">PROJETOS</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element col-md-8" style="">
                                    <div class="tw-chart-pie tw-animate tw-redraw not-drawed" data-labellist="false" data-zero="false" data-type="Doughnut" data-animation-delay="0" data-animation-offset="90%">
                                        <ul style="display:none;" class="data">
                                            <li data-value="95" data-color="#ffcc00" data-fill-text="Ecommerce"></li>
                                            <li data-value="80" data-color="#ffcc00" data-fill-text="Sistema VOIP"></li>
                                            <li data-value="70" data-color="#ffcc00" data-fill-text="Cursos Online"></li>
                                        </ul>
                                        <canvas></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="row">
                                <div class="tw-element waves-heading left col-md-12 no-bottom" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">ANDAMENTO DOS PROJETOS</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element col-md-12" style="">
                                    <div class="waves-progress">
                                        <h5 class="progress-title">ECOMMERCE <span style="left:95%">95%</span></h5>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 95%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="waves-progress">
                                        <h5 class="progress-title">SISTEMA VOIP <span style="left:80%">80%</span></h5>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 80%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="waves-progress">
                                        <h5 class="progress-title">CURSOS ONLINE <span style="left:60%">60%</span></h5>
                                        <div class="bar-container">
                                            <div class="bar" style="width: 60%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-bottom:90px">
                    </div>
                </div>
            </div>

            <div id="contact" class="row-container light bg-scroll" style="background-color:#e0e0e0;">
                <div class="waves-container container">
                    <div class="row">
                        <div style="margin-top:-60px">
                        </div>
                    </div>
                    <div style="margin-bottom:-60px">
                    </div>
                </div>
            </div>
            <div class="row-container dark bg-scroll" style="background-image:url(upload/bg-bottom.jpg);">
                <div class="waves-container container">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="tw-element waves-heading center col-md-12" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">Contato</h3>
                                        <p>
                                            Qualquer dúvida estamos à disposição.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element waves-heading left col-md-4 no-bottom" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">Entre em contato</h3>
                                    </div>
                                </div>
                                <div class="tw-element waves-heading left col-md-8 no-bottom" style="">
                                    <div class="heading-container">
                                        <h3 class="heading-title">Deixe sua dúvida.</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tw-element col-md-4" style="">
                                    <div id="sidebar">
                                        <aside class="widget flickr_widget" id="contactinfo-2">
                                        <div class="contact-info-widget">
                                            <ul>
                                                <li><i class="fa fa-phone"></i>
                                                <div>
                                                    2135555555
                                                </div>
                                                </li>
                                                </li>
                                                <li><i class="fa fa-envelope-o"></i>
                                                <div>
                                                    <a target="_blank" href="mailto:contato@systemphonne.com">contato@systemphonne.com</a>
                                                </div>
                                                </li>
                                            </ul>
                                        </div>
                                        </aside>
                                    </div>
                                </div>
                                <div class="tw-element col-md-8" style="">
                                    <div role="form" class="wpcf7" id="wpcf7-f563-p8-o1" lang="en-US" dir="ltr">
                                        <div class="screen-reader-response">
                                        </div>
                                        <form id="contact-form">
                                            <p>
                                                <span class="wpcf7-form-control-wrap name">
                                                    <input type="text"  name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Seu nome"/>
                                                </span>

                                                <span class="wpcf7-form-control-wrap email">
                                                     <input type="text" name="mail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Seu email"/>
                                                </span>

                                                <span class="wpcf7-form-control-wrap message">
                                                    <textarea  name="comment" id="comment" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Mensagem"></textarea>
                                                </span>
                                                <input type="submit" id="submit_contact" value="Enviar" class="wpcf7-form-control wpcf7-submit"/>
                                                <div id="msg" class="message"></div>
                                            <p></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <!-- End Main -->
        <footer id="footer">
        <!-- Start Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="copyright">
                        © 2016 - <a href='{{ url('/') }}'>SystemPhone</a> Todos os Direitos Reservados.
                    </p>
                </div>
            </div>
        </div>
        <!-- End Container -->
        </footer>
        </div>
        <a id="scrollUp" title="Scroll to top"><i class="fa fa-chevron-up"></i></a>

        <script type="text/javascript" src="{{ url('js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/jquery-migrate.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/jquery.form.min.js') }}"></script>
        <script type='text/javascript' src="{{ url('js/contact-form.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/jquery.waypoints.mim.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/themewaves.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/smoothscroll.js') }}"></script>

        <script type="text/javascript">
            var setREVStartSize = function() {
                var tpopt = new Object();
                    tpopt.startwidth = 1170;
                    tpopt.startheight = 880;
                    tpopt.container = jQuery('#rev_slider_1_1');
                    tpopt.fullScreen = "on";
                    tpopt.forceFullWidth="on";

                tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
            };

            /* CALL PLACEHOLDER */
            setREVStartSize();

            var tpj=jQuery;
            tpj.noConflict();
            var revapi1;

            tpj(document).ready(function() {
                if(tpj('#rev_slider_1_1').revolution == undefined){
                    revslider_showDoubleJqueryError('#rev_slider_1_1');
                } else {
                    revapi1 = tpj('#rev_slider_1_1').show().revolution({
                        dottedOverlay:"none",
                        delay:9000,
                        startwidth:1170,
                        startheight:880,
                        hideThumbs:200,
                        thumbWidth:100,
                        thumbHeight:50,
                        thumbAmount:3,
                        simplifyAll:"off",
                        navigationType:"bullet",
                        navigationArrows:"solo",
                        navigationStyle:"preview4",
                        touchenabled:"on",
                        onHoverStop:"off",
                        nextSlideOnWindowFocus:"off",
                        swipe_threshold: 0.7,
                        swipe_min_touches: 1,
                        drag_block_vertical: false,
                        keyboardNavigation:"off",
                        navigationHAlign:"center",
                        navigationVAlign:"bottom",
                        navigationHOffset:0,
                        navigationVOffset:120,
                        soloArrowLeftHalign:"left",
                        soloArrowLeftValign:"center",
                        soloArrowLeftHOffset:20,
                        soloArrowLeftVOffset:0,
                        soloArrowRightHalign:"right",
                        soloArrowRightValign:"center",
                        soloArrowRightHOffset:20,
                        soloArrowRightVOffset:0,
                        shadow:0,
                        fullWidth:"off",
                        fullScreen:"on",
                        spinner:"spinner0",
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,
                        shuffle:"off",
                        forceFullWidth:"on",
                        fullScreenAlignForce:"off",
                        minFullScreenHeight:"400",
                        hideThumbsOnMobile:"off",
                        hideNavDelayOnMobile:1500,
                        hideBulletsOnMobile:"off",
                        hideArrowsOnMobile:"off",
                        hideThumbsUnderResolution:0,
                        fullScreenOffsetContainer: ".headerwrap, .headertopwrap",
                        fullScreenOffset: "",
                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        startWithSlide:0
                    });
                }
            });
        </script>
        <script type='text/javascript'>
            var waves_script_data = {"home_uri":"{{ url('/') }}","menu_padding":"33","menu_wid_margin":"30","blog_art_min_width":"230","pageloader":"0","header_height":"80"};
        </script>
</body>
</html>
