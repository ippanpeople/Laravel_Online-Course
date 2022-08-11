@extends('layouts.template')

@section('content')
    <h1>Cart</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>$ 30</td>
                <td>
                    <input type="number" min="1" value="1">
                </td>
                <td>
                    <button type="button">delete</button>
                </td>
            </tr>
        </tbody>
    </table>
    <hr/>
    <button type="button">Update</button>

@endsection

{{-- @section('inline_js')
    @parent
    <script>
        let productId = "{{ $product['id'] }}"
        initAddToCart(productId)
    </script>
@endsection --}}
