@extends('layouts.plantilla')

@section('title', 'Editar vídeos')

@section('content')
    <main>
        <section id="section-table-editar-videos">
            <h2>Editar vídeo</h2>
            <form method="POST" action="{{ route('actualizar-video', ['id' => $video['id']]) }}">
                @csrf
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="nombre" value="{{ $video['nombre'] }}"></td>
                            <td><input type="text" name="url" value="{{ $video['url'] }}"></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="id" value="{{ $video['id'] }}">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
            
        </section>
    </main>

@endsection
