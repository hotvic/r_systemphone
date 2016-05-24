@extends('layouts.admin')

@section('title', 'Saques')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('admin::finances::index') }}">Finanças</a>
    </li>
    <li class="breadcrumb-current-item">Saques</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-minus"></span>
                <span class="panel-title">Saques</span>
            </div>
            <div class="panel-body">
                <div class="row clearfix">
                    <div class="pull-right">
                        <form class="navbar-form search-form square" role="search">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Descrição">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Para (E-Mail Neteller)</th>
                                <th>Quantiade</th>
                                <th>Descrição</th>
                                <th>Sacado Em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($withdrawals as $withdrawal)
                            <tr>
                                <td>{{ $withdrawal->id }}</td>
                                <td>{{ $withdrawal->user->name }}</td>
                                <td>{{ $withdrawal->user->email }}</td>
                                <td>{{ $withdrawal->to }}</td>
                                <td>{{ format_money($withdrawal->amount) }}</td>
                                <td>{{ $withdrawal->description }}</td>
                                <td>{{ $withdrawal->created_at }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.withdrawals.destroy', ['id' => $withdrawal->id]) }}" class="form-horizontal" style="display: inline;">
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
                <div class="row">
                    <div class="clearfix">
                        <div class="pull-right">
                            <nav>
                                {!! $withdrawals->links() !!}
                            </nav>
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
    </div>
@endsection