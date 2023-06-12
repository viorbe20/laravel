@extends('layouts.plantilla')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Quienes Somos')

@section('content')

<main id='main-quienes-somos'>
    <section id="historia-red">
        <div id="historia">
            <h2>Historia del FAB-IDI</h2>
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
            <img src="{{ asset('images/logo.png') }}" alt="logo-fab-idi">
        </div>
    </section>

    <section class="formulario mt-5">
        <div class="form-header">
            <h4>Inscripción a la red FAB-IDI</h4>
        </div>

        <form class="form-body" action="mailto:maria14998@gmail.com" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col">
                    <label class="form-label" for="tipo">Tipo de usuario</label>
                    <select class="form-select" name="tipo" id="tipo" required>
                        <option value="usuario">Usuario</option>
                        <option value="entidad">Entidad (Instituto, Universidad, Empresa.)</option>
                    </select>
                </div>
                <div class="mb-3 col">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" required>
                </div>
                <div class="mb-3 col">
                    <label class="form-label" for="nombre">Apellidos</label>
                    <input class="form-control" type="text" name="apellidos">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" required>
                </div>
                <div class="mb-3 col">
                    <label class="form-label" for="telefono">Teléfono</label>
                    <input class="form-control" type="tel" name="telefono">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label class="form-label" for="twitter">Twitter</label>
                    <input class="form-control" type="text" name="twitter">
                </div>
                <div class="mb-3 col">
                    <label class="form-label" for="instagram">Instagram</label>
                    <input class="form-control" type="text" name="instagram">
                </div>
                <div class="mb-3 col">
                    <label class="form-label" for="linkedin">Linkedin</label>
                    <input class="form-control" type="text" name="linkedin">
                </div>
            </div>
            <div class="mb-3 col">
                <label class="form-label" for="mensaje">Mensaje</label>
                <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <input class="btn btn-principal" type="submit" value="Enviar">
            </div>
        </form>
    </section>


</main>


@endsection