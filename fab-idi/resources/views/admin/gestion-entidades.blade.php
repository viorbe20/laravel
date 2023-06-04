@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Entidades')

@vite(['resources/js/gestionEntidades.js'])

@section('content')

<script>
    //Para cargar la imagen de perfil
    let rutaImagen = "{{ asset('images/usuarios/') }}";
</script>

    <main id='main-gestion-entidades' class='main-admin'>
        
        <div class="input-group styled-input-group">
            <span class="input-group-text" id="">Buscar Entidad</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-gestion-entidades">
            <a href="{{ url('gestion-entidades/crear-entidad') }}" class="btn btn-admin-add"><i class="fa fa-circle-plus"></i></a>
        </div>
        
        <table class="table styled-table">
                <thead class='table-header'>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Representante</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Url</th>
                        <th>Colaborador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-gestion-entidades">
                </tbody>
            </table>
    
    
        </main>


@endsection

