@extends('layouts.plantilla')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Mentorización')

@section('content')

    <main id='main-mentorizacion'>
        <h2>¿En qué consiste?</h2>
        <section>
            Investigación avanzada en una materia de 2º de bachillerato, que forma parte del itinerario de materias que debe tener un centro                    ducativo           de     la RED FAB-IDI, en la que los estudiantes proponen (ya al final de 1º de bachillerato) su PIP (Proyecto de Investigación Propio), y que los investigadores, estudiantes de universidad o personas especializadas de empresas externas, podrán ayudar a llevarlo a cabo (en los IES) mediante asesoramiento, consejos, etc.... Tendrá como tutor, su profesor/a de la materia de investigación Avanzada, y podrá ser asesorado por su mentor de investigación.
            
        </section>
        <h2>¿Quién puede participar?</h2>
        <section>
           Cualquier IES de la RED que cuenten con la materia de investigación avanzada¿Cómo participar? Escribir al correo de la RED, para incorporarse. 
        </section>
        <h2>Cómo puedo participar?</h2>
        <section>
           Rellena le siguiente informulario para participar en la mentorización.
           
           @if(Session::has('mensaje-enviado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('mensaje-enviado')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
           
              <form action="{{route('formulario-mentor')}}" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" >
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" >
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" >
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" >
                <label for="centro">Centro</label>
                <input type="text" id="centro" name="centro" placeholder="Centro" >
                <label for="curso">Curso</label>
                <input type="text" id="curso" name="curso" placeholder="Curso" >
                <label for="asignatura">Asignatura</label>
                <input type="text" id="asignatura" name="asignatura" placeholder="Asignatura" >
                <label for="pip">PIP</label>
                <input type="text" id="pip" name="pip" placeholder="PIP" >
                <label for="mentor">Mentor</label>
                <input type="text" id="mentor" name="mentor" placeholder="Mentor" >
                <label for="comentario">Comentario</label>
                <textarea id="comentario" name="comentario" placeholder="Comentario" ></textarea>
                <input type="submit" value="Enviar">
           </form>
        </section>
    </main>


@endsection
