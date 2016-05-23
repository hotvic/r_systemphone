@extends('layouts.user')

@section('title', 'Painel')

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-tasks"></span>
                <span class="panel-title">Estatísticas do Usuário</span>
            </div>
            <div class="panel-body">
                <canvas width="400" height="400"></canvas>
            </div>
        </div>
    </div>
@endsection