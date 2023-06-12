@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
<main id="main-inicio">

    <section id='inicio-up'>

        <section id="inicio-videos">

            <div id="video-line-1">
                <iframe width="560" height="315" src="{{ $videos[0]->url }}" title="YouTube video player"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share" allowfullscreen></iframe>
            </div>

            <div id="video-line-2">
                <iframe width="280" height="158" src="{{ $videos[1]->url }}" title="YouTube video player"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share" allowfullscreen></iframe>
                <iframe width="280" height="158" src="{{ $videos[2]->url }}" title="YouTube video player"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share" allowfullscreen></iframe>
            </div>
            <a href="https://www.youtube.com/@antoniomarcosnazlucena9484" target="_blank"
                class="btn btn-principal mt-4">Ver videos</a>
        </section>

        <div id="inicio-text">
            <h3 class="titulo">¿QUÉ ES FAB-IDI?</h3>
            <p>FAB-IDI es una <b>red de centros</b> educativos que posee un itinerario de investigación desde 1º de <b>ESO</b> hasta
                2º de <b>bachillerato/ciclos formativos</b>. Esta red acredita a los estudiantes con capacidades demostradas
                para <b>realizar investigaciones</b> científicas en cualquier área. </p>
            <p>Se trata de una red que <b>ayuda</b> a otros centros a diseñar dicho itinerario y generar investigaciones
                comunes, donde los estudiantes forman <b>equipos intercentros</b> de trabajo. El éxito de este proyecto está
                demostrado.</p>
        </div>
    </section>

    <section id="section-premios">
        <div class="fondo-titulo">
            <h2 class="titulo">PREMIOS</h2>
        </div>
        <section id='inicio-cards'>
            @foreach ($premios as $premio)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/premios/'.$premio->imagen) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $premio->titulo }}</h5>
                    <p class="card-text text-justify">{{$premio->descripcion}}</p>
                </div>
            </div>

            @endforeach
        </section>
        <a href="{{ route('mostrar-premios') }}" class="btn btn-principal mt-4">Ver más premios</a>

    </section>


</main>

@endsection