@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
<main>

    <section id='inicio-up'>

        <section id="inicio-videos">
            <div id="video-line-1">
                <iframe width="560" height="315" src="{{ $videos[0]->url }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>

            <div id="video-line-2">
                <iframe width="280" height="158" src="{{ $videos[1]->url }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share"
                    allowfullscreen></iframe>
                <iframe width="280" height="158" src="{{ $videos[2]->url }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;
                    web-share"
                    allowfullscreen></iframe>
            </div>
            <a href="#" class="btn btn-principal mt-4">Ver videos</a>
        </section>

        <div id="inicio-text">
            <h3>Título del texto</h3>
            <p>FAB-IDI es una red de centros educativos que poseen un itinerario de investigación desde 1º ESO hasta 2º
                de bachillerato/ciclos formativos, que acreditan a los estudiantes con capacidades demostradas para
                realizar investigaciones científicas en cualquier área. </p>
            <p>Se trata de una RED que ayuda a otros centros a
                diseñar dicho itinerario y generar investigaciones comunes en el que los estudiantes forman equipos
                intercentros de trabajo. El éxito de este proyecto está demostrado</p>
        </div>
    </section>

    <section id="section-premios">
        <h2 class="text-center">PREMIOS</h2>
        <section id='inicio-cards'>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/logo.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">Card title</h5>
                    <p class="card-text text-justify">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's
                        content.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/logo.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">Card title</h5>
                    <p class="card-text text-justify">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's
                        content.</p>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('img/logo.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">Card title</h5>
                    <p class="card-text text-justify">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's
                        content.</p>
                </div>
            </div>
        </section>
        <a href="#" class="btn btn-principal mt-4">Ver más premios</a>
    </section>


</main>

@endsection