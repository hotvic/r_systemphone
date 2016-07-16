@extends('layouts.shop')

@section('content')
<section id="product">
    <div class="container">
        <div class="row">
            <!-- My Account-->
            <div class="span9">
                <h1 class="heading1"><span class="maintext"><i class="icon-user"></i>&nbsp;Minha Conta</span></h1>
                <h3 class="heading3">Minha Conta</h3>
                <div class="myaccountbox">
                    <ul>
                        <li>
                            <a href="{{ route('user::profile') }}">Editar informações da sua conta</a>
                        </li>
                        <li>
                            <a href="{{ route('user::profile') }}#password">Mudar Senha</a>
                        </li>
                    </ul>
                </div>
                <h3 class="heading3">Meus Pedidos</h3>
                <div class="myaccountbox">
                    <ul>
                        <li>
                            <a href="{{ url('/account/orders') }}">Ver seu histórico de pedidos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Sidebar Start-->
            <aside class="span3">
                <div class="sidewidt">
                    <h1 class="heading1"><span class="maintext"><i class="icon-user"></i>&nbsp;Conta</span></h1>
                    <ul class="nav nav-list categories">
                        <li>
                            <a href="{{ url('/account') }}">Minha Conta</a>
                        </li>
                        <li>
                            <a href="{{ route('user::profile') }}">Editar Conta</a>
                        </li>
                        <li>
                            <a href="{{ route('user::profile') }}#password">Senha</a>
                        </li>
                        <li>
                            <a href="{{ url('/account/orders') }}">Hisórico de Pedidos</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">Sair</a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection