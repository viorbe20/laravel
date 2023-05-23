@extends('layouts.plantilla')

@section('title', 'Inicio')

@section('content')
    <main>
        <section id='inicio-up'>

            <section id="inicio-videos">

                <div id="video-line-1">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/SEg33yRZ3sg"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>

                <div id="video-line-2">
                    <iframe width="280" height="158" src="https://www.youtube.com/embed/SEg33yRZ3sg"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <iframe width="280" height="158" src="https://www.youtube.com/embed/SEg33yRZ3sg"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                <a href="#" class="btn btn-primary">Ver videos</a>
            </section>

            <div id="inicio-text">
                <h3>Título del texto</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum corporis voluptatibus
                    ut
                    eum non, earum animi dolor minus ullam blanditiis temporibus debitis. Quis ex quam expedita,
                    corporis
                    totam debitis maiores?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum corporis voluptatibus
                    ut
                    eum non, earum animi dolor minus ullam blanditiis temporibus debitis. Quis ex quam expedita,
                    corporis
                    totam debitis maiores?</p>
            </div>
        </section>

        <section id="carousel">
            <section id='inicio-cards'>

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/premio.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's
                            content.</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/premio.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's
                            content.</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/premio.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's
                            content.</p>
                    </div>
                </div>
            </section>
            <a href="{{ route('mostrar-premios') }}" class="btn btn-primary" id='btn-mostrar-premios'>Ver premios</a>

        </section>


    </main>

@endsection
