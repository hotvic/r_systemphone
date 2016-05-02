@extends('layouts.user')

@section('title', 'Painel - Global Bet Brasil')

@section('content')
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li>
                <a href="{{ route('user::index') }}">
                    <span class="glyphicon glyphicon-dashboard quick-actions-icon"></span>
                    Painel
                </a>
            </li>
            <li>
                <a href="{{ route('user.irequests.create') }}">
                    <i class="fa fa-line-chart quick-actions-icon" aria-hidden="true"></i>
                    Gerenciar Finanças
                </a>
            </li>
            <li>
                <a href="{{ route('user::profile') }}">
                    <span class="glyphicon glyphicon-user quick-actions-icon"></span>
                    Perfil
                </a>
            </li>
        </ul>
    </div>

    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span></span>

                <h5>Estatísticas do Usuário</h5>

                <div class="buttons">
                    <a href="#" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</a>
                </div>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-12">
                        <canvas width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection