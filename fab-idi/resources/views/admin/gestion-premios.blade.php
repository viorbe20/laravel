@extends('layouts.plantilla-admin')

@section('title', 'Gestión de Vídeos')

@section('content')
    <main>
        <section id="section-table-videos">
            <h2>Videos</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">URL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                        <tr>
                            <td>{{ $video['nombre'] }}</td>
                            <td>{{ $video['url'] }}</td>
                            <td><a href="{{ url('gestion-videos/editar/' . $video['id']) }}" class="btn btn-warning">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


    </main>

@endsection
