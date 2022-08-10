@extends('layouts.template')

@section('content')
    <h1>products</h1>
    <a href="{{ route('products.create') }}">Create</a><br>
    <hr>
    {{-- 要顯示東西必須從public（下的路徑）下手, 另外使用 "asset+路徑" 就可以在blade中使用public中的路徑 --}}
    @foreach ($products as $product)
        {{-- url generation --}}
        <div>
            <a href="{{ route('products.show', ['product' => $product['id']]) }}">
                <img src="{{ $product['imgUrl'] }}" width="400">
            </a>
        </div>
        <div>
            <a href="{{ route('products.edit', ['product' => $product['id']]) }}">Edit</a>
            <form action="{{ route('products.destroy', ['product' => $product['id']]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">delete</button>
            </form>
        </div>
        <hr>
    @endforeach
@endsection
