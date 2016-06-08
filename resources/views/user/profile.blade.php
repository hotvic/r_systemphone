@extends('layouts.user')

@section('title', 'Perfil')

@section('breadcrumb')
    <li class="breadcrumb-current-item">Perfil</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-user"></span>
                <span class="panel-title">Perfil</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="{{ route('user::profile') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-md-3">
                                <span class="profile-picture-holder">
                                    <img src="{{ $user->profile_picture_url }}" class="profile-picture" alt="avatar">
                                </span>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }}">
                                    <label for="profile-picture">Alterar Foto de Perfil (<2MB; .jpeg ou .png)</label>
                                    <input type="file" id="profile-picture" name="profile_picture">
                                @if ($errors->has('profile_picture'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profile_picture') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Nome de Usuário</label>
                                <p class="form-control-static">{{ $user->username }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <p class="form-control-static">{{ $user->email }}</p>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <p class="form-control-static">{{ $user->cpf }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="referred_by">Referência</label>
                                <p class="form-control-static">{{ $user->referred_by }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="email">Nome</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                <label for="birthday">Data Nascimento</label>
                                <div class="input-group date" id="birthdayPicker">
                                    <input type="text" name="birthday" value="{{ $user->birthday }}" class="form-control">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            @if ($errors->has('birthday'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birthday') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label for="phone_number">Número Celular</label>
                                <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control">
                            @if ($errors->has('phone_number'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank">Banco</label>
                                <select class="form-control" name="bank">
                                    <option value="001"{{ $user->bank == '001' ? ' selected' : '' }}>Banco do Brasil (001)</option>
                                    <option value="237"{{ $user->bank == '237' ? ' selected' : '' }}>Bradesco (237)</option>
                                    <option value="104"{{ $user->bank == '104' ? ' selected' : '' }}>Caixa Econômica (104)</option>
                                    <option value="341"{{ $user->bank == '341' ? ' selected' : '' }}>Ítau (341)</option>
                                    <option value="033"{{ $user->bank == '033' ? ' selected' : '' }}>Santander (033)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('agency') ? ' has-error' : '' }}">
                                <label for="agency">Agência</label>
                                <input type="text" name="agency" value="{{ $user->agency }}" class="form-control">
                            @if ($errors->has('agency'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('agency') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">
                                <label for="account">Conta</label>
                                <input type="text" name="account" value="{{ $user->account }}" class="form-control">
                            @if ($errors->has('account'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('account') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_type">Tipo de Conta</label>
                                <select name="account_type" class="form-control">
                                    <option value="0"{{ $user->account_type == '0' ? ' selected=selected' : '' }}>Corrente</option>
                                    <option value="1"{{ $user->account_type == '1' ? ' selected=selected' : '' }}>Poupança</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('holder') ? ' has-error' : '' }}">
                                <label for="holder">Titular</label>
                                <input type="text" name="holder" value="{{ $user->holder }}" class="form-control">
                            @if ($errors->has('holder'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('holder') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Senha</label>
                                <input type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Senha</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="form-control btn btn-success btn-block">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#birthdayPicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>
@endsection
