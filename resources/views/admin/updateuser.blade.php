@extends('layouts.admin')

@section('title', 'Editar Usuário - ')

@section('breadcrumb')
    <a href="{{ route('admin::users') }}" class="tip-bottom"><i class="glyphicon glyphicon-user"></i> Usuários</a>
    <a class="tip-bottom">Editar Usuário</a>
@endsection

@section('content')
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>

                <h5>Editanto: {{ $usr->name }} &lt;{{ $usr->email }}&gt;</h5>
            </div>
            <div class="widget-content">
                <div class="row">
                    <form action="{{ route('admin::update_user', ['id' => $usr->id]) }}" method="POST">
                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Nome de Usuário</label>
                                <input type="text" name="username" value="{{ $usr->username }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" value="{{ $usr->email }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Nome</label>
                                <input type="text" name="name" value="{{ $usr->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="referred_by">Referência</label>
                                <input type="text" name="referred_by" value="{{ $usr->referred_by }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation">Confirmar Senha</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <input type="checkbox" id="active" name="active" data-toggle="switch"{{ $usr->active == true ? ' checked' : '' }}>
                            <label for="active">Ativo</label>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="confirmed" name="confirmed" data-toggle="switch"{{ $usr->confirmed == true ? ' checked' : '' }}>
                            <label for="confirmed">Confirmado</label>
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