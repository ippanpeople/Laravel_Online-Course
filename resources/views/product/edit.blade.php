@extends('layouts.template')

@section('content')
    <form action="{{ route('products.update', ['product' => $product['id']]) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="text">
        <button type="submit">update</button>
    </form>
@endsection
