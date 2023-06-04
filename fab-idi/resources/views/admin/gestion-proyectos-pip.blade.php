@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Proyectos PIP')

@section('content')
    <main class='main-admin'>
    
    @php
        $proyectosDestacados = App\Models\Proyecto::where('destacado', true)->get();
    @endphp
    
    <section id="section-table-premios-pip-destacados">

        <div class='page-subtitle'>
            <h2>PREMIOS PIP DESTACADOS</h2>
        </div>

        <table class="table styled-table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">URL</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-tabla-premios-destacados">
                @foreach ($premiosDestacados as $premio)
                    <tr>
                        <td>{{ $premio->titulo }}</td>
                        <td>{{ date('d/m/Y', strtotime($premio->fecha)) }}</td>
                        <td>{{ $premio->descripcion }}</td>
                        <td>{{ $premio->url }}</td>
                        <td>{{ $premio->imagen }}</td>
                        <td>
                            <a href="{{ url('gestion-premios/editar/' . $premio->id) }}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('gestion-premios/eliminar/' . $premio->id) }}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                            <a href="{{ url('gestion-premios/quitar-destacado/' . $premio->id) }}" class="btn btn-admin-premio"><i class="fa-solid fa-eye-slash"></i></a>
                                
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>


    <section id="section-table-premios-listado">
        <div class='page-subtitle'>
            <h2>LISTADO DE PREMIOS</h2>
        </div>

        <div class="input-group styled-input-group">
            <span class="input-group-text" id="">Buscar premio</span>
            <input type="text" class="input-group-text" name="buscar" id="buscar-premio">
            <a href="{{ url('gestion-premios/crear') }}" class="btn btn-admin-add"><i class="fa fa-circle-plus"></i></a>
        </div>

        <table class="table styled-table">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">URL</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-tabla-premios">
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
