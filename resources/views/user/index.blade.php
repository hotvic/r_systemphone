@extends('layouts.user')

@section('title', 'Painel')

@section('content')
    <div class="chute chute-center">
        <div class="row">
            <div class="col-sm-4 col-xl-3">
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
            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile info-block info-block-bg-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-5 ph10 text-center">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-xs-7 pl35 text-center">
                                <h2>{{ $stats->get('total.references') }}</h2>
                                <h6>Indicados</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="info-block-stat">
                                    <span>Membros Ativos</span>
                                    <span>{{ $stats->get('active.references') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile info-block info-block-bg-warning">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-5 ph10 text-center">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="col-xs-7 pl35 text-center">
                                <h2>{{ $stats->get('balance.total') }}</h2>
                                <h6>Saldo Total</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="info-block-stat">
                                    <span>Disponivel para Saque</span>
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
                <div class="panel-heading">
                    <span class="panel-icon glyphicon glyphicon-tasks"></span>
                    <span class="panel-title">Estatísticas do Usuário <span class="pull-right"><a href="{{ url('/register/' . $user->username) }}">{{ url('/register/' . $user->username) }}</a></span>
                </div>
                <div class="panel-body">
                    <canvas width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection