@extends('layouts.admin')

@section('breadcrumb')
    <a href="{{ route('admin::finances::index') }}" class="tip-bottom"><i class="glyphicon glyphicon-usd"></i> Finanças</a>
    <a class="tip-bottom"><i class="glyphicon glyphicon-copy"></i> Ganhos</a>
@endsection

@section('content')
    <div class="row">
    @include('partials.sidebar')

        <div class="col-md-9">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span></span>

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
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Quantiade</th>
                                    <th>Ganho Em</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($earnings as $earning)
                                <tr>
                                    <td>{{ $earning->id }}</td>
                                    <td>{{ $earning->user->name }}</td>
                                    <td>{{ $earning->user->email }}</td>
                                    <td>{{ format_money($earning->amount) }}</td>
                                    <td>{{ $earning->created_at }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.earnings.destroy', ['id' => $earning->id]) }}" class="form-horizontal" style="display: inline;">
                                            {!! csrf_field() !!}

                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="delete-form-confirmation nopadding btn btn-link">Apagar</button>
                                        </form>
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
                                    <ul class="pagination">
                                        <li>
                                            <a href="?page={{ $cur_page - 1 }}" aria-label="Anterior">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    @foreach (paginate($cur_page, $earnings_count) as $page)
                                        <li{{ $page == $cur_page ? ' class=active' : '' }}><a href="?page={{ $page - 1 }}">{{ $page }}</a></li>
                                    @endforeach
                                        <li>
                                            <a href="?page={{ ($cur_page - 1) + 1 }}" aria-label="Próximo">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                  </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('.delete-form-confirmation').confirmation({
                btnOkLabel: 'Apagar',
                btnCancelClass: 'Cancelar',
                singleton: true,
                popout: true,
                title: 'Você tem Certeza?',
                placement: 'top',
                onConfirm: function (event, elem) {
                    $(elem).parent().submit();
                }
            });
        </script>
    </div>
@endsection