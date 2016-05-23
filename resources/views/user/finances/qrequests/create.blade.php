@extends('layouts.user')

@section('title', 'Adquirir Cota')

@section('breadcrumb')
    <li class="breadcrumb-current-item">Adquirir Cota</li>
@endsection

@section('content')
    <div class="row">
        {{-- <div class="col-md-12">
            <span class="h3">Você pode investir usando seu saldo atual (<span class="small text-success">{{ format_money($balance) }}</span>).</span>
            <a href="{{ route('user.investments.re') }}" class="btn btn-link">Investir usando saldo</a>
        </div> --}}
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-plus"></span>
                <span class="panel-title">Adquirir Cota</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{ route('user.finance.qrequests.store') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('howmuch') ? ' has-error' : '' }}">
                                <label for="howmuch">Quantidade</label>
                                <input type="text" id="howmuch" name="howmuch" class="form-control" placeholder="Quantas cotas" value="{{ old('howmuch') }}">
                            @if ($errors->has('howmuch'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('howmuch') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('receipt') ? ' has-error' : '' }}">
                                <label for="receipt">Comprovante (< 2MB)</label>
                                <input type="file" id="receipt" name="receipt">
                            @if ($errors->has('receipt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('receipt') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('quota') ? ' has-error' : '' }}">
                                <label for="quota">Cota</label>
                                <select id="quota" name="quota" class="form-control">
                                @foreach($quotas as $quota)
                                    <option value="{{ $quota->id }}">{{ $quota->text }} ({{ format_money($quota->amount) }})</option>
                                @endforeach
                                </select>
                            @if ($errors->has('quota'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('quota') }}</strong>
                                </span>
                            @endif
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
@endsection