@extends('layouts.basic')

@section('content')
    <form class="clearfix centerform" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}

        <div class="form-group normal_text">
            <h2 class="title">Global Bet Brasil</h2>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group" >
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}" />
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

        <div class="form-group">
            <div class="checkbox">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Lembrar</label>
            </div>
        </div>

        <div class="form-group inline-align">
            <span class="inline-align-left"><a href="{{ url('/password/reset') }}" class="btn btn-inverse btn-link" id="to-recover">Esqueceu a senha?</a></span>
            <span class="inline-align-right"><input type="submit" class="btn btn-success" value="Entrar" /></span>
        </div>
    </form>
@endsection