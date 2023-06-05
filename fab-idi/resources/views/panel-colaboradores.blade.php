@extends('layouts.plantilla')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

@vite(['resources/js/test.js'])

@section('title', 'Panel de Colaboradores')

@section('content')
    <style>
        .testimonial-item {
            text-align: center;
        }

        .testimonial-item img {
            width: 100px;
            border-radius: 50%;
        }
    </style>
    <main id='main-panel-colaboradores'>
        <div class="blog-slider">
            @foreach ($embajadores as $embajador)
                <div class="testimonial-item">
                    <img src="testimonial1.jpg" alt="Testimonial 1">
                    <h3>{{ $embajador->nombre }}</h3>
                    <p>{{ $embajador->descripcion }}</p>
                </div>
            @endforeach
        </div>

        <div class="blog-slider">
            @foreach ($mentores as $mentor)
                <div class="testimonial-item">
                    <img src="testimonial1.jpg" alt="Testimonial 1">
                    <h3>{{ $mentor->nombre }}</h3>
                    <p>{{ $mentor->descripcion }}</p>
                </div>
            @endforeach
        </div>

        <div class="blog-slider">
            @foreach ($institutos as $instituto)
                <div class="testimonial-item">
                    <img src="testimonial1.jpg" alt="Testimonial 1">
                    <h3>{{ $instituto->nombre }}</h3>
                    <p>{{ $instituto->descripcion }}</p>
                </div>
            @endforeach
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".blog-slider").slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000, // Cambia el valor a 3000 para que avance cada 3 segundos
                dots: true,
                arrows: true
            });
        });
    </script>
@endsection
