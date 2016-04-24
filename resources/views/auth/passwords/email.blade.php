@extends('layouts.basic')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="clearfix centerform" method="POST" action="{{ url('/password/email') }}">
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

        <div class="form-group inline-align">
            <div class="inline-align-left"></div>
            <div class="inline-align-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-envelope"></i>
                    Enviar E-Mail
                </button>
            </div>
        </div>
    </form>
@endsection
