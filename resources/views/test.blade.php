@extends('layouts.template')

@section('title', "test")

@section('content')
    <main id="test">
        <h1 class="title">Test Page</h1>
        <div class="card">
            <p class="title">{{ $t }}</p>
            <p class="title">Version: {{ $ver }}</p>
            <p class="title">Info: {{ $info }}</p>
            <div class="description">
                <p>description description</p>
                <p>description description</p>
                <p>description description</p>
            </div>
        </div>
    </main>

@endsection
