@extends('layouts.admin')

@section('title', 'Editar Usuário - ')

@section('breadcrumb')
    <a href="{{ route('admin::users') }}" class="tip-bottom"><i class="glyphicon glyphicon-user"></i> Usuários</a>
    <a class="tip-bottom">Editar Usuário</a>
@endsection

@section('content')
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>

                <h5>Editanto: {{ $usr->name }} &lt;{{ $usr->email }}&gt;</h5>
            </div>
            <div class="widget-content">
                <div class="row">
                    <form action="{{ route('admin::update_user', ['id' => $usr->id]) }}" method="POST">
                        {!! csrf_field() !!}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" value="{{ $usr->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Nome</label>
                                <input type="text" name="name" value="{{ $usr->name }}" class="form-control">
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
@endsection