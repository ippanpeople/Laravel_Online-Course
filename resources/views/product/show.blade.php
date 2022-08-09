@extends('layouts.template')

@section('content')
    <h1>product</h1>
    {{-- 要顯示東西必須從public（下的路徑）下手, 另外使用 "asset+路徑" 就可以在blade中使用public中的路徑 --}}
    <img src="{{ $product['imgUrl'] }}" width="400">
    <img src="{{ $productUrl }}" width="400">
@endsection
