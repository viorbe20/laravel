<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/scss/app.scss'])
    <script src="{{ asset('js/app.js') }}"></script> <!-- Ruta correcta para tu archivo app.js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>

    @include('layouts.partials.header')

    @include('layouts.partials.nav-admin')

    @yield('content')

    @include('layouts.partials.footer')
</body>

</html>
