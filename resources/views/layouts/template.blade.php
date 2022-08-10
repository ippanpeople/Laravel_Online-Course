<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blade_Name: @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    {{-- <link rel="stylesheet" type="text/css" href="/css/abc.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="/css/test.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="/css/testtest.css"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;700&family=Noto+Sans+JP:wght@100&display=swap" rel="stylesheet">
    @include('layouts.meta')
    @include('layouts.style')
    @include('layouts.script')
</head>
<body>
    @include('layouts.nav')
    <div class="container">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
@yield('inline_js')
</html>
