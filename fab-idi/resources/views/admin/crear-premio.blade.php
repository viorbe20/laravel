@extends('layouts.plantilla-admin')

@section('title', 'Crear Premio')

@section('content')

    <main id="main-crear-premio" class='main-admin'>
        <section id="section-table-crear-premio">

            <div class='page-subtitle'>
                <h2>CREAR PREMIO</h2>
            </div>

            <form method="POST" action="{{ route('guardar-premio') }}" enctype="multipart/form-data" class='styled-form'>
                @csrf
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" name="nombre-premio" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Fecha*</label>
                        <input type="date" class="form-control" name="fecha-premio" required>
                    </div>
                </div>
                
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto-premio">
                    </div>
                    <div class="form-group">
                        <label for="web">Web</label>
                        <input type="text" class="form-control" name="web-premio" >
                    </div>
                </div>

                <div class="form-row-1">
                    <div class="form-group">
                        <label for="descripcion">Descripción*</label>
                        <textarea type="text" class="form-control" name="descripcion-premio" rows="5" required>
                        </textarea>
                    </div>
                </div>
            </form>

        </section>
    </main>




@endsection
