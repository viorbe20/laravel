@extends('layouts.plantilla')

@section('title', 'Panel de Colaboradores')

@section('content')

    <main id='main-panel-colaboradores'>
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
            <h5 class="card-title"> {{ $mentor->nombre }}</h5>
            <p class="card-title"> {{ $mentor->tipoColaborador }}</p>
            @if ($mentor->twitter != null)
            <h5 class="card-title"> {{ $mentor->nombre }}</h5>
            <i class="fab fa-twitter"></i>
        @endif
        
        </div>
    </div>
    @endforeach 

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
