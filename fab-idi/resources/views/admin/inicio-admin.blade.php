@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
    <main>

        <section class="container" id='section-form-videos'>
            <h2>Añadir Video</h2>
            <form action="{{ route('inicio-admin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="url">URL:</label>
                    <input type="url" name="url" id="url" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary" name="agregar_video">Añadir</button>
            </form>
        </section>

        <section id="section-table-videos">
            <h2>Videos</h2>
            <table class="table table-striped">
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
                            <td>
                                {{-- <form action="{{ route('eliminar-video', $video) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


    </main>

@endsection
