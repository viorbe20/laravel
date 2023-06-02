@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Premios')

@section('content')

    <main id="main-gestion-premios">
        @php
            $premiosDestacados = App\Models\Premio::where('destacado', true)->get();
        @endphp
        <section id="section-table-premios-destacados">

            <div class='page-subtitle'>
                <h2>PREMIOS DESTACADOS</h2>
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
                                <a href="{{ url('gestion-premios/quitar-destacado/' . $premio->id) }}"
                                    class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
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
