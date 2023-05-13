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
                <select class="form-control" id="form-select-tipo-usuario" name="select-tipo-usuario">
                    <option value="" selected>Selecciona el tipo de usuario</option>
                    <option value="usuario">Usuario</option>
                    <option value="entidad">Entidad</option>
                </select>

            </div>
            <hr>
            {{-- <div id="usuario-campos" style="display: none;"> --}}
                <div id="usuario-campos">
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" name="nombre-usuario" >
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos*</label>
                        <input type="text" class="form-control" name="apellidos-usuario" >
                    </div>
                </div>

                <div class="form-row-3">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email-usuario" >
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña*</label>
                        <input type="text" class="form-control" name="password-usuario" >
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="phone" class="form-control" name="telefono-usuario">
                    </div>
                </div>

                <div class="form-row-3">
                    <div class="form-group">
                        <label for="twitter">Cuenta twitter</label>
                        <input type="text" class="form-control" name="twitter-usuario">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Cuenta instagram</label>
                        <input type="text" class="form-control" name="instagram-usuario">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Cuenta linkedin</label>
                        <input type="text" class="form-control" name="linkedin-usuario">
                    </div>
                </div>

                
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="profile">Perfil</label>
                        <select class="form-control" name="select-perfil-usuario" >
                            <option value="1">Admin</option>
                            <option value="2" selected>Usuario</option>
                            <option value="3">Embajador</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phot">Foto</label>
                        <input type="file" class="form-control" name="foto-usuario">
                    </div>
                </div>
            </div>
            <div id="entidad-campos" style="display: none;">
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" name="nombre-entidad" >
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Representante</label>
                        <input type="text" class="form-control" name="representante-entidad">
                    </div>
                </div>
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email-entidad" >
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="phone" class="form-control" name="telefono-entidad">
                    </div>
                </div>
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="web">Web</label>
                        <input type="text" class="form-control" name="web-entidad" >
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" class="form-control" name="imagen-entidad">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>

    </main>


@endsection
