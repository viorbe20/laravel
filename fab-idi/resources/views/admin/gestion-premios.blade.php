@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Premios')

@section('content')
<main id="main-gestion-premios">
    @php
    $premiosDestacados = App\Models\Premio::where('destacado', true)->get();
    @endphp
    <section id="section-table-premios">
        <h2>Premios</h2>
        <table class="table table-striped">
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
                        <a href="{{ url('gestion-premios/quitar-destacado/' . $premio->id) }}" class="btn btn-warning">Quitar destacado</a>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>


  
        <h3>Listado de Premios</h3>
        <input type="text" name="buscar" id="buscar-premio">
        <!-- Añadir premio -->
        <a href="{{ url('gestion-premios/crear') }}" class="btn btn-primary">Añadir nuevo Premio</a>
        <table class="table">
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


</main>

@endsection
