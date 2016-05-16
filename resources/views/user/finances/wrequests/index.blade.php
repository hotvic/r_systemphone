@extends('layouts.user')

@section('title', 'Pendentes - Saques - Global Bet Brasil')

@section('breadcrumb')
    <a href="{{ route('user.irequests.index') }}" class="tip-bottom"><i class="glyphicon glyphicon-usd"></i> Finanças</a>
    <a class="tip-bottom"><i class="glyphicon glyphicon-minus"></i>  Saques Pendentes</a>
@endsection

@section('content')
    <div class="row">
    @include('partials.user.sidebar')
        <div class="col-md-9">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></span>

                    <h5>Saques Pendentes</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Quantiade</th>
                                    <th>Requerido Em</th>
                                    <th>Para</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $request->id }}</td>
                                    <td>{{ format_money($request->amount) }}</td>
                                    <td>{{ $request->created_at }}</td>
                                    <td>{{ $request->to }}</td>
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
    </div>
@endsection