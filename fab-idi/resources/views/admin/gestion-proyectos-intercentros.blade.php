@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Proyectos Intercentros')

@vite(['resources/js/gestionProyectosIntercentros.js'])

@section('content')
<script>
    //Para cargar la imagen de perfil en el archivo js
    let rutaImagen = "{{ asset('img/proyectos/') }}";
</script>

<main id='main-gestion-proyectos-intercentros' class='main-admin'>

    <section id="section-table-proyectos-intercentros-listado">
        <div class='btn-container-vista'>
            <a href="{{ url('/proyectos-intercentros') }}" class="btn"><i class="fa-solid fa-eye"><span>
                        Vista</span></i></a>
        </div>
        <div class='page-subtitle'>
            <h2>LISTADO DE PROYECTOS</h2>
        </div>

        <div class="input-group styled-input-group">
            <span class="input-group-text" id="">Buscar proyecto</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-proyecto-intercentros">
            <a href="{{ url('gestion-proyectos/crear') }}" class="btn btn-admin-add"><i
                    class="fa fa-circle-plus"></i></a>
        </div>

        <table class="table styled-table">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Curso</th>
                    <th scope="col">URL</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-tabla-proyectos-intercentros">
            </tbody>
        </table>

        <!-- mensaje success -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </section>

</main>

@endsection
