@extends('layouts.plantilla-admin')

@vite('resources/js/gestionUsuarios.js')

@section('title', 'Gestión de Usuarios')

@section('content')
<script>
    //Para cargar la imagen de perfil en el archivo js
    let rutaImagen = "{{ asset('img/usuarios/') }}";
</script>
    <main id='main-gestion-usuarios' class='main-admin'>
        
        <div class="input-group styled-input-group">
            <span class="input-group-text" id="">Buscar usuario por nombre</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-gestion-usuarios">
            <a href="{{ url('gestion-usuarios/crear-usuario') }}" class="btn btn-admin-add"><i class="fa fa-circle-plus"></i></a>
        </div>
        
        <table class="table styled-table">
                <thead class='table-header'>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Telefono</th>
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

