@extends('layouts.plantilla-admin')

@section('title', 'Editar vídeos')

@section('content')

<main id="main-editar-premios">
    <section id="section-table-editar-premios">
        
        <div class='page-subtitle'>
            <h2>EDITAR PREMIO</h2>
        </div>
        
        <form method="POST" action="{{ route('editar-premio',['id'=>$premio['id']]) }}" enctype="multipart/form-data">
            @csrf
            <table class="table styled-table">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">URL</th>
                        <th scope="col">Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="input-group-text"  type="text" name="titulo" value="{{ $premio['titulo'] }}"></td>
                        <td><input class="input-group-text"  type="date" name="fecha" value="{{ $premio['fecha'] }}"></td>
                        <td><input class="input-group-text"  type="text" name="descripcion" value="{{ $premio['descripcion'] }}"></td>
                        <td><input class="input-group-text"  type="text" name="url" value="{{ $premio['url'] }}"></td>
                       
                        <td>
                            <img src="{{ asset('img/premios/'.$premio['imagen']) }}" alt="imagen premio" width="100px">
                        <input type="file" name="imagen" value="{{ $premio['imagen'] }}">
                        <input type="hidden" name="imagen-guardada" value="{{ $premio['imagen'] }}">
                    </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="id" value="{{ $premio['id'] }}">
            <div class='btn-container'>
                <button type="submit" class="btn btn-admin-save">Guardar cambios</button>
            </div>
        </form>

    </section>
</main>




@endsection