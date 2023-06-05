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
        @php
            $embajadores = App\Models\User::where('id_colaborador', '2')->get();
            $mentores = App\Models\User::where('id_colaborador', '3')->get();
            $instituto = App\Models\User::where('id_colaborador', '4')->get();
        @endphp
        <div id="blog-slider">
            <div class="testimonial-item">
                <img src="testimonial1.jpg" alt="Testimonial 1">
                <h3>John Doe</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="testimonial-item">
                <img src="testimonial2.jpg" alt="Testimonial 2">
                <h3>Jane Smith</h3>
                <p>Nulla facilisi. Morbi id dapibus dolor.</p>
            </div>
            <div class="testimonial-item">
                <img src="testimonial3.jpg" alt="Testimonial 3">
                <h3>David Johnson</h3>
                <p>Phasellus vehicula euismod turpis in condimentum.</p>
            </div>
        </div>


    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#blog-slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000, // Cambia el valor a 3000 para que avance cada 3 segundos
                dots: true,
                arrows: true
            });
        });
    </script>
@endsection
