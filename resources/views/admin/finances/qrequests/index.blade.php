@extends('layouts.admin')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('admin::finances::index') }}">Finanças</a>
    </li>
    <li class="breadcrumb-link">
        <a href="{{ route('admin.finance.quotas.index') }}">Cotas</a>
    </li>
    <li class="breadcrumb-current-item">Pedidos de Cota</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-share"></span>
                <span class="panel-title">Pedidos de Cota</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Quantiade</th>
                                <th>Comprado Em</th>
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
                                <td>{{ $request->howmuch }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>{{ $request->status == 0 ? 'Pendente' : ($request->status == 1 ? 'Aprovado' : 'Rejeitado') }}</td>
                                <td>
                                    <a href="{{ route('admin.finance.qrequests.show', ['id' => $request->id]) }}#ext=.png" data-toggle="lightbox" data-title="Comprovante">Comprovante</a>
                                    <br>
                                    <a href="{{ route('admin.finance.qrequests.accept', ['id' => $request->id]) }}" data-toggle="lightbox" data-title="Aceitar">Aceitar</a>
                                    <br>
                                    <a href="{{ route('admin.finance.qrequests.reject', ['id' => $request->id]) }}" data-toggle="lightbox" data-title="Rejeitar">Rejeitar</a>
                                    <br>
                                    <form method="POST" action="{{ route('admin.finance.qrequests.destroy', ['id' => $request->id]) }}" class="form-horizontal" style="display: inline;">
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