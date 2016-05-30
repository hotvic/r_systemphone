@extends('layouts.user')

@section('title', 'Indicados')

@section('breadcrumb')
    <li class="breadcrumb-current-item">Indicados</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon fa fa-users"></span>
                <span class="panel-title">Indicados</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome de Usuário</th>
                                <th>E-Mail</th>
                                <th>Nome</th>
                                <th>Registrado</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($references as $reference)
                            <tr>
                                <td>{{ $reference->id }}</td>
                                <td>{{ $reference->username }}</td>
                                <td>{{ $reference->email }}</td>
                                <td>{{ $reference->name }}</td>
                                <td>{{ $reference->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="pull-right">
            <nav>
                {!! $references->links() !!}
            </nav>
        </div>
    </div>
@endsection