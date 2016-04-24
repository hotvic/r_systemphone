@extends('layouts.admin')

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
                <a href="{{ route('admin::finances') }}">
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
            <li>
                <a href="#">
                    <i class="fa fa-calendar quick-actions-icon" aria-hidden="true"></i>
                    Pagamentos da Semana
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
                <div class="row-fluid">
                    <div class="col-md-8">
                        <div class="chart"></div>
                    </div>
                    <div class="col-md-4">
                        <ul class="stat-boxes2">
                            <li>
                                <div class="left">
                                    <canvas data-toggle="plot" data-plot-type="line-neutral" data-plot-data="[2,4,9,7,12,10,12]" width="50" height="24"></canvas>
                                    +10%
                                </div>
                                <div class="right">
                                    <strong>15.598</strong>
                                    Visítas
                                </div>
                            </li>
                            <li>
                                <div class="left">
                                    <span class="peity_line_neutral">10,15,8,14,13,10,10,15</span>
                                    10%
                                </div>
                                <div class="right">
                                    <strong>150</strong>
                                    Novos Usuários
                                </div>
                            </li>
                            <li>
                                <div class="left">
                                    <span class="peity_bar_bad">3,5,6,16,8,10,6</span>
                                    -40%
                                </div>
                                <div class="right">
                                    <strong>$ 13.572,13</strong>
                                    Faturamento do Dia
                                </div>
                            </li>
                            <li>
                                <div class="left">
                                    <span class="peity_line_good">12,6,9,13,14,10,17</span>
                                    +60%
                                </div>
                                <div class="right">
                                    <strong>$ 172.768,94</strong>
                                    Fatruramento do Mês
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