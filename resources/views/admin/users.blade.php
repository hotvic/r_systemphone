@extends('layouts.admin')

@section('title', 'Usuários - ')

@section('breadcrumb')
    <a href="{{ route('admin::users') }}" class="tip-bottom"><i class="glyphicon glyphicon-user"></i> Usuários</a>
@endsection

@section('content')
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>

                <h5>Usuários</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid clearfix">
                    <div class="pull-right">
                        <form role="search">
                            <div class="form-group">
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
                <div class="row-fluid">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome de Usuário</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Registrado</th>
                                <th>Investimentos</th>
                                <th>Total @26w</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $usr)
                            <tr>
                                <td>{{ $usr->id }}</td>
                                <td>{{ $usr->username }}</td>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->created_at }}</td>
                                <td>{{ format_money($usr->investments()->sum('amount')) }}</td>
                                <td>{{ format_money($usr->investments()->sum('amount') + (($usr->investments()->sum('amount') * 0.18)  * 26)) }}</td>
                                <td>
                                    <a href="{{ route('admin::update_user', ['id' => $usr->id]) }}">Editar</a>
                                    |
                                    <a data-href="{{ route('admin::delete_user', ['id' => $usr->id]) }}" class="delete-confirmation">Apagar</a>
                                    <br>
                                    <span>Novo:</span>
                                    <a href="{{ route('admin.investments.create', ['user_id' => $usr->id]) }}">Investimento</a>
                                    |
                                    <a href="{{ route('admin.earnings.create', ['user_id' => $usr->id]) }}">Ganho</a>
                                    |
                                    <a href="{{ route('admin.withdrawals.create', ['user_id' => $usr->id]) }}">Saque</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row-fluid">
                    <div class="clearfix">
                        <div class="pull-right">
                            <nav>
                                <ul class="pagination">
                                    <li>
                                        <a href="?page={{ $cur_page - 1 }}" aria-label="Anterior">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @foreach (paginate($cur_page, $num_pages) as $page)
                                    <li{{ $page == $cur_page ? ' class=active' : '' }}><a href="?page={{ $page - 1 }}">{{ $page }}</a></li>
                                @endforeach
                                    <li>
                                        <a href="?page={{ ($cur_page - 1) + 1 }}" aria-label="Próximo">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                              </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection