@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row">
            <div class="span9">
                <div class="tab-content index8tabcontent">
                    <div class="tab-pane active" id="latest">
                        <ul class="thumbnails mt20">
                        @foreach ($products as $product)
                            <li class="span3">
                                <a class="prdocutname" href="{{ route('shop.product', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                <div class="thumbnail">
                                    <a href="#" style="min-height: 200px;">
                                    @if ($product->photo)
                                        <img alt="{{ $product->name }}" src="{{ $product->photo->url }}">
                                    @endif
                                    </a>
                                    <div class="price">
                                        <div class="pricenew">{{ format_money($product->price) }}</div>
                                        <div class="ratingstar">
                                            <i class="icon-star orange"></i>
                                            <i class="icon-star orange"></i>
                                            <i class="icon-star orange"></i>
                                            <i class="icon-star orange"></i>
                                            <i class="icon-star orange"></i>
                                        </div>
                                    </div>
                                    <a class="btn btn-orange btn-small addtocartbutton" onclick="Cart.add({{ $product->id }}); return false;">Add ao Carrinho</a>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <aside class="span3">
                <!-- Category-->
                <div class="sidewidt">
                    <h2 class="heading2"><span><i class="icon-th-list"></i> Categorias</span></h2>
                    <ul class="nav nav-list categories">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('shop.catalog', ['category' => $category->slug]) }}">{{ $category->title }}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="sidewidt">
                    <h2 class="heading2"><span>Contato</span></h2>
                    <p>
                        <i class="icon-envelope"></i> Email: <a href="malito:contato@systemphonne.com">contato@systemphonne.com</a>
                    </p>
                </div>
            </aside>
        </div>
    </div>
</div>
<div class="clearfix"></div>
@endsection