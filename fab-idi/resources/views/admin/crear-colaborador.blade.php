@extends('layouts.plantilla')

@section('title', 'Alta de colaborador')

@section('content')
    <main id="main-crear-colaborador">
        <h2>Alta colaborador</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipoColaborador">Tipo de Colaborador:</label>
                <select name="tipoColaborador" id="tipoColaborador" class="form-control" required>
                    <option value="">Selecciona un tipo</option>
                    <option value="Instituto">Instituto</option>
                    <option value="Mentor">Mentor</option>
                    <option value="Embajador">Embajador</option>
                </select>

            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" id="instagram" class="form-control">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" name="twitter" id="twitter" class="form-control">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn</label>
                <input type="text" name="linkedin" id="linkedin" class="form-control">
            </div>
            <div class="form-group">
                <label for="web">Sitio web</label>
                <input type="text" name="web" id="web" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>

    </main>

@endsection
