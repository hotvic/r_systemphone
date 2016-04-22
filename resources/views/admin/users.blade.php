@extends('layouts.admin')

@section('breadcrumb')
    <a href="{{ route('admin::users') }}" class="tip-bottom"><i class="glyphicon glyphicon-user"></i> Usuários</a>
@endsection

@section('content')
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>

                <h5>Usuários</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-Mail</th>
                                <th>Registrado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $usr)
                            <tr>
                                <td>{{ $usr->id }}</td>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin::update_user', ['id' => $usr->id]) }}">Editar</a>
                                    |
                                    <a data-href="{{ route('admin::delete_user', ['id' => $usr->id]) }}" class="delete-confirmation">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection