@extends('layouts.plantilla')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section('title', 'Proyectos Intercentros')

@section('content')

    <main id='main-proyectos-intercentros'>
        @php
            $proyectosAnteriores = App\Models\Proyecto::where('destacado', '1')
                ->where('tipo_proyecto_id', '2')
                ->get();
        @endphp
        <div>
            <h4>¿Qué es?</h4>
            <p>Queremos tener una batería de proyectos de investigación creados por los IES de la RED, que puedan ser
                utilizados por los nuevos centros que se incorporen a la RED, y en el que los estudiantes de los distintos
                centros puedan ponerse en contacto entre si, para ayudarse. Los resultados pueden ser compartidos y
                presentados conjuntamente en eventos como ferias o congresos.
            </p>

            <h4>¿Quién puede participar?</h4>
            <p>
                Cualquier nuevo centro de la RED, incluso otros centros que no estén en la RED pero que quieran iniciarse y
                probar.
            </p>

            <h4>¿Cómo participar?</h4>
            <p>Escribir una petición al centro que lo ha propuesto. </p>

            <h3>Proyectos Anteriores</h3>
            <div id='panel-proyectos-intercentros-destacados'>
                @foreach ($proyectosAnteriores as $proyecto)
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/proyectos/' . $proyecto->imagen) }}" alt="Foto de perfil"
                        class="profile-picture">
                        <div class="card-body">
                            <h5 class="card-title">{{ $proyecto->nombre }}</h5>
                            <p class="card-text">{{ $proyecto->descripcion }}</p>
                            <a href="{{ $proyecto->url }}" class="btn btn-admin-save">Saber más</a>
                        </div>
                    </div>
                @endforeach


    </main>


@endsection
