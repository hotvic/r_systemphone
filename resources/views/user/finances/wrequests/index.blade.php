@extends('layouts.user')

@section('title', 'Pendentes - Saques')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('user.finance.qrequests.index') }}">Finanças</a>
    </li>
    <li class="breadcrumb-link">
        <a href="{{ route('user.finance.withdrawals.index') }}">Saques</a>
    </li>
    <li class="breadcrumb-current-item">Pendentes</li>
@endsection

@section('content')
@if (session()->has('success'))
    <div class="row">
        <div class="alert alert-success" role="alert">
            <strong>Sucesso!</strong> Requisição Saque Realizada com sucesso!
        </div>
    </div>
@endif

    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-minus"></span>
                <span class="panel-title">Saques Pendentes</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Quantiade</th>
                                <th>Conta</th>
                                <th>Requerido Em</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($requests as $request)
                            <tr data-wrequest="{{ $request->toJson() }}" class="row-data">
                                <td>{{ $request->id }}</td>
                                <td>{{ format_money($request->amount) }}</td>
                                <td><button class="btn btn-link account-popover">Conta</button></td>
                                <td>{{ $request->created_at->format('d/m/Y G:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="clearfix">
                        <div class="pull-right">
                            <nav>
                                {!! $requests->links(); !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.account-popover').popover({
            container: 'body',
            content: function () {
                var data = $(this).closest('.row-data').data('wrequest');

                $ta = $('<textarea/>').attr('rows', 10).attr('cols', 50).prop('disabled', true).text(data.account_info);

                return $ta;
            },
            html: true,
            placement: 'top',
            trigger: 'hover',
            template: '<div class="popover" style="max-width: 100%;" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>',
        });
    </script>
@endsection
