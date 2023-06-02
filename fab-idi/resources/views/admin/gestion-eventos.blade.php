@extends('layouts.plantilla-admin')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Gestión de Eventos')

@section('content')

    <main id='main-gestion-eventos'>
        
        <div class="input-group styled-input-group">
            <span class="input-group-text" id="">Buscar evento</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-gestion-eventos">
            <a href="{{ url('gestion-eventos/crear-evento') }}" class="btn btn-admin-add"><i class="fa fa-circle-plus"></i></a>
        </div>
        
        <table class="table styled-table">
                <thead class='table-header'>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>URL</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-gestion-eventos">
                </tbody>
            </table>
    
    
        </main>


@endsection

