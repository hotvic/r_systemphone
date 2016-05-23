@extends('layouts.admin')

@section('title', 'Painel')

@section('content')
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li>
                <a href="{{ route('admin::index') }}">
                    <span class="glyphicon glyphicon-dashboard quick-actions-icon"></span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin::finances::index') }}">
                    <i class="fa fa-line-chart quick-actions-icon" aria-hidden="true"></i>
                    Gerenciar Finanças
                </a>
            </li>
            <li>
                <a href="{{ route('admin::users') }}">
                    <span class="glyphicon glyphicon-user quick-actions-icon"></span>
                    Gerenciar Usuários
                </a>
            </li>
        </ul>
    </div>

    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span></span>

                <h5>Estatísticas do Site</h5>

                <div class="buttons">
                    <a href="#" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</a>
                </div>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-8">
                        <canvas id="siteChart"></canvas>
                        <script type="text/javascript">
                            {{-- var ctx = $('#siteChart');

                            var chart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Total'],
                                    datasets: [{
                                        label: 'Usuários',
                                        data: [{{ $total_users }}]
                                    }, {
                                        label: 'Investimentos',
                                        data: [{{ $total_investments }}]
                                    }, {
                                        label: 'Saques',
                                        data: [{{ $total_earnings }}]
                                    }, {
                                        label: 'Pagamentos',
                                        data: [{{ $total_withdrawals }}]
                                    }]
                                }
                            }); --}}
                        </script>
                    </div>
                    <div class="col-md-4">
                        <ul class="stat-boxes2">
                            <li>
                                <div class="right">
                                    <strong>{{-- $total_users --}}</strong>
                                    Usuários
                                </div>
                            </li>
                            <li>
                                <div class="right">
                                    <strong>{{-- $total_investments --}}</strong>
                                    Investimentos
                                </div>
                            </li>
                            <li>
                                <div class="right">
                                    <strong>{{-- $total_earnings --}}</strong>
                                    Saques
                                </div>
                            </li>
                            <li>
                                <div class="right">
                                    <strong>{{-- $total_withdrawals --}}</strong>
                                    Pagamentos
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection