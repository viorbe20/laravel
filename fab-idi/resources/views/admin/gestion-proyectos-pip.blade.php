@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Proyectos PIP')

@vite(['resources/js/gestionProyectosPip.js'])

@section('content')
<script>
    //Para cargar la imagen de perfil en el archivo js
    let rutaImagen = "{{ asset('images/proyectos/') }}";
</script>

<main id='main-gestion-proyectos-pip' class='main-admin'>

    <section id="section-table-proyectos-destacados-pip">
        <div class='btn-container-vista'>
            <a href="{{ url('/proyectos-pip') }}" class="btn"><i class="fa-solid fa-eye"><span>
                        Vista</span></i></a>
        </div>
        <div class='page-subtitle'>
            <h2>PROYECTOS DESTACADOS</h2>
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
            <tbody id="tbody-tabla-proyectos-destacados-pip">
                @foreach ($proyectosDestacados as $proyecto)
                    <tr>
                        <td style="width:30px;"><img src="{{ asset('images/proyectos/' . $proyecto->imagen) }}"
                                alt="foto-perfil-entidad" width="100%"></td>
                        <td>{{ $proyecto->nombre }}</td>
                        
                        @foreach ($cursosAcademicos as $cursoAcademico)
                            @if ($cursoAcademico->id == $proyecto->curso_academico_id)
                                <td>{{ $cursoAcademico->curso_academico }}</td>
                            @endif
                        @endforeach
                        
                        <td><a href={{ $proyecto->url }}>Documentación</a></td>
                        <td>
                            <a href="{{ url('gestion-proyectos/editar/' . $proyecto->id) }}"
                                class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('gestion-proyectos/eliminar/' . $proyecto->id) }}"
                                class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                            <a href="{{ url('gestion-proyectos/quitar-destacado/' . $proyecto->id) }}"
                                class="btn btn-admin-save"><i class="fa-solid fa-eye-slash"></i></a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>


    <section id="section-table-proyectos-pip-listado">
        <div class='page-subtitle'>
            <h2>LISTADO DE PROYECTOS</h2>
        </div>

        <div class="input-group styled-input-group">
            <span class="input-group-text" id="">Buscar proyecto</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-proyecto-pip">
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
            <tbody id="tbody-tabla-proyectos-pip">
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
