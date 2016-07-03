@extends('shop.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Editar Produto</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert"><strong>Sucesso!</strong>&nbsp;Produto Salvo com Sucesso!</div>
                    @endif

                        <form role="form" method="post" action="{{ route('shop.admin.products.edit', ['id' => $product->id]) }}">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug"  name="slug" value="{{ $product->slug }}" disabled="disabled">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price">Preço</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="price" name="price" value="{{ number_format($product->price, 2, '', '') }}">
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
                                    <input type="text" class="form-control" id="in_stock" name="in_stock" value="{{ $product->in_stock }}">
                                @if ($errors->has('in_stock'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('in_stock') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Produto" value="{{ $product->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>

                            <div class="col-md-9">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description">Descrição</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Descrição do Produto" rows="10">{{ $product->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="categories">Categorias</label>
                                    <select class="form-control" id="categories" name="categories[]" multiple="multiple">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}"{{ $product->categories->contains('id', $cat->id) ? ' selected=selected' : '' }}>{{ $cat->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="display: flex; justify-content: space-between;">
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Salvar Produto</button>
                                <a class="btn btn-purple waves-effect waves-light" id="addPhotos" data-toggle="modal" data-target="#photosModal">Adicionar Fotos</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="photosModal" tabindex="-1" role="dialog" aria-labelledby="photosModalTitle" data-photos="{{ $product->photos->toJson() }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="photosModalTitle">Fotos do Produto</h4>
                </div>
                <div class="modal-body">
                    <div style="display: flex; flex-wrap: wrap; align-items: center; align-content: center;" id="photosModalContent">

                    </div>
                    <div style="border-top: 2px solid #e4e1e5; margin-top: 20px; padding-top: 20px;" id="uploadArea">
                        <form id="productPhotoUploadForm" enctype="multipart/form-data" method="post" action="{{ route('shop.admin.products.new-photo', ['id' => $product->id]) }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div style="display: flex; justify-content: space-between;">
                                <div class="form-group">
                                    <label for="photoField">Foto (.png|.jpeg &lt;2MB)</label>
                                    <input type="file" id="photoField" name="photo">
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light"><i class="fa fa-paper-plane"></i>&nbsp;Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script type="text/javascript">
        $('#price').on('change input paste keyup', function () {
            var $this = $(this);

            var re = /([0-9]*)([0-9]{2})$/;
            var val = $this.val().match(re);

            $('#price-display').text($this.val().length < 2 ? 'R$ 0.00' : 'R$ ' + (typeof val[1] != "null" ? val[1] : 0 ) + '.' + val[2]);
        }).trigger('input');

        var updateModalContent = function ($this) {
            var data = $this.data('photos');
            var $content = $this.find('#photosModalContent');

            $content.empty();

            for (var photo of data)
            {
                $photo = $('<div/>').css({
                    'width': '130px',
                    'height': '130px',
                    'padding': '1px',
                });
                $img   = $('<img/>').attr('width', '128').attr('height', '128').attr('src', photo.url);

                $content.append($photo.append($img));
            }

            $addParent = $('<div/>').css({
                'width': '128px',
                'height': '128px',
                'border': '1px solid #e4e1e5',
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center',
                'align-content': 'center',
            });
            $button = $('<a/>')
                .attr('href', '#')
                .addClass('add-photo-plus')
                .html('<i class="fa fa-5x fa-plus"></i>')
                .css('color', '#7e57c2')
                .on('click', function () {
                    $('#uploadArea').show();
                });
            $content.append($addParent.append($button));
        }
        $('#photosModal').on('show.bs.modal', function () {
            var $this = $(this);

            $('#uploadArea').hide();

            updateModalContent($this);
        });

        $('#productPhotoUploadForm').on('submit', function (e) {
            e.preventDefault();

            var $this = $(this);
            var data = new FormData(this);

            $.ajax({
                url: $this.attr('action'),
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.success)
                    {
                        var $modal = $('#photosModal');

                        $modal.data('photos', data.photos);
                        updateModalContent($modal);

                        $this.get(0).reset();
                        $this.parent().hide();
                    }
                }
            });
        });
    </script>
@endsection