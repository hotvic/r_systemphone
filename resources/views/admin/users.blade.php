@extends('layouts.admin')

@section('title', 'Usuários')

@section('breadcrumb')
    <li class="breadcrumb-current-item">Usuários</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-user"></span>
                <span class="panel-title">Usuários</span>
            </div>
            <div class="panel-body">
                <div class="row clearfix">
                    <div class="pull-right">
                        <form class="navbar-form search-form square" role="search">
                            <div class="form-group addon">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Nome ou E-Mail">
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
                                <th>Nome de Usuário</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Registrado</th>
                                <th>Cotas</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $usr)
                            <tr data-user="{{ $usr->toJson() }}" data-toggle="popover-data">
                                <td>{{ $usr->id }}</td>
                                <td>{{ $usr->username }}</td>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->created_at->format('d/m/Y G:i') }}</td>
                                <td>{{ $usr->quotas()->count() }}</td>
                                <td>
                                    <a href="{{ route('admin::update_user', ['id' => $usr->id]) }}">Editar</a>
                                    |
                                    <a data-href="{{ route('admin::delete_user', ['id' => $usr->id]) }}" class="delete-confirmation">Apagar</a>
                                    <br>
                                    <span>Novo:</span>
                                    <a href="{{ route('admin.finance.quotas.attach', ['user_id' => $usr->id]) }}">Attach Quota</a>
                                    |
                                    <a href="{{ route('admin.finance.earnings.create', ['user_id' => $usr->id]) }}">Ganho</a>
                                    |
                                    <a href="{{ route('admin.finance.withdrawals.create', ['user_id' => $usr->id]) }}">Saque</a>
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
                                {!! $clients->links() !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('[data-toggle=popover-data]').popover({
            container: 'body',
            content: function () {
                var data = $(this).data('user');

                $ul = $('<ul/>').addClass('list-group');

                $ul.append($('<li/>').addClass('list-group-item').html('<strong>CPF:</strong> ' + data.cpf));
                $ul.append($('<li/>').addClass('list-group-item').html('<strong>Saldo:</strong> $ ' + parseFloat(data.balance).toFixed(2)));
                $ul.append($('<li/>').addClass('list-group-item').html('<strong>Saldo E-Commerce:</strong> $ ' + parseFloat(data.e_funds).toFixed(2)));

                return $ul;
            },
            html: true,
            placement: 'top',
        });

        $('[data-toggle=popover-data]').hover(function () {
            $(this).popover('show');
        }, function () {
            $(this).popover('hide');
        });

        $('.delete-confirmation').confirmation({
            btnOkLabel: 'Apagar',
            btnCancelClass: 'Cancelar',
            singleton: true,
            popout: true,
            title: 'Você tem Certeza?',
            placement: 'top'
        });
    </script>
@endsection
