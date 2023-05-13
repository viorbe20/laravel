@extends('layouts.plantilla')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Crear Usuario')

@section('content')

    <main id='main-crear-usuario'>
        <h2>Alta Usuario</h2>

        <form method="POST" action="{{ route('crear-usuario-post') }}" enctype="multipart/form-data" id='form-crear-usuario'>
            @csrf
            <div class="form-group">
                <label for="tipo-usuario">Tipo de Usuario</label>
                <select class="form-control" id="form-select-tipo-usuario" name="tipo-usuario">
                    <option value="usuario">Usuario</option>
                    <option value="entidad">Entidad</option>
                </select>
            </div>
            <hr>
            <div id="usuario_campos" style="display: none;">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
                </div>
            </div>
            <div id="entidad_campos" style="display: none;">
                <div class="form-group">
                    <label for="razon_social">Razón Social</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social">
                </div>
                <div class="form-group">
                    <label for="cuit">CUIT</label>
                    <input type="text" class="form-control" id="cuit" name="cuit">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>

    </main>


@endsection
