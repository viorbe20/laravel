@extends('layouts.plantilla')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Panel de Colaboradores')

@section('content')

    <main id='main-gestion-usuarios'>
        <h2>Gestión de Usuarios</h2>

        <a href="{{ route('crear-usuario') }}" class="btn btn-primary me-2">Crear</a>

    </main>


@endsection
