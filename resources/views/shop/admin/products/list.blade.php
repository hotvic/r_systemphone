@extends('shop.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Produtos</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Slug</th>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th>Em Estoque</th>
                                    <th>Data Criação</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ format_money($product->price) }}</td>
                                    <td>{{ $product->in_stock }}</td>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection