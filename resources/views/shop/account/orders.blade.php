@extends('layouts.shop')

@section('content')
<section id="product">
    <div class="container">
        <div class="row">
            <!-- My Account-->
            <div class="span12">
                <h1 class="heading1"><span class="maintext"><i class="icon-user"></i>&nbsp;Meus Pedidos</span></h1>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pedido Em</th>
                            <th>Itens</th>
                            <th>Valor Total</th>
                            <th>Endereço de Entrega</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="dropdown">
                                <a href="#" class="dropdown-toggle">Itens do Carrinho&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                @foreach ($order->cart->items as $item)
                                    <li>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="image">
                                                        <a href="{{ $item['url'] }}"><img alt="product" src="{{ $item['photo_url'] }}" height="50" width="50"></a>
                                                    </td>
                                                    <td class="name">
                                                        <a href="{{ $item['url'] }}">{{ $item['name'] }}</a>
                                                    </td>
                                                    <td class="quantity">
                                                        x&nbsp;{{ $item['amount'] }}
                                                    </td>
                                                    <td class="total">
                                                        {{ format_money($item['amount'] * $item['price']) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                            <td>{{ format_money($order->amount) }}</td>
                            <td class="dropdown">
                                <a href="#" class="dropdown-toggle">Endereço&nbsp;<b class="caret"></b></a>
                                <table class="dropdown-menu">
                                    <tbody>
                                        <tr>
                                            <td class="textright"><b>Endereço:&nbsp;</b></td>
                                            <td class="textright">{{ $order->address->address1 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="textright"><b>Bairro:&nbsp;</b></td>
                                            <td class="textright">{{ $order->address->address2 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="textright"><b>Complemento:&nbsp;</b></td>
                                            <td class="textright">{{ $order->address->address3 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="textright"><b>Cidade:&nbsp;</b></td>
                                            <td class="textright">{{ $order->address->city }}</td>
                                        </tr>
                                        <tr>
                                            <td class="textright"><b>Estado:&nbsp;</b></td>
                                            <td class="textright">{{ $order->address->state }}</td>
                                        </tr>
                                        <tr>
                                            <td class="textright"><b>País:&nbsp;</b></td>
                                            <td class="textright">{{ $order->address->country }}</td>
                                        </tr>
                                        <tr>
                                            <td class="textright"><b>CEP:&nbsp;</b></td>
                                            <td class="textright">{{ $order->address->postal_code }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section
@endsection