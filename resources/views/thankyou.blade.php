@extends('layouts.basic')

@section('content')
    <div class="centerform">
        <div class="form-group normal_text">
            <h2 class="title">Global Bet Brasil</h2>
        </div>

        <div class="form-group">
            <div class="alert alert-success" role="alert">
                <strong>Conta Criada com Sucesso!</strong>
                <p>
                    Porem é necessário a verificação do seu E-Mail.
                </p>
                <p>
                    Verifique seu E-Mail e siga as instuções no E-Mail de confirmação!
                </p>
            </div>
        </div>

        <div class="form-group inline-align">
            <div class="inline-align-left">
                <a href="{{ route('email::signup', ['id' => $user->id]) }}" class="btn btn-info">
                    <i class="fa fa-envelope"></i>
                    Reenviar E-Mail
                </a>
            </div>
            <div class="inline-align-right">
                <a href="{{ url('/login') }}" class="btn btn-info">
                    <i class="fa fa-sign-in"></i>
                    Entrar
                </a>
            </div>
        </div>
    </div>
@endsection