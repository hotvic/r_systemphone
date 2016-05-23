@extends('layouts.user')

@section('title', 'Perfil')

@section('breadcrumb')
    <li class="breadcrumb-current-item">Perfil</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-user"></span>
                <span class="panel-title">Perfil</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{ route('user::profile') }}" method="POST">
                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Nome de Usuário</label>
                                <p class="form-control-static">{{ $user->username }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Nome</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="referred_by">Referência</label>
                                <p class="form-control-static">{{ $user->referred_by }}</p>
                            </div>
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="form-control btn btn-success btn-block">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection