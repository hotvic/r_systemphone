@extends('layouts.basic')

@section('title', 'Registrar')

@section('content')
    <section id="content_wrapper">
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        <section id="content">
            <div class="allcp-form theme-primary mw320" id="login">
                <div class="bg-primary mw600 text-center mb20 br3 pt15 pb10">
                    <img src="/images/logo.png" alt=""/>
                </div>
                <div class="panel mw320">
                    <form class="clearfix centerform"  role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="field prepend-icon">
                                <input type="text" class="gui-input" name="username" value="{{ old('username') }}" placeholder="Nome de Usuário">
                                <span class="field-icon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </label>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="field prepend-icon">
                                <input type="text" class="gui-input" name="name" value="{{ old('name') }}" placeholder="Nome Completo">
                                <span class="field-icon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </label>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="field prepend-icon">
                                <input type="email" class="gui-input" name="email" value="{{ old('email') }}" placeholder="Endereço de E-Mail">
                                <span class="field-icon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </span>
                            </label>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="field prepend-icon">
                                <input type="password" class="gui-input" name="password" placeholder="Senha">
                                <span class="field-icon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                            </label>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="field prepend-icon">
                                <input type="password" class="gui-input" name="password_confirmation" placeholder="Confirme sua Senha">
                                <span class="field-icon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                            </label>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                        </div>

                        <div class="form-group{{ $errors->has('referred_by') ? ' has-error' : '' }}">
                            <label for="referred_by" class="field prepend-icon">
                                <input type="text" class="gui-input" name="referred_by" value="{{ old('referred_by') }}" placeholder="Indicado">
                                <span class="field-icon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                            </label>

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
                </div>
            </div>
        </section>
    </section>
@endsection
