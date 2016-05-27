@extends('layouts.user')

@section('title', 'Adquirir Cota')

@section('breadcrumb')
    <li class="breadcrumb-current-item">Adquirir Cota</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h5>Faça um depóstio em uma das seguintes contas, em seguida anexe o comprovante no forumlário abaixo.</h5>
        </div>
        <div class="col-md-6">
            <div class="panel-group" id="account-group-1" role="tablist" aria-multiselectable="true">
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingBitCoin">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#account-group-1" href="#collapseBitCoin" aria-expanded="true" aria-controls="collapseBitCoin">BitCoin</a>
                        </span>
                    </div>
                    <div id="collapseBitCoin" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBitCoin">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Carteira:</strong> 1BMahmLfxsdEakUDxqiPb7TLM6jchhKF5E</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingNeteller">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#account-group-1" href="#collapseNeteller" aria-expanded="true" aria-controls="collapseNeteller">Neteller</a>
                        </span>
                    </div>
                    <div id="collapseNeteller" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNeteller">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>E-Mail:</strong> hamiltoncjunior@hotmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingPayza">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#account-group-1" href="#collapsePayza" aria-expanded="true" aria-controls="collapsePayza">Payza</a>
                        </span>
                    </div>
                    <div id="collapsePayza" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayza">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>E-Mail:</strong> hamiltoncjunior72@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingPayer">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#account-group-1" href="#collapsePayer" aria-expanded="true" aria-controls="collapsePayer">Payer</a>
                        </span>
                    </div>
                    <div id="collapsePayer" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayer">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Conta:</strong> P36538811</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingBradesco">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#account-group-1" href="#collapseBradesco" aria-expanded="true" aria-controls="collapseBradesco">Bradesco</a>
                        </span>
                    </div>
                    <div id="collapseBradesco" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBradesco">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Agência:</strong> 0356-5</li>
                            <li class="list-group-item"><strong>Conta:</strong> 1004165-1</li>
                            <li class="list-group-item"><strong>Tipo de Conta:</strong> Poupança</li>
                            <li class="list-group-item"><strong>Titular:</strong> Sandro Gilberto Brinker</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingBB">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseBB" aria-expanded="true" aria-controls="collapseBB">Banco do Brasil</a>
                        </span>
                    </div>
                    <div id="collapseBB" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingBB">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Agência:</strong> 0405-7</li>
                            <li class="list-group-item"><strong>Conta:</strong> 59282-X</li>
                            <li class="list-group-item"><strong>Tipo de Conta:</strong> Corrente</li>
                            <li class="list-group-item"><strong>Titular:</strong> Sandro Gilberto Brinker</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingCaixa">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseCaixa" aria-expanded="true" aria-controls="collapseCaixa">Caixa Econômica</a>
                        </span>
                    </div>
                    <div id="collapseCaixa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCaixa">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Agência:</strong> 3077</li>
                            <li class="list-group-item"><strong>Conta:</strong> 00014215-8</li>
                            <li class="list-group-item"><strong>Tipo de Conta:</strong> 013 - Poupança</li>
                            <li class="list-group-item"><strong>Titular:</strong> Sandro Gilberto Brinker</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingSkyrill">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSkyrill" aria-expanded="true" aria-controls="collapseSkyrill">Skyrill</a>
                        </span>
                    </div>
                    <div id="collapseSkyrill" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSkyrill">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>E-Mail:</strong> hamiltoncjunior72@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="heading24Dollar">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse24Dollar" aria-expanded="true" aria-controls="collapse24Dollar">2Pay4You (Dollar)</a>
                        </span>
                    </div>
                    <div id="collapse24Dollar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading24Dollar">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Conta:</strong> 896342junior1</li>
                        </ul>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="heading24Euro">
                        <span class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse24Euro" aria-expanded="true" aria-controls="collapse24Euro">2Pay4You (Euro)</a>
                        </span>
                    </div>
                    <div id="collapse24Euro" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading24Euro">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Conta:</strong> 896342junior</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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