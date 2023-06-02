@extends('layouts.plantilla-admin')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Crear Usuario')

@section('content')

    <main id='main-crear-usuario'>
        <div class='page-subtitle'>
            <h2>CREAR EVENTO</h2>
        </div>

        <form method="POST" action="{{ route('guardar-evento') }}" enctype="multipart/form-data" class='styled-form'>
            @csrf
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" name="nombre-evento" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Fecha*</label>
                        <input type="date" class="form-control" name="fecha-evento" required>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Url</label>
                        <input type="text" class="form-control" name="url-evento">
                    </div>
                    <div class="form-group">
                        <label for="image">imagen</label>
                        <input type="file" class="form-control" name="imagen-evento">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre">Descripción*</label>
                    <textarea class="form-control" name="descripcion-evento" style="height: 150px;" required></textarea>
                </div>

            <div class='btn-container'>
                <button type="submit" class="btn btn-admin-save">Crear</button>
            </div>

        </form>

    </main>


@endsection
