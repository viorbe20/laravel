@extends('layouts.plantilla-admin')

@section('title', 'Editar vídeos')

@section('content')
    <main id='main-editar-videos'>
        <section id="section-editar-videos">
            <div class="card">
                <div class="card-header table-header">
                    <h3 class="card-title">Actualización vídeo</h3>
                </div>

                <form method="POST" action="{{ route('actualizar-video', ['id' => $video['id']]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $video['nombre'] }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ $video['url'] }}">
                    </div>
                    
                    <input type="hidden" name="id" value="{{ $video['id'] }}">
                    
                    <div class="form-group">
                    <button type="submit" class="btn btn-admin-create">Guardar cambios</button>
                    </div>
                </form>
            </div>
            
    
        </section>
    </main>

@endsection
