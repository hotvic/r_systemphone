@extends('layouts.user')

@section('title', 'Ganhos')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('user.finance.qrequests.index') }}">Finanças</a>
    </li>
    <li class="breadcrumb-current-item">Ganhos</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-plus"></span>
                <span class="panel-title">Ganhos</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Descrição</th>
                                <th>Quantiade</th>
                                <th>Ganhado Em</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($earnings as $earning)
                            <tr>
                                <td>{{ $earning->id }}</td>
                                <td>{{ $earning->description }}</td>
                                <td>{{ format_money($earning->amount) }}</td>
                                <td>{{ $earning->created_at->format('d/m/Y G:i') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="clearfix">
                        <div class="pull-right">
                            <nav>
                                {!! $earnings->links(); !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
