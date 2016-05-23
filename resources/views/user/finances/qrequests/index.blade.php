@extends('layouts.user')

@section('title', 'Pendentes - Cotas')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('user.finance.qrequests.index') }}">Finanças</a>
    </li>
    <li class="breadcrumb-link">
        <a href="{{ route('user.finance.quotas.index') }}">Cotas</a>
    </li>
    <li class="breadcrumb-current-item">Pendentes</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-share"></span>
                <span class="panel-title">Cotas Pendentes</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Quantiade</th>
                                <th>Requerido Em</th>
                                <th>Comprovante</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->howmuch }}</td>
                                <td>{{ $request->created_at }}</td>
                                <td>
                                    <a href="{{ route('user.finance.qrequests.show', ['id' => $request->id]) }}#ext=.png" data-toggle="lightbox" data-title="Comprovante">Comprovante</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row-fluid">
                    <div class="clearfix">
                        <div class="pull-right">
                            <nav>
                                {!! $requests->links(); !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection