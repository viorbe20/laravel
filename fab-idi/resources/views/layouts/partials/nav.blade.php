<nav class="navbar bg-light">
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

        <li><a href="{{ route('index') }}" class="nav-link px-2">Inicio</a></li>

        @if (session('perfil') != 'admin' )
            <li><a href="#" class="nav-link px-2">Quiénes somos</a></li>
        @endif

        @if (session('perfil') == 'admin')
            <li><a href="{{ route('gestion-videos') }}" class="nav-link px-2">Gestión de vídeos y premios</a></li>
        @endif

        <li><a href="{{ route('panel-colaboradores') }}"  class="nav-link px-2">Panel Colaboradores</a></li>
        @if (session('perfil') == 'admin')
            <li><a href="{{ route('gestion-colaboradores') }}" class="nav-link px-2">Gestión de colaboradores</a></li>
        @endif

        <li><a href="#" class="nav-link px-2">Revistas</a></li>
         @if (session('perfil') == 'admin' )
            <li><a href="#" class="nav-link px-2">Gestión de revistas</a></li>
        @endif

        @if (session('perfil') == 'admin')
        <li><a href="#" class="nav-link px-2">Gestión de usuarios</a></li>
        @endif

         @if (session('perfil') != 'admin' )
            <li><a href="https://jovenesconinvestigadores.wordpress.com/" target="_blank" class="nav-link px-2">Jóvenes
                    con Investigadores</a></li>
            <li><a href="#" class="nav-link px-2">Mentorización</a></li>
            <li><a href="#" class="nav-link px-2">Proyectos Intercentros</a></li>
            <li><a href="#" class="nav-link px-2">Formularios Certificados</a></li>
            <li><a href="#" class="nav-link px-2">Asociación</a></li>
            <li><a href="#" class="nav-link px-2">Blog</a></li>
            <li><a href="#" class="nav-link px-2">Contacto</a></li>
        @endif


    </ul>
</nav>
