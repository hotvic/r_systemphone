@extends('layouts.user')

@section('title', 'Investimentos - Global Bet Brasil')

@section('breadcrumb')
    <a href="{{ route('user.irequests.index') }}" class="tip-bottom"><i class="glyphicon glyphicon-usd"></i> Finanças</a>
    <a class="tip-bottom"><i class="glyphicon glyphicon-share"></i> Investimentos</a>
@endsection

@section('content')
    <div class="row">
    @include('partials.user.sidebar')
        <div class="col-md-9">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></span>

                    <h5>Investimentos</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid clearfix">
                        <div class="pull-right">
                            <form role="search">
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
                    <div class="row-fluid">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Quantiade</th>
                                    <th>Investido Em</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($investments as $investment)
                                <tr>
                                    <td>{{ $investment->id }}</td>
                                    <td>{{ $investment->user->name }}</td>
                                    <td>{{ $investment->user->email }}</td>
                                    <td>{{ format_money($investment->amount) }}</td>
                                    <td>{{ $investment->created_at }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.investments.destroy', ['id' => $investment->id]) }}" class="form-horizontal" style="display: inline;">
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
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                            <a href="?page={{ $cur_page - 1 }}" aria-label="Anterior">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    @foreach (paginate($cur_page, $investments_count) as $page)
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
    </div>
@endsection