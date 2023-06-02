@extends('layouts.plantilla-admin')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Gestión de Usuarios')

@section('content')

    <main id='main-gestion-usuarios'>
        
        <div class="input-group styled-input-group">
            <span class="input-group-text" id="">Buscar premio</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-gestion-usuarios">
            <a href="{{ url('gestion-usuarios/crear-usuario') }}" class="btn btn-admin-add"><i class="fa fa-circle-plus"></i></a>
        </div>
        
        <table class="table styled-table">
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

