@extends('layouts.plantilla-admin')

@section('title', 'Editar Premio')

@section('content')

<main id="main-editar-premio">

    <section id="section-table-editar-premio">
        <div class='page-subtitle'>
            <h2>EDITAR PREMIO</h2>
        </div>
        
        <form method="POST" action="{{ route('guardar-cambios-premio') }}" enctype="multipart/form-data" class='styled-form'>
            @csrf
            <div class="form-row-2">
                <div class="form-group">
                    <label for="nombre">Título*</label>
                    <input type="text" class="form-control" name="titulo-premio" value="{{ $premio->titulo }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha*</label>
                    <input class="input-group-text"  type="date" name="fecha-premio" value="{{ $premio->fecha }}" required>
                </div>
            </div>

            <div class="form-row-2">
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" name="url-premio" value="{{ $premio->url }}">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" name="imagen-premio">
                </div>
            </div>

            <div class="form-row-1">
                <div class="form-group">
                    <label for="centro">Descripción*</label>
                    <textarea type="text" class="form-control" name="descripcion-premio" rows="10" required>{{ $premio->descripcion }}
                    </textarea>
                </div>
            </div>


            <input type="hidden" name="id-premio" value="{{ $premio->id}}">
            <div class='btn-container'>
                <button type="submit" class="btn btn-admin-save">Guardar cambios</button>
            </div>
        </form>

    </section>
</main>




@endsection