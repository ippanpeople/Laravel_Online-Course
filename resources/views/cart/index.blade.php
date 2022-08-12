@extends('layouts.template')

@section('content')
    <h1>Cart</h1>
    <form action="{{ route('cart.cookie.update') }}" method="POST">
        @csrf
        @method('PATCH')
        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>
                            <p>{{ $cartItem['product']['name'] }}</p>
                            <a href="{{ route('products.show', [ 'product' => $cartItem["product"]["id"] ]) }}"><img src="{{ $cartItem['product']['imgUrl'] }}" style="width:30px;"></a>
                        </td>
                        <td>$ {{ $cartItem['product']['price'] }}</td>
                        <td>
                            <input type="number" min="1" value="{{ $cartItem["quantity"] }}" name="product_{{ $cartItem["product"]["id"] }}">
                        </td>
                        <td>
                            <button type="button" class="delete" data-id="{{ $cartItem['product']['id'] }}">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit">Update</button>
    </form>
    <hr/>
    <a href="{{ route('products.index') }}">home page</a>

@endsection

@section('inline_js')
    @parent
    <script>
        initCartDeleteButton("{{ route('cart.cookie.delete') }}")
    </script>
@endsection
