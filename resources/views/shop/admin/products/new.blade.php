@extends('shop.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Novo Produto</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="post" action="{{ route('shop.admin.products.new') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug"  name="slug" readonly="readonly">
                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price">Preço</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                                        <span class="input-group-addon" id="price-display">R$ 0.00</span>
                                    </div>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('in_stock') ? ' has-error' : '' }}">
                                    <label for="in_stock">Quantidade em Estoque</label>
                                    <input type="text" class="form-control" id="in_stock" name="in_stock" value="{{ old('in_stock') }}">
                                @if ($errors->has('in_stock'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('in_stock') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Produto" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Descrição</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Descrição do Produto" rows="10">{{ old('name') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </div>

                            <button type="submit" class="btn btn-purple waves-effect waves-light">Criar Produto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script type="text/javascript">
        var slugify = function (text)
        {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

        $('#name').on('change input keyup paste', function () {
            var $this = $(this);

            $('#slug').val(slugify($this.val()));
        }).trigger('change');

        $('#price').on('change input paste keyup', function () {
            var $this = $(this);

            var re = /([0-9]*)([0-9]{2})$/;
            var val = $this.val().match(re);

            $('#price-display').text($this.val().length < 2 ? 'R$ 0.00' : 'R$ ' + (typeof val[1] != "null" ? val[1] : 0 ) + '.' + val[2]);
        }).trigger('input');
    </script>
@endsection