@extends('layouts.user')

@section('title', 'Cotas')

@section('breadcrumb')
    <li class="breadcrumb-link">
        <a href="{{ route('user.finance.qrequests.index') }}">Finanças</a>
    </li>
    <li class="breadcrumb-current-item">Cotas</li>
@endsection

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon glyphicon glyphicon-share"></span>
                <span class="panel-title">Cotas</span>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Texto</th>
                                <th>Quantiade</th>
                                <th>Comprada Em</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($quotas as $quota)
                            <tr>
                                <td>{{ $quota->id }}</td>
                                <td>{{ $quota->text }}</td>
                                <td>{{ format_money($quota->amount) }}</td>
                                <td>{{ $quota->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row-fluid">
                    <div class="clearfix">
                        <div class="pull-right">
                            <nav>
                                {!! $quotas->links() !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection