@extends('layouts.admin')

@section('title', 'Pendentes - Saques')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('admin::finances::index') }}">Finanças</a>
    </li>
    <li class="breadcrumb-link">
        <a href="{{ route('admin.finance.withdrawals.index') }}">Saques</a>
    </li>
    <li class="breadcrumb-current-item">Pendentes</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-minus"></span>
                <span class="panel-title">Pedidos de Saque</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Conta</th>
                                <th>Quantiade</th>
                                <th>Pedido Em</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($requests as $request)
                            <tr data-wrequest="{{ $request->toJson() }}" class="row-data">
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user->name }}</td>
                                <td>{{ $request->user->email }}</td>
                                <td>
                                    <button class="btn btn-link account-popover">Conta</button>
                                </td>
                                <td>{{ format_money($request->amount) }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>{{ $request->status == 0 ? 'Pendente' : ($request->status == 1 ? 'Aprovado' : 'Rejeitado') }}</td>
                                <td>
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.finance.wrequests.accept', ['id' => $request->id]) }}" data-toggle="lightbox" data-title="Aceitar">Aceitar</a>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.finance.wrequests.reject', ['id' => $request->id]) }}" data-toggle="lightbox" data-title="Rejeitar">Rejeitar</a>
                                    </div>
                                    <div class="col-md-12">
                                        <form method="POST" action="{{ route('admin.finance.wrequests.destroy', ['id' => $request->id]) }}" class="form-horizontal" style="display: inline;">
                                            {!! csrf_field() !!}

                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="delete-form-confirmation nopadding btn btn-link">Apagar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="clearfix">
                        <div class="pull-right">
                            {!! $requests->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.delete-form-confirmation').confirmation({
            btnOkLabel: 'Apagar',
            btnCancelClass: 'Cancelar',
            singleton: true,
            popout: true,
            title: 'Você tem Certeza?',
            placement: 'top',
            onConfirm: function (event, elem) {
                $(elem).parent().submit();
            }
        });

        $('.account-popover').popover({
            container: 'body',
            content: function () {
                var data = $(this).closest('.row-data').data('wrequest');

                $ta = $('<textarea/>').attr('cols', 55).prop('disabled', true).text(data.account_info);

                var lc = 0;
                $.each(data.account_info.split("\n"), function (index, line) {
                    var rbl = Math.ceil(line.length / 55);

                    lc += rbl == 0 ? 1 : rbl;
                });

                $ta.attr('rows', lc);

                return $ta;
            },
            html: true,
            placement: 'top',
            trigger: 'click',
            template: '<div class="popover" style="max-width: 100%;" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>',
        });
    </script>
@endsection