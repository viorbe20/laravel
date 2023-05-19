@extends('layouts.plantilla')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Panel de Colaboradores')

@section('content')

    <main id='main-panel-colaboradores'>

  
        {{-- @php
            $mentores = App\Models\Colaborador::where('tipoColaborador', 'mentor')->get();
        @endphp --}}

        {{-- @foreach ($mentores as $mentor)
        <div class="items">  
            <div class="card">
                <div class="media media-2x1 gd-primary">
                    <img class="profile-image"
                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1568709978/BBBootstrap/2.jpg" width="15%">
                </div>
                <div class="card-body">
                    <h5 class="card-title"> {{ $mentor->nombre }}</h5>
                    <p class="card-title"> {{ $mentor->tipoColaborador }}</p>
                    @if ($mentor->twitter != null)
                        <i class="fab fa-twitter"></i>
                    @endif
                    @if ($mentor->facebook != null)
                    <i class="fa-brands fa-facebook-f"></i>
                    @endif
                    @if ($mentor->facebook != null)
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                    @endif
                    @if ($mentor->linkedin != null)
                    <i class="fa-brands fa-linkedin-in"></i>
                    @endif

                </div>
            </div>
        </div>
        @endforeach  --}}

        {{-- @foreach ($colaboradores as $colaborador)
            @if ($colaborador->tipoColaborador == 'Mentor')
                @php
                    $mentores = App\Models\Colaborador::where('tipoColaborador', 'Mentor')->get();
                @endphp


                @foreach ($mentores as $mentor)
                    <div class="card">
                        <div class="media media-2x1 gd-primary">
                            <img class="profile-image"
                                src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1568709978/BBBootstrap/2.jpg"
                                width="15%">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Delbert Simonas</h5>
                            <p class="card-text">"Online reviews can make or break a customer's decision to make a purchase.
                                Read about these customer review on site"</p>
                        </div>
                    </div>
                @endforeach
            @endif
        @endforeach --}}

    </main>


@endsection
