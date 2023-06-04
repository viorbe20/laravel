@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Proyectos Intercentros')

@vite(['resources/js/gestionProyectosIntercentros.js'])

@section('content')
    <main id='main-gestion-proyectos-intercentros' class='main-admin'>

        @php
            $proyectosDestacados = App\Models\Proyecto::where('destacado', true)->where('tipo_proyecto_id', '2')->get();
        @endphp

        <section id="section-table-proyectos-destacados-intercentros">

            <div class='page-subtitle'>
                <h2>PROYECTOS DESTACADOS</h2>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Título</th>
                        <th scope="col">Curso</th>
                        <th scope="col">URL</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-proyectos-destacados-intercentros">
                    @foreach ($proyectosDestacados as $proyecto)
                        <tr>
                            <td>{{ $proyecto->titulo }}</td>
                            <td>{{ date('d/m/Y', strtotime($proyecto->fecha)) }}</td>
                            <td>{{ $proyecto->descripcion }}</td>
                            <td>{{ $proyecto->url }}</td>
                            <td>{{ $proyecto->imagen }}</td>
                            <td>
                                <a href="{{ url('gestion-proyectos/editar/' . $proyecto->id) }}"
                                    class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url('gestion-proyectos/eliminar/' . $proyecto->id) }}"
                                    class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{ url('gestion-proyectos/quitar-destacado/' . $proyecto->id) }}"
                                    class="btn btn-admin-proyecto"><i class="fa-solid fa-eye-slash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


        <section id="section-table-proyectos-intercentros-listado">
            <div class='page-subtitle'>
                <h2>LISTADO DE PROYECTOS</h2>
            </div>

            <div class="input-group styled-input-group">
                <span class="input-group-text" id="">Buscar proyecto</span>
                <input type="text" class="input-group-text" name="buscar" id="buscar-proyecto-intercentro">
                <a href="{{ url('gestion-proyectos/crear') }}" class="btn btn-admin-add"><i
                        class="fa fa-circle-plus"></i></a>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Título</th>
                        <th scope="col">Curso</th>
                        <th scope="col">URL</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-proyectos">
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
