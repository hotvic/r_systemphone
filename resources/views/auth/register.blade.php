@extends('layouts.basic')

@section('content')
    <form class="clearfix centerform"  role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}

        <div class="form-group normal_text">
            <h2 class="title">Global Bet Brasil</h2>
        </div>

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Nome de Usuário">
            </div>

        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome Completo">
            </div>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope"></span>
                </span>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Endereço de E-Mail">
            </div>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input type="password" class="form-control" name="password" placeholder="Senha">
            </div>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua Senha">
            </div>

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('referred_by') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                <input type="text" class="form-control" name="referred_by" value="{{ old('referred_by') }}" placeholder="Indicado">
            </div>

        @if ($errors->has('referred_by'))
            <span class="help-block">
                <strong>{{ $errors->first('referred_by') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group inline-align">
            <div class="inline-align-left"></div>
            <div class="inline-align-right">
                <button type="submit" class="btn btn-success btn-block">
                    <i class="fa fa-btn fa-user"></i>
                    Criar Conta
                </button>
            </div>
        </div>
    </form>
@endsection
