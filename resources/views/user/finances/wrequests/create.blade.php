@extends('layouts.user')

@section('title', 'Sacar - Global Bet Brasil')

@section('content')
    <div class="row">
    @include('partials.user.sidebar')
        <div class="col-md-9">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>

                    <h5>Novo Saque</h5>
                </div>
                <div class="widget-content">
                    <div class="row">
                        <form action="{{ route('user.wrequests.store') }}" method="POST">
                            {!! csrf_field() !!}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <p class="form-control-static">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <label for="email">Quantidade</label>
                                    <div class="input-group">
                                        <input type="text" name="amount" id="amount" class="form-control" placeholder="Valor incluindo centavos" value="{{ old('amount') }}">
                                        <span class="input-group-addon" id="amount-display">$ 0,00</span>
                                    </div>
                                </div>
                            @if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                                    <label for="to">E-Mail de Saque (Neteller)</label>
                                    <input type="email" name="to" value="{{ old('to') }}" class="form-control" placeholder="E-Mail Neteller">
                                </div>
                            @if ($errors->has('to'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('to') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Descrição</label>
                                    <p class="form-control-static">{{ $description }}</p>
                                </div>
                            </div>

                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="form-control btn btn-success btn-block">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Adicionar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var manifest = {
            data: {
                amount: 0
            },
            ui: {
                '#amount': {bind: 'amount'},
                '#amount-display': {
                    bind: function (data) {
                        var re = /([0-9]*)([0-9]{2})$/;
                        var val = data.amount.match(re);

                        return data.amount.length < 2 ? '$ 0.00' : '$ ' + (typeof val[1] != "null" ? val[1] : 0 ) + '.' + val[2];
                    },
                    watch: '#amount'
                }
            }
        };

        $('form').my(manifest);
    </script>
@endsection