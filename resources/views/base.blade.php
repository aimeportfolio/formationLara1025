<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>@yield('title', 'Mon Blog')</title>
</head>
@php
    $routeName = request()->route()->getName();
@endphp

<body>
    <nav class="navbar navbar-expand-lg bg-body-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">XZYIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    {{-- <a class="nav-link @if($routeName === 'blog.index') activeg @endif" aria-current="page" href="{{ route('blog.index') }}">Mon Blog</a> --}}
                    <a @class(['nav-link', 'activegh' => $routeName === 'blog.index']) aria-current="page" href="{{ route('blog.index') }}">Mon Blog</a>
                    <a class="nav-link" href="#">Autres</a>
                </div>
            </div>
        </div>
    </nav>
    @if(session('success'))
    <div class="container alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        @yield('content')
{{--        @dump()--}}
        <div.mt-4">
            <hr>
            <p class="text-center">Mon super blog - &copy; 2024</p>
        </div>
    </div>
</body>

</html>
