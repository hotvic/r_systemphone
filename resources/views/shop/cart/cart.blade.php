@extends('layouts.shop')

@section('content')
<section id="product">
    <div class="container">
        <h1 class="heading1"><span class="maintext"><i class="icon-shopping-cart"></i>&nbsp;Carrinho de Compras</span></h1>
        <!-- Cart-->
        <div class="cart-info">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="image">Imagem</th>
                        <th class="name">Nome</th>
                        <th class="quantity">Quantidade</th>
                        <th class="total">Ação</th>
                        <th class="price">Preço Unitário</th>
                        <th class="total">Total</th>
                    </tr>
                </thead>
                <tbody id="page-cart-items">
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="pull-right">
                <div class="span4 pull-right">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td><span class="extra bold">Sub-Total:</span></td>
                            <td><span class="bold" id="page-cart-subtotal">R$0.00</span></td>
                        </tr>
                        <tr>
                            <td><span class="extra bold totalamout">Total:</span></td>
                            <td><span class="bold totalamout" id="page-cart-total">$0.00</span></td>
                        </tr>
                    </table>

                    <a href="{{ url('/checkout') }}" class="btn btn-orange pull-right mb10">Checkout</a>
                    <a href="{{ url('/') }}" class="btn btn-orange pull-right mr10">Continuar Comprando</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('shop_scripts')
<script type="text/javascript">
    $(document).on('shop.cart.updated', function () {
        var createSetFunc = function (item_id) {
            return function (e) {
                e.preventDefault();

                $input = $(e.currentTarget).closest('tr').find('.item-amount');

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
                    $('<input/>').attr('type', 'text').attr('size', 1).attr('value', item.amount).addClass('span1 item-amount')
                );
                $tdAction = $('<td/>').append(
                    $('<a/>').addClass('mr10').attr('href', '#').html('<i class="tooltip-test font24 icon-refresh" data-original-title="Atualizar"></i>')
                        .on('click', createSetFunc(item.id))
                ).append(
                    $('<a/>').attr('href', '#').html('<i class="tooltip-test font24 icon-remove-circle" data-original-title="Remover"></i>')
                        .on('click', createRemoveFunc(item.id))
                );
                $tdPrice = $('<td/>').addClass('price').text('R$' + parseFloat(item.price).toFixed(2));
                $tdTotal = $('<td/>').addClass('total').text('R$' + (parseFloat(item.price) * item.amount).toFixed(2));

                $tr = jQuery('<tr/>');
                $tr.append($tdImage).append($tdName).append($tdQuantity).append($tdAction).append($tdPrice).append($tdTotal);

                $('#page-cart-items').append($tr);

                totalPrice += parseFloat(item.price) * item.amount;
            }

            $('#page-cart-subtotal').text('R$' + totalPrice.toFixed(2));
            $('#page-cart-total').text('R$' + totalPrice.toFixed(2));
        }
        else
        {
            var totalPrice = 0;

            $('#page-cart-items').empty();

            $('#page-cart-subtotal').text('R$' + totalPrice.toFixed(2));
            $('#page-cart-total').text('R$' + totalPrice.toFixed(2));
        }
    });
</script>
@endsection