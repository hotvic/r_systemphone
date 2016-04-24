@extends('layouts.basic')

@section('content')
    <form class="centerform clearfix" method="POST" action="{{ url('/password/reset') }}">
        {!! csrf_field() !!}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group normal_text">
            <h2 class="title">Global Bet Brasil</h2>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group" >
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="E-Mail">
            </div>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" name="password" placeholder="Senha" />
            </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha">
            </div>

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group inline-align">
            <div class="inline-align-left"></div>
            <div class="inline-align-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-refresh"></i>
                    Salvar Nova Senha
                </button>
            </div>
        </div>
    </form>
@endsection
