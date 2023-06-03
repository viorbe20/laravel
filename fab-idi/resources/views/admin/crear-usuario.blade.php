@extends('layouts.plantilla-admin')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Crear Usuario')

@section('content')

    <main id='main-crear-usuario' class='main-admin'>
        <div class='page-subtitle'>
            <h2>ALTA USUARIO</h2>
        </div>

        <form method="POST" action="{{ route('crear-usuario-post') }}" enctype="multipart/form-data" id='form-crear-usuario'class='styled-form'>
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
                <div id="usuario-campos" style="display: none;">
                <div class="form-row-2">
                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control required-usuario" name="nombre-usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos*</label>
                        <input type="text" class="form-control" name="apellidos-usuario" required>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="profile">Perfil*</label>
                        <select class="form-control" name="select-perfil-usuario">
                            <option value="1">Admin</option>
                            <option value="2" selected>Usuario</option>
                            <option value="3">Embajador</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="colaborador">Tipo de Colaborador*</label>
                        <select class="form-control" name="select-tipo-colaborador" >
                            <option value="1" selected>Ninguno</option>
                            <option value="2">Embajador</option>
                            <option value="3">Mentor</option>
                            <option value="4">Instituto</option>
                        </select>
                    </div>
                </div>

                <div class="form-row-2">
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email-usuario" required>
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

                
                <div class="form-row-1">
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
            <div class='btn-container'>
                <button type="submit" class="btn btn-admin-save">Crear</button>
            </div>

        </form>

    </main>


@endsection
