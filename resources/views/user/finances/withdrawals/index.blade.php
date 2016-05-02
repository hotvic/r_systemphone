@extends('layouts.user')

@section('title', 'Investimentos - Global Bet Brasil')

@section('breadcrumb')
    <a href="{{ route('user.irequests.index') }}" class="tip-bottom"><i class="glyphicon glyphicon-usd"></i> Finanças</a>
    <a class="tip-bottom"><i class="glyphicon glyphicon-minus"></i> Saques</a>
@endsection

@section('content')
    <div class="row">
    @include('partials.user.sidebar')
        <div class="col-md-9">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></span>

                    <h5>Saques</h5>
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
                            @foreach ($withdrawals as $withdrawal)
                                <tr>
                                    <td>{{ $withdrawal->id }}</td>
                                    <td>{{ $withdrawal->user->name }}</td>
                                    <td>{{ $withdrawal->user->email }}</td>
                                    <td>{{ format_money($withdrawal->amount) }}</td>
                                    <td>{{ $withdrawal->created_at }}</td>
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
                                    {!! $withdrawals->links(); !!}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection