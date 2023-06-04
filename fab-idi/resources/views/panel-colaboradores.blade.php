@extends('layouts.plantilla')


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


@vite(['resources/js/test.js'])

@section('title', 'Panel de Colaboradores')

@section('content')
    <style>
        .carousel .carousel-indicators {
            bottom: -70px;
            background: #1abc9c;
        }

        .carousel-indicators li,
        .carousel-indicators li.active {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin: 1px 2px;
            box-sizing: border-box;
        }

        .carousel-indicators li {
            background: #e2e2e2;
            border: 4px solid #fff;
        }

        .carousel-indicators li.active {
            color: #fff;
            background: #1abc9c;
            border: 5px double;
        }
    </style>
    <main id='main-panel-colaboradores'>
        @php
            $embajadores = App\Models\User::where('id_colaborador', '2')->get();
            $mentores = App\Models\User::where('id_colaborador', '3')->get();
            $instituto = App\Models\User::where('id_colaborador', '4')->get();
        @endphp

        <div id="carousel-embajadores" class="carousel slide my-carousel" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-embajadores" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-embajadores" data-slide-to="1"></li>
                <li data-target="#carousel-embajadores" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <h4>Embajadores</h4>
                <div class="carousel-item active">
                    <div class="row">
                        @foreach ($embajadores->take(2) as $embajador)
                            <div class="col-sm-6">
                                <div class="testimonial-wrapper">
                                    <div class='testimonial-image'>
                                        <img src="{{ asset('images/usuarios/' . $embajador->imagen) }}" alt="Foto de perfil"
                                            class="profile-picture">
                                    </div>
                                    <div class='testimonial-name'>
                                        <p>{{ $embajador->nombre }}</p>
                                    </div>
                                    <div class='testimonial-rrss'>
                                        @if (!empty($embajador->twitter))
                                            <a href="{{ $embajador->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                        @endif
                                        @if (!empty($embajador->instagram))
                                            <a href="{{ $embajador->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                        @endif
                                        @if (!empty($embajador->linkedin))
                                            <a href="{{ $embajador->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{--slice(1): Toma una porción de 2 (chunk(2)) después del primer grupo. 
                En este caso, se omite el primer grupo de 2 elementos y se obtiene el resto de la colección.--}}
                @foreach ($embajadores->chunk(2)->slice(1) as $chunk)
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($chunk as $embajador)
                                <div class="col-sm-6">
                                    <div class="testimonial-wrapper">
                                        <div class='testimonial-image'>
                                            <img src="{{ asset('images/usuarios/' . $embajador->imagen) }}" alt="Foto de perfil"
                                                class="profile-picture">
                                        </div>
                                        <div class='testimonial-name'>
                                            <p>{{ $embajador->nombre }}</p>
                                        </div>
                                        <div class='testimonial-rrss'>
                                            @if (!empty($embajador->twitter))
                                                <a href="{{ $embajador->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                            @endif
                                            @if (!empty($embajador->instagram))
                                                <a href="{{ $embajador->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                            @endif
                                            @if (!empty($embajador->linkedin))
                                                <a href="{{ $embajador->linkedin }}"><i class="fa-brands fa-linkedin"></i></a>
                                            @endif
                                        </div>
    
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </main>

@endsection
