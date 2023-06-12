@extends('layouts.plantilla')

@vite(['resources/js/altaUsuario.js'])

@section('title', 'Quienes Somos')

@section('content')

<main id='main-quienes-somos'>
    <section id="historia-red">
        <div id="historia">
            <h2 class="titulo">HISTORIA DEL FAB-IDI</h2>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores atque adipisci, molestias sequi
                quaerat
                culpa, libero id ducimus eligendi, consequuntur numquam rem nostrum facilis sit odit officia similique
                soluta tenetur.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores atque adipisci, molestias sequi
                quaerat
                culpa, libero id ducimus eligendi, consequuntur numquam rem nostrum facilis sit odit officia similique
                soluta tenetur.
            </p>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores atque adipisci, molestias sequi
                quaerat
                culpa, libero id ducimus eligendi, consequuntur numquam rem nostrum facilis sit odit officia similique
                soluta tenetur.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores atque adipisci, molestias sequi
                quaerat
                culpa, libero id ducimus eligendi, consequuntur numquam rem nostrum facilis sit odit officia similique
                soluta tenetur.
            </p>

        </div>
        <div id="img-red">
            <img src="{{ asset('img/colmena.png') }}" alt="colmena-fab-idi">
        </div>
    </section>

    <section class="formulario mt-5">
        <div class="form-header">
            <h4>INSCRIPCIÓN A LA RED FAB-IDI</h4>
        </div>

        <form class="form-body" action="{{ route('quienes-somos') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col">
                    <label class="form-label" for="tipoUsuario">TIPO DE USUARIO</label>
                    <select class="form-select" name="tipoUsuario" id="form-select-tipo-usuario" required>
                        <option value="" selected>Selecciona el tipo de usuario</option>
                        <option value="usuario">Usuario</option>
                        <option value="entidad">Entidad (Instituto, Universidad, Empresa...)</option>
                    </select>
                </div>
                <!-- USUARIO -->
                <div id="usuario-campos" style="display: none;">
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="nombre">NOMBRE*</label>
                            <input type="text" class="form-control required-usuario" name="nombre-usuario">
                        </div>
                        <div class="mb-3 col">
                            <label for="apellidos">APELLIDOS*</label>
                            <input type="text" class="form-control" name="apellidos-usuario">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="email">EMAIL*</label>
                            <input type="email" class="form-control" name="email-usuario">
                        </div>
                        <div class="mb-3 col">
                            <label for="telefono">TELÉFONO</label>
                            <input type="phone" class="form-control" name="telefono-usuario">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="twitter">TWITTER</label>
                            <input type="text" class="form-control" name="twitter-usuario">
                        </div>
                        <div class="mb-3 col">
                            <label for="instagram">INSTAGRAM</label>
                            <input type="text" class="form-control" name="instagram-usuario">
                        </div>
                        <div class="mb-3 col">
                            <label for="linkedin">LINKEDIN</label>
                            <input type="text" class="form-control" name="linkedin-usuario">
                        </div>
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label" for="mensaje">MENSAJE</label>
                        <textarea class="form-control" name="mensaje-usuario" id="mensaje-usuario" cols="20"
                            rows="5"></textarea>
                    </div>
                </div>
                <!-- ENTIDAD -->
                <div id="entidad-campos" style="display: none;">
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="nombre">NOMBRE*</label>
                            <input type="text" class="form-control required-entidad" name="nombre-entidad">
                        </div>
                        <div class="mb-3 col">
                            <label for="apellidos">REPRESENTANTE</label>
                            <input type="text" class="form-control" name="representante-entidad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="email">EMAIL*</label>
                            <input type="email" class="form-control" name="email-entidad">
                        </div>
                        <div class="mb-3 col">
                            <label for="telefono">TELÉFONO</label>
                            <input type="phone" class="form-control" name="telefono-entidad">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="web">WEB</label>
                            <input type="text" class="form-control" name="web-entidad">
                        </div>
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label" for="mensaje">MENSAJE</label>
                        <textarea class="form-control" name="mensaje-entidad" id="mensaje-entidad" cols="20"
                            rows="5"></textarea>
                    </div>
                </div>
                <div id="btn-crear-usuario" class="btn-submit mb-3">
                    <input class="btn btn-principal" type="submit" value="Enviar">
                </div>
        </form>
    </section>

    <div>
    @if (isset($enviado))
        @if ($enviado)
            <div class="alert alert-success mt-5" role="alert">
                <h4 class="alert-heading">¡Enhorabuena!</h4>
                <p>El formulario se ha enviado correctamente.</p>
                <hr>
                <p class="mb-0">Nos pondremos en contacto con usted cuando su solicitud sea aceptada. Gracias.</p>
            </div>
        @else
            <div class="alert alert-danger mt-5" role="alert">
                <h4 class="alert-heading">¡Error!</h4>
                <p>El formulario no se ha enviado correctamente.</p>
                <hr>
                <p class="mb-0">Por favor, inténtelo de nuevo más tarde.</p>
            </div>
        @endif
    @endif
    </div>


</main>


@endsection