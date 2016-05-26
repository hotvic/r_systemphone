@extends('layouts.admin')

@section('title', 'Editar Usuário')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('admin::users') }}">Usuários</a>
    </li>
    <li class="breadcrumb-current-item">Editar Usuário</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-user"></span>
                <span class="panel-title">Editanto: {{ $usr->name }} &lt;{{ $usr->email }}&gt;</span>
            </div>
            <div class="panel-body">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthday">Data Nascimento</label>
                                <input type="text" name="birthday" value="{{ $usr->birthday }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">Número Celular</label>
                                <input type="text" name="phone_number" value="{{ $usr->phone_number }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank">Banco</label>
                                <input type="text" name="bank" value="{{ $usr->bank }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agency">Agência</label>
                                <input type="text" name="agency" value="{{ $usr->agency }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account">Conta</label>
                                <input type="text" name="account" value="{{ $usr->account }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_type">Agência</label>
                                <select name="account_type" class="form-control">
                                    <option value="0"{{ $usr->account_type == '0' ? ' selected' : '' }}>Corrente</option>
                                    <option value="1"{{ $usr->account_type == '1' ? ' selected' : '' }}>Poupança</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="holder">Titular</label>
                                <input type="text" name="holder" value="{{ $usr->holder }}" class="form-control">
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
                            <input type="checkbox" id="active" name="active" {{ $usr->active == true ? ' checked' : '' }}>
                            <label for="active">Ativo</label>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="confirmed" name="confirmed" {{ $usr->confirmed == true ? ' checked' : '' }}>
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