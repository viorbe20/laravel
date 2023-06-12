@extends('layouts.plantilla')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">

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
        <div class="carrusel-colaboradores">
            @foreach ($embajadores as $embajador)
            <div class="testimonial-item">
                <img class="card-img-top" src="{{ asset('images/usuarios/' . $embajador->imagen) }}" alt="Foto de perfil">
                <h3>{{ $embajador->nombre }}</h3>
                <p>{{ $embajador->descripcion }}</p>
                {!! !empty($embajador->facebook) ? "<a href='$embajador->facebook'><i class='fa-brands fa-facebook'></i></a>" : "" !!}
                {!! !empty($embajador->instagram) ? "<a href='$embajador->instagram'><i class='fa-brands fa-instagram'></i></a>" : "" !!}
                {!! !empty($embajador->twitter) ? "<a href='$embajador->twitter'><i class='fa-brands fa-twitter'></i></a>" : "" !!}
                </div>
            @endforeach
        </div>

        <div class="carrusel-colaboradores">
            @foreach ($mentores as $mentor)
                <div class="testimonial-item">
                    <img class="card-img-top" src="{{ asset('images/usuarios/' . $mentor->imagen) }}" alt="Foto de perfil">
                    <h3>{{ $mentor->nombre }}</h3>
                    <p>{{ $mentor->descripcion }}</p>
                </div>
            @endforeach
        </div>

        <div class="carrusel-colaboradores">
            @foreach ($institutos as $instituto)
                <div class="testimonial-item">
                    <img class="card-img-top" src="{{ asset('images/entidades/' . $instituto->imagen) }}"
                        alt="Foto de perfil">
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
            $(".carrusel-colaboradores").slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000, // Cambia el valor a 3000 para que avance cada 3 segundos
                dots: true,
                arrows: true,
                afterChange: function(currentSlide) {
            let totalSlides = $carruselColaboradores.slick('getSlick').slideCount;
            if (currentSlide === totalSlides - 1) {
                $carruselColaboradores.slick('slickGoTo', 0);
            }
        }
            });
            $('.slick-next.slick-arrow').text('');
            $('.slick-prev.slick-arrow').text('');

        });
    </script>

@endsection



