@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Premios')

@vite(['resources/js/gestionPremios.js'])

@section('content')
<script>
    //Para cargar la imagen de perfil en el archivo js
    let rutaImagen = "{{ asset('img/premios/') }}";
</script>

    <main id="main-gestion-premios" class='main-admin'>
        @php
            $premiosDestacados = App\Models\Premio::where('destacado', true)->get();
        @endphp

        <section id="section-table-premios-destacados">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class='btn-container-vista'>
                <a href="{{ url('/') }}" class="btn"><i class="fa-solid fa-eye"><span> Vista</span></i></a>
            </div>
            <div class='page-subtitle'>
                <h2>PREMIOS DESTACADOS</h2>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Web</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-premios-destacados">
                    @foreach ($premiosDestacados as $premio)
                        <tr>
                            <td style='width:10%'><img src="{{ asset('img/premios/' . $premio->imagen) }}" alt="foto-perfil-entidad" width="30%"></td>
                            <td>{{ $premio->titulo }}</td>
                            <td>{{ date('d/m/Y', strtotime($premio->fecha)) }}</td>
                            <td><a href="{{$premio->url}}" target="_blank">{{$premio->url}}</a></td>
                            <td>
                                <a href="{{ url('gestion-premios/editar/' . $premio->id) }}"
                                    class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url('gestion-premios/eliminar/' . $premio->id) }}"
                                    class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{ url('gestion-premios/quitar-destacado/' . $premio->id) }}"
                                    class="btn btn-admin-premio"><i class="fa-solid fa-eye-slash"></i></a>

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
                <span class="input-group-text" id="">Buscar premio por nombre</span>
                <input type="text" class="input-group-text" name="buscar" id="buscar-premio">
                <a href="{{ url('gestion-premios/crear-premio') }}" class="btn btn-admin-add"><i
                        class="fa fa-circle-plus"></i></a>
            </div>

            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Web</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody-tabla-premios">
                </tbody>
            </table>
        </section>

    </main>

@endsection
