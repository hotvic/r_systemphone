@extends('layouts.admin')

@section('breadcrumb')
    <a href="{{ route('admin::finances::index') }}" class="tip-bottom"><i class="glyphicon glyphicon-usd"></i> Finanças</a>
    <a class="tip-bottom"><i class="glyphicon glyphicon-share"></i> Pedidos de Investimento</a>
@endsection

@section('content')
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></span>

                <h5>Pedidos de Investimento</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Quantiade</th>
                                <th>Comprovante</th>
                                <th>Investido Em</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user->name }}</td>
                                <td>{{ $request->user->email }}</td>
                                <td>{{ format_money($request->amount) }}</td>
                                <td>
                                    <a href="{{ route('admin.irequests.show', ['id' => $request->id]) }}#ext=.png" data-toggle="lightbox" data-title="Comprovante">Comprovante</a>
                                </td>
                                <td>{{ $request->created_at }}</td>
                                <td>{{ $request->status == 0 ? 'Pendente' : ($request->status == 1 ? 'Aprovado' : 'Rejeitado') }}</td>
                                <td>
                                    <a href="{{ route('admin.irequests.accept', ['id' => $request->id]) }}" data-toggle="lightbox" data-title="Aceitar">Aceitar</a>
                                    |
                                    <a href="{{ route('admin.irequests.reject', ['id' => $request->id]) }}" data-toggle="lightbox" data-title="Rejeitar">Rejeitar</a>
                                    |
                                    <form method="POST" action="{{ route('admin.investments.destroy', ['id' => $request->id]) }}" class="form-horizontal" style="display: inline;">
                                        {!! csrf_field() !!}

                                        <input type="hidden" name="_method" value="DELETE">

                                        <button type="submit" class="delete-form-confirmation nopadding btn btn-link">Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row-fluid">
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
    </script>
@endsection