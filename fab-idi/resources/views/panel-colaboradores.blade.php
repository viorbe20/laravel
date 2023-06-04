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
        body {
            font-family: "Open Sans", sans-serif;
        }

        h2 {
            color: #000;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            position: relative;
            margin: 30px 0 60px;
        }

        h2::after {
            content: "";
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 4px;
            border-radius: 1px;
            background: #1abc9c;
            left: 0;
            right: 0;
            bottom: -20px;
        }

        .carousel .carousel-item {
            color: #999;
            overflow: hidden;
            min-height: 120px;
            font-size: 13px;
        }

        .carousel .media {
            position: relative;
            padding: 0 0 0 20px;
        }

        .carousel .media img {
            width: 75px;
            height: 75px;
            display: block;
            border-radius: 50%;
        }

        .carousel .testimonial-wrapper {
            padding: 0 10px;
        }

        .carousel .testimonial {
            color: #808080;
            position: relative;
            padding: 15px;
            background: #f1f1f1;
            border: 1px solid #efefef;
            border-radius: 3px;
            margin-bottom: 15px;
        }

        .carousel .testimonial::after {
            content: "";
            width: 15px;
            height: 15px;
            display: block;
            background: #f1f1f1;
            border: 1px solid #efefef;
            border-width: 0 0 1px 1px;
            position: absolute;
            bottom: -8px;
            left: 46px;
            transform: rotateZ(-46deg);
        }

        .carousel .star-rating li {
            padding: 0 2px;
        }

        .carousel .star-rating i {
            font-size: 16px;
            color: #ffdc12;
        }

        .carousel .overview {
            padding: 3px 0 0 15px;
        }

        .carousel .overview .details {
            padding: 5px 0 8px;
        }

        .carousel .overview b {
            text-transform: uppercase;
            color: #1abc9c;
        }

        .carousel .carousel-indicators {
            bottom: -70px;
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

        .item {
            text-align: center;
        }
    </style>
    <main id='main-panel-colaboradores'>
        @php
            $embajadores = App\Models\User::where('id_colaborador', '2')->get();
            $mentores = App\Models\User::where('id_colaborador', '3')->get();
            $instituto = App\Models\User::where('id_colaborador', '4')->get();
        @endphp

        <div id="carousel-embajadores" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-embajadores" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-embajadores" data-slide-to="1"></li>
                <li data-target="#carousel-embajadores" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                        @foreach ($embajadores->take(2) as $embajador)
                            <div class="col-sm-6">
                                <div class="testimonial-wrapper">
                                    <div class='testimonial-image'>
                                        <img src="{{ $embajador->nombre }}" alt="Foto de perfil" class="profile-picture">
                                    </div>
                                    <div class='testimonial-name'>
                                        <p>{{ $embajador->nombre }}</p>
                                    </div>
                                    <div class='testimonial-rrss'>
                                        <p>{{ $embajador->twitter }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @foreach ($embajadores->chunk(2)->slice(1) as $chunk)
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($chunk as $embajador)
                                <div class="col-sm-6">
                                    <div class="testimonial-wrapper">
                                        <div class='testimonial-image'>
                                            <img src="{{ $embajador->nombre }}" alt="Foto de perfil"
                                                class="profile-picture">
                                        </div>
                                        <div class='testimonial-name'>
                                            <p>{{ $embajador->nombre }}</p>
                                        </div>
                                        <div class='testimonial-rrss'>
                                            <p>{{ $embajador->twitter }}</p>
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
