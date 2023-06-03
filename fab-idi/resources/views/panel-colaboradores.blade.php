@extends('layouts.plantilla')

@section('title', 'Panel de Colaboradores')

@section('content')



<main id='main-panel-colaboradores'>
    @php
    $embajadores = App\Models\User::where('id_colaborador', '2')->get();
    $mentores = App\Models\User::where('id_colaborador', '3')->get();
    $instituto = App\Models\User::where('id_colaborador', '4')->get();

    @endphp



    <h2>Panel de Colaboradores</h2>
    <h3>Embajadores</h3>

    <h3>Mentores</h3>

    <div id="myCarousel" class="carousel slide myCarousel" data-bs-ride="carousel" >
        
        <div class="carousel-inner">
            
            {{$mentores}}
            @php
            $totalMentores = count($mentores);
            $slides = ceil($totalMentores / 3);
            $currentSlide = 0;
            @endphp

            @for ($i = 0; $i < $slides; $i++) <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                
                <div class="team-boxed">
                    <div class="container">
                        <div class="row people">
                            @php
                            $startIndex = $currentSlide * 3;
                            $endIndex = min(($currentSlide + 1) * 3, $totalMentores);
                            $count = 0;

                            
                            // for ($j = $startIndex; $j < $endIndex; $j++) { $mentor=$mentores[$j]; 
                            //     <div class="col-md-6 col-lg-4 item">
                            //     <div class="box">
                            //         <img class="rounded-circle card-img-top"
                            //             src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1568709978/BBBootstrap/2.jpg">
                            //         <h3 class="name">{{ $mentor->nombre }}</h3>
                            //         <p class="title">Mentor</p>
                            //         <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus
                            //             lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et
                            //             interdum justo suscipit id. Etiam dictum feugiat tellus, a semper massa.</p>
                            //         <div class="social">
                            //             <a href="#"><i class="fa fa-facebook-official"></i></a>
                            //             <a href="#"><i class="fa fa-twitter"></i></a>
                            //             <a href="#"><i class="fa fa-instagram"></i></a>
                            //         </div>
                            //     </div>
                            // </div>

                            // $count++;
                            // }

                        // Si la diapositiva actual no tiene suficientes elementos, agregar elementos del principio
                        if ($count < 3) { $remaining=3 - $count; for ($k=0; $k < $remaining; $k++) {
                            $mentor=$mentores[$k]; @endphp <div class="col-md-6 col-lg-4 item">
                            <div class="box">
                                <img class="rounded-circle card-img-top"
                                    src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1568709978/BBBootstrap/2.jpg">
                                <h3 class="name">{{ $mentor->nombre }}</h3>
                                <p class="title">Mentor</p>
                                <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus
                                    lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et
                                    interdum justo suscipit id. Etiam dictum feugiat tellus, a semper massa.</p>
                                <div class="social">
                                    <a href="#"><i class="fa fa-facebook-official"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                    

                            @php
                            }
                            }
                            $currentSlide++;
                            @endphp
                    </div>
                </div>
            @endfor
        </div>
    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <button class="visually-hidden">Next</span>
    </button>
    </div>


</main>

@endsection