@extends('layouts.plantilla')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Editar Usuario')

@section('content')

    <main id='main-editar-usuario'>
        <h2>Edición Usuario</h2>

        <form method="POST" action="{{ route('guardar-cambios-usuario') }}"  enctype="multipart/form-data" id='form-editar-usuario'>
            @csrf
            <div class="form-row-2">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control required-usuario" name="nombre-usuario" value="{{ $usuario->nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos*</label>
                    <input type="text" class="form-control" name="apellidos-usuario" value="{{ $usuario->apellidos }}" required >
                </div>
            </div>

            <div class="form-row-3">
                <div class="form-group">
                    <label for="email">Email*</label>
                    <input type="email" class="form-control" name="email-usuario" value="{{ $usuario->email }}" required >
                </div>
                <div class="form-group">
                    <label for="password">Contraseña*</label>
                    <input type="text" class="form-control" name="password-usuario">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="phone" class="form-control" name="telefono-usuario" value="{{ $usuario->telefono }}">
                </div>
            </div>

            <div class="form-row-3">
                <div class="form-group">
                    <label for="twitter">Cuenta twitter</label>
                    <input type="text" class="form-control" name="twitter-usuario" value="{{ $usuario->twitter }}">
                </div>
                <div class="form-group">
                    <label for="instagram">Cuenta instagram</label>
                    <input type="text" class="form-control" name="instagram-usuario" value="{{ $usuario->instagram }}">
                </div>
                <div class="form-group">
                    <label for="linkedin">Cuenta linkedin</label>
                    <input type="text" class="form-control" name="linkedin-usuario" value="{{ $usuario->linkedin }}">
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
                    <input type="text" class="form-control required-entidad" name="nombre-entidad" >
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
            <input type="hidden" name="id-usuario" value="{{ $usuario->id }}">
            <button type="submit" class="btn btn-primary" id='btn-editar-usuario'>Guardar cambios</button>
        </form>

    </main>


@endsection
