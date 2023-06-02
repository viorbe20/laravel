@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Vídeos')

@section('content')
    <main>
        <section id="section-table-videos">
            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">URL</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td>{{ $video['nombre'] }}</td>
                            <td>{{ $video['url'] }}</td>
                            <td><a href="{{ url('gestion-videos/editar/' . $video['id']) }}" class="btn btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


    </main>

@endsection
