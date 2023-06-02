@extends('layouts.plantilla-admin')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Gestión de Usuarios')

@section('content')

    <main id='main-gestion-usuarios'>

            <input type="text" name="buscar" id="buscar-gestion-usuarios">
            <a href="/gestion-usuarios/crear-usuario" class="btn btn-primary btn-crear-usuario">Crear Usuario</a>
            <table class="table">
                <thead class='table-header'>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Twitter</th>
                        <th>Instagram</th>
                        <th>Linkedin</th>
                        <th>Colaborador</th>
                        <th>Perfil</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-gestion-usuarios">
                </tbody>
            </table>
    
    
        </main>


@endsection

