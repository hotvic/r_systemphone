@extends('layouts.shop')

@section('content')
<section id="product">
    <div class="container">
        <div class="row">
            <div class="span5">
                <ul class="thumbnails mainimage">
                @foreach ($product->photos as $photo)
                    <li class="span5">
                        <a rel="position: 'inside' , showTitle: false, adjustX:-4, adjustY:-4" class="thumbnail cloud-zoom" href="{{ $photo->url }}">
                            <img src="{{ $photo->url }}" alt="" title="">
                        </a>
                    </li>
                @endforeach
                </ul>
                <span>Mova o mouse sobre a image para zoom</span>
                <ul class="thumbnails mainimage">
                @foreach ($product->photos as $photo)
                    <li class="producthtumb">
                        <a class="thumbnail">
                            <img src="{{ $photo->url }}" alt="" title="">
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="span7">
                <div class="row">
                    <div class="span7">
                        <h1 class="productname"><span class="bgnone">{{ $product->name }}</span></h1>
                        <div class="productprice">
                            <div class="productpageprice"><span class="spiral"></span>{{ format_money($product->price) }}</div>
                            <ul class="rate">
                                <li class="on"></li>
                                <li class="on"></li>
                                <li class="on"></li>
                                <li class="off"></li>
                                <li class="off"></li>
                            </ul>
                        </div>
                        <div class="productbtn">
                            <button class="btn btn-orange tooltip-test" data-original-title="Carrinho" onclick="Cart.add({{ $product->id }}); return false;"><i class="icon-shopping-cart icon-white"></i>&nbsp;Adicionar ao Carrinho</button>
                        </div>
                        <div class="productdesc">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a href="#description">Descrição</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    {{-- <h2>h2 tag will be appear</h2> --}}
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection