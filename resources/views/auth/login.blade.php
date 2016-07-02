@extends('layouts.basic')

@section('title', 'Login')

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

                    <form method="POST" action="{{ url('/login') }}" id="form-login">
                        {!! csrf_field() !!}

                        <input type="hidden" name="redirectPath" value="{{ request()->input('redirectPath') }}">

                        <div class="panel-body pn mv10">

                            <div class="section{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="field prepend-icon">
                                    <input type="text" name="username" id="username" class="gui-input" placeholder="Nome de Usuário" value="{{ old('username') }}">
                                    <span class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </label>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                            </div>

                            <div class="section{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="field prepend-icon">
                                    <input type="password" name="password" id="password" class="gui-input"
                                           placeholder="Senha">
                                    <span class="field-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            </div>

                            <div class="section">
                                <div class="bs-component pull-left pt5">
                                    <div class="radio-custom radio-primary mb5 lh25">
                                        <input type="radio" id="remember" name="remember">
                                        <label for="remember">Lembrar</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-bordered btn-primary pull-right">Log in</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection