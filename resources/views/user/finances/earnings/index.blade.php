@extends('layouts.user')

@section('title', 'Ganhos - Global Bet Brasil')

@section('breadcrumb')
    <a href="{{ route('user.irequests.index') }}" class="tip-bottom"><i class="glyphicon glyphicon-usd"></i> Finanças</a>
    <a class="tip-bottom"><i class="glyphicon glyphicon-plus"></i> Ganhos</a>
@endsection

@section('content')
    <div class="row">
    @include('partials.user.sidebar')
        <div class="col-md-9">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>

                    <h5>Ganhos</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid clearfix">
                        <div class="pull-right">
                            <form role="search">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="s" placeholder="Descrição">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th>Quantiade</th>
                                    <th>Ganhado Em</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($earnings as $earning)
                                <tr>
                                    <td>{{ $earning->id }}</td>
                                    <td>{{ $earning->type }}</td>
                                    <td>{{ format_money($earning->amount) }}</td>
                                    <td>{{ $earning->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row-fluid">
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
    </div>
@endsection