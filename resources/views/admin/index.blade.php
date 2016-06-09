@extends('layouts.admin')

@section('title', 'Painel')

@section('breadcrumb')
    <li class="breadcrumb-current-item">Painel</li>
@endsection

@section('content')
    <div class="chute chute-center">
        <div class="row">
            <div class="col-sm-3 col-xl-4">
                <div class="panel panel-tile info-block info-block-bg-success">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-5 ph10 text-center">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="col-xs-7 pl35 prn text-center">
                                <h2>{{ $stats->get('total.quotas') }}</h2>
                                <h6>Cotas</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="info-block-stat">
                                    <span>Cotas Ativas</span>
                                    <span>{{ $stats->get('active.quotas') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-4">
                <div class="panel panel-tile info-block info-block-bg-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-5 ph10 text-center">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-xs-7 pl35 text-center">
                                <h2>{{ $stats->get('total.users') }}</h2>
                                <h6>Indicados</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="info-block-stat">
                                    <span>Membros Ativos</span>
                                    <span>{{ $stats->get('active.users') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-xl-4">
                <div class="panel panel-tile info-block info-block-bg-warning">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-5 ph10 text-center">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="col-xs-7 pl10 text-center">
                                <h2>{{ $stats->get('balance.total') }}</h2>
                                <h6>Saldo Total</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="info-block-stat">
                                    <span>Saldo Líquido</span>
                                    <span>{{ $stats->get('balance.withdrawable') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <canvas id="siteChart"></canvas>
                            <script type="text/javascript">
                                var ctx = $('#siteChart');

                                var chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Total'],
                                        datasets: [{
                                            label: 'Usuários',
                                            data: [{{ $stats->get('total.users') }}]
                                        }, {
                                            label: 'Cotas',
                                            data: [{{ $stats->get('total.quotas') }}]
                                        }, {
                                            label: 'Saques',
                                            data: [{{ $stats->get('total.withdrawals') }}]
                                        }, {
                                            label: 'Pagamentos',
                                            data: [{{ $stats->get('total.earnings') }}]
                                        }]
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-4">
                            <ul class="stat-boxes">
                                <li>
                                    <div class="left"></div>
                                    <div class="right">
                                        <strong>{{ $stats->get('total.users') }}</strong>
                                        Usuários
                                    </div>
                                </li>
                                <li>
                                    <div class="left"></div>
                                    <div class="right">
                                        <strong>{{ $stats->get('total.quotas') }}</strong>
                                        Cotas
                                    </div>
                                </li>
                                <li>
                                    <div class="left"></div>
                                    <div class="right">
                                        <strong>{{ $stats->get('total.withdrawals') }}</strong>
                                        Saques
                                    </div>
                                </li>
                                <li>
                                    <div class="left"></div>
                                    <div class="right">
                                        <strong>{{ $stats->get('total.earnings') }}</strong>
                                        Pagamentos
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
