@extends('layouts.plantilla')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Quienes Somos')

@section('content')

    <main id='main-quienes-somos'>
    
        <section>
        <div>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores atque adipisci, molestias sequi quaerat culpa, libero id ducimus eligendi, consequuntur numquam rem nostrum facilis sit odit officia similique soluta tenetur.
        </div>
        <div>
            <img src="{{ asset('images/logo.png') }}"  alt="logo-fab-idi" width="25%">
        </div>
    </section>
    
    <section>
        <form>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <div>
                <label for="nombre">Apellidos</label>
                <input type="text" name="apellidos" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono">
            <div>
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="submit" value="Enviar">
            </div>
    </section>


    </main>


@endsection
