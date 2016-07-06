@extends('shop.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Ordens</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Itens</th>
                                    <th>Endereço</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Pedido Em</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td class="dropdown">
                                        <a href="#" data-toggle="dropdown">{{ $order->user->username }}&nbsp;<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Nome:&nbsp;</b></td>
                                                            <td>{{ $order->user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>E-Mail:&nbsp;</b></td>
                                                            <td>{{ $order->user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>CPF:&nbsp;</b></td>
                                                            <td>{{ $order->user->cpf }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Celular:&nbsp;</b></td>
                                                            <td>{{ $order->user->phone_number }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="dropdown">
                                        <a href="#" data-toggle="dropdown">Carrinho&nbsp;<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <table>
                                                    <tbody>
                                                    @foreach ($order->cart->items as $item)
                                                        <tr>
                                                            <td><b>{{ $item['name'] }}:&nbsp;</b></td>
                                                            <td>{{ $item['amount'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="dropdown">
                                        <a href="#" data-toggle="dropdown">Endereço&nbsp;<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Endereço:&nbsp;</b></td>
                                                            <td>{{ $order->address->address1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Bairro:&nbsp;</b></td>
                                                            <td>{{ $order->address->address2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Complemento:&nbsp;</b></td>
                                                            <td>{{ $order->address->address3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>CEP:&nbsp;</b></td>
                                                            <td>{{ $order->address->postal_code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Cidade:&nbsp;</b></td>
                                                            <td>{{ $order->address->city }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Estado:&nbsp;</b></td>
                                                            <td>{{ $order->address->state }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>{{ format_money($order->amount) }}</td>
                                    <td>{{ $order->status == 'review' ? 'Aguardando Envio' : 'Desconhecido' }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="dropdown">
                                        <a href="#" data-toggle="dropdown">Marcar como Enviado</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form method="post" action="{{ route('shop.admin.orders.status', ['id' => $order->id]) }}" style="padding: 10px;">
                                                    <input type="hidden" name="status" value="sent">

                                                    <div class="form-group">
                                                        <label>Realmente deseja marcar a ordem como enviada?</label>
                                                    </div>

                                                    <div style="display: flex; justify-content: flex-end;">
                                                        <button type="submit" class="btn btn-warning">Marcar</button>
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection