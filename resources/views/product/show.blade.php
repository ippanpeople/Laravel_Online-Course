@extends('layouts.template')

@section('content')
    <h1>{{ $product['name'] }}</h1>
    {{-- 要顯示東西必須從public（下的路徑）下手, 另外使用 "asset+路徑" 就可以在blade中使用public中的路徑 --}}
    <img src="{{ $product['imgUrl'] }}" width="400">
    {{-- <img src="{{ $productUrl }}" width="400"> --}}
    <div style="margin: 36px 0">
        <p>Price : {{ $product['price'] }}</p>
        <input type="number" name="quantity" min="1" value="1">
        <button type="button" id="addToCart">Add to cart</button>
    </div>
    <a href="{{ route('cart.index') }}">go cart</a>
    <a href="{{ route('products.index') }}">home page</a>
@endsection

@section('inline_js')
    @parent
    <script>
        let productId = "{{ $product['id'] }}"
        initAddToCart(productId)
    </script>
@endsection
