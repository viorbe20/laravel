@extends('layouts.plantilla-admin')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Editar Evento')

@section('content')

    <main id='main-editar-evento'>
        <div class='page-subtitle'>
            <h2>EDICIÓN DE EVENTO</h2>
        </div>

        <form method="POST" action="{{ route('guardar-cambios-evento') }}" enctype="multipart/form-data"
            id='form-editar-evento' class='styled-form'>
            @csrf
            <div class="form-row-2">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control required-evento" name="nombre-evento"
                        value="{{ $evento->nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Fecha*</label>
                    <input type="date" class="form-control" name="fecha-evento" value="{{ $evento->fecha }}" required>
                </div>
            </div>

            <div class="form-row-2">
                <div class="form-group">
                    <label for="nombre">Url</label>
                    <input type="text" class="form-control" name="url-evento" value="{{ $evento->url }}">
                </div>
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" class="form-control" name="imagen-evento" value="{{ $evento->imagen }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nombre">Descripción*</label>
                <textarea class="form-control" name="descripcion-evento" style="height: 150px;" required>{{ $evento->descripcion }}</textarea>
            </div>
            
            <input type="hidden" name="id-evento" value="{{ $evento->id }}">
            <div class='btn-container'>
                <button type="submit" class="btn btn-admin-save" id='btn-editar-evento'>Guardar cambios</button>
            </div>
        </form>

    </main>


@endsection
