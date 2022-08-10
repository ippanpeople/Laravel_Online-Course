@extends('layouts.template')

@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <input type="text">
        <button type="submit">Submit</button>
    </form>
@endsection
