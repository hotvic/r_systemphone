@extends('layouts.shop')

@section('content')
<section id="product">
    <div class="container">
        <div class="row">
            <div class="span9">
                <h1 class="heading1"><span class="maintext"><i class="icon-ok-circle"></i> Checkout</span></h1>
                <div class="checkoutsteptitle" id="step1">Passo 1: Detalhes de Entrega<a class="modify">Modificar</a>
                </div>
                <div class="checkoutstep">
                    <div class="row">
                        <form id="checkout-form" class="form-horizontal" method="post" action="{{ route('shop.checkout') }}">
                            <fieldset>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label">Endereço<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="address1" value="{{ old('address1') }}" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Bairro<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="address2" value="{{ old('address2') }}" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Complemento</label>
                                        <div class="controls">
                                            <input type="text" name="address3" value="{{ old('address3') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label">CEP<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="postal_code" value="{{ old('postal_code') }}" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Cidade<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="city" value="{{ old('city') }}" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Estado<span class="red">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="state" value="{{ old('state') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <a class="btn btn-orange pull-right" href="#step2">Continuar</a>
                </div>
                <div class="checkoutsteptitle" id="step2">Passo 2: Confirmar Ordem<a class="modify">Modificar</a>
                </div>
                <div class="checkoutstep">
                    <div class="cart-info">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="image">Imagem</th>
                                    <th class="name">Nome do Produto</th>
                                    <th class="quantity">Quantidade</th>
                                    <th class="price">Preço Unitário</th>
                                    <th class="total">Total</th>
                                </tr>
                            </thead>
                            <tbody id="page-cart-items">
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="pull-right">
                            <div class="span4 pull-right">
                                <table class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td><span class="extra bold">Sub-Total:</span></td>
                                            <td><span class="bold" id="page-cart-subtotal">R$0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="extra bold totalamout">Total:</span></td>
                                            <td><span class="bold totalamout" id="page-cart-total">R$0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="extra bold">Saldo:</span></td>
                                            <td><span class="bold" id="page-cart-balance">R$0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="extra bold">Saldo Pós Compra:</span></td>
                                            <td><span class="bold" id="page-cart-rest">R$0.00</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <a href="#" class="btn btn-orange pull-right" onclick="$('#checkout-form').submit(); return false;">Checkout</a>
                                <a href="{{ url('/') }}" class="btn btn-orange pull-right mr10">Continuar Comprando</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="span3">
                <aside>
                    <div class="sidewidt">
                        <h2 class="heading2"><span><i class="icon-list-ol"></i> Passos de Checkout</span></h2>
                        <ul class="nav nav-list categories">
                            <li>
                                <a href="#step1">Detalhes de Entrega</a>
                            </li>
                            <li>
                                <a href="#step2">Confirmar</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection

@section('shop_scripts')
<script type="text/javascript">
    $.fn.goTo = function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top + 'px'
        }, 'fast');

        return this;
    }
</script>
<script type="text/javascript">
    $(document).on('shop.cart.updated', function () {
        var createSetFunc = function (item_id) {
            return function (e) {
                e.preventDefault();

                $input = $(e.currentTarget).prev();

                Cart.set(item_id, $input.val());
            };
        }
        var createRemoveFunc = function (item_id) {
            return function (e) {
                e.preventDefault();

                Cart.removeProduct(item_id);
            };
        }

        if (Cart.itemsCount > 0)
        {
            var totalPrice = 0;

            $('#page-cart-items').empty();

            for (var item in Cart.items)
            {
                var item = Cart.items[item];

                $tdImage = $('<td/>').addClass('image').append(
                    $('<a/>').attr('href', item.url).append(
                        $('<img/>').attr('width', 50).attr('height', 50).attr('src', item.photo_url).attr('alt', 'Sem Foto')
                    )
                );
                $tdName = $('<td/>').addClass('name').append(
                    $('<a/>').attr('href', item.url).text(item.name)
                );
                $tdQuantity = $('<td/>').addClass('quantity').append(
                    $('<input/>').attr('type', 'text').attr('size', 1).attr('value', item.amount).addClass('span1')
                ).append('&nbsp;').append(
                    $('<a/>').addClass('mr10').attr('href', '#').html('<i class="tooltip-test font24 icon-refresh" data-original-title="Atualizar"></i>')
                        .on('click', createSetFunc(item.id))
                ).append(
                    $('<a/>').attr('href', '#').html('<i class="tooltip-test font24 icon-remove-circle" data-original-title="Remover"></i>')
                        .on('click', createRemoveFunc(item.id))
                );
                $tdPrice = $('<td/>').addClass('price').text('R$' + parseFloat(item.price).toFixed(2));
                $tdTotal = $('<td/>').addClass('total').text('R$' + (parseFloat(item.price) * item.amount).toFixed(2));

                $tr = jQuery('<tr/>');
                $tr.append($tdImage).append($tdName).append($tdQuantity).append($tdPrice).append($tdTotal);

                $('#page-cart-items').append($tr);

                totalPrice += parseFloat(item.price) * item.amount;
            }

            $('#page-cart-subtotal').text('R$' + totalPrice.toFixed(2));
            $('#page-cart-total').text('R$' + totalPrice.toFixed(2));
            $('#page-cart-balance').text('R$' + parseFloat(Auth.user.e_funds).toFixed(2));
            $('#page-cart-rest').text('R$' + (parseFloat(Auth.user.e_funds) - totalPrice).toFixed(2));
        }
        else
        {
            var totalPrice = 0;

            $('#page-cart-items').empty();

            $('#page-cart-subtotal').text('R$' + totalPrice.toFixed(2));
            $('#page-cart-total').text('R$' + totalPrice.toFixed(2));
            $('#page-cart-balance').text('R$' + parseFloat(Auth.user.e_funds).toFixed(2));
            $('#page-cart-rest').text('R$' + totalPrice.toFixed(2));
        }
    });

    $('#checkout-form').on('submit', function () {
        var $this        = $(this);
        var $address1    = $(this['address1']);
        var $address2    = $(this['address2']);
        var $postal_code = $(this['postal_code']);
        var $city        = $(this['city']);
        var $state       = $(this['state']);

        if ($address1.val().length < 5)
        {
            $address1.closest('.control-group').addClass('error');
            $address1.goTo();

            return false;
        }
        else
            $address1.closest('.control-group').removeClass('error');

        if ($address2.val().length < 2)
        {
            $address2.closest('.control-group').addClass('error');
            $address2.goTo();

            return false;
        }
        else
            $address2.closest('.control-group').removeClass('error');

        if ($postal_code.val().length < 5)
        {
            $postal_code.closest('.control-group').addClass('error');
            $postal_code.goTo();

            return false;
        }
        else
            $postal_code.closest('.control-group').removeClass('error');

        if ($city.val().length < 3)
        {
            $city.closest('.control-group').addClass('error');
            $city.goTo();

            return false;
        }
        else
            $city.closest('.control-group').removeClass('error');

        if ($state.val().length < 3)
        {
            $state.closest('.control-group').addClass('error');
            $state.goTo();

            return false;
        }
        else
            $state.closest('.control-group').removeClass('error');

        var totalPrice = 0;
        for (var item in Cart.items)
        {
            var item = Cart.items[item];
            totalPrice += parseFloat(item.price) * item.amount;
        }

        if (parseFloat(Auth.user.e_funds) < totalPrice)
        {
            alert("Saldo insuficiente! Porfavor remova alguns itens do carrinho...");

            return false;
        }

        return true;
    });
</script>
@endsection