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

                        <div class="panel-body pn mv10">

                            <div class="section{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="field prepend-icon">
                                    <input type="email" name="email" id="email" class="gui-input" placeholder="E-Mail" value="{{ old('email') }}">
                                    <span class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
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