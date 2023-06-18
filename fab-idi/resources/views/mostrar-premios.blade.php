@extends('layouts.plantilla')

@section('title', 'Premios')

@section('content')


    <main id='main-premios'>
        <div class="gallery">
            @php
                $columnCount = 4; // Número de columnas deseadas
                $rowSize = ceil(count($premios) / $columnCount); // Tamaño de cada fila
            @endphp

            @foreach ($premios->chunk($rowSize) as $row)
                <div class="gallery__row">
                    @foreach ($row as $premio)
                        <div class="card">
                            <a href="{{ $premio->url }}" target="_blank" class="gallery__link">
                                <figure class="gallery__thumb">
                                    <img src="{{ asset('img/premios/' . $premio->imagen) }}" alt=""
                                        class="gallery__image">
                                    <figcaption class="gallery__caption">{{ $premio->titulo }}</figcaption>
                                </figure>
                            </a>
							<h4 class="">{{ $premio->titulo }}</h4>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

    </main>


@endsection
