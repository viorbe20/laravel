<nav class="navbar bg-light">
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

        <li class="{{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ URL::to('/') }}">Inicio</a>
        </li>

        @auth
            @if (session('perfil') == 'admin')
                <li class="{{ Route::is('gestion-videos*') ? 'active' : '' }}">
                    <a href="{{ route('gestion-videos') }}">Gestión de vídeos y premios</a>
                </li>
            @endif
        @endauth

        <li class="{{ Route::is('quienes-somos') ? 'active' : '' }}">
            <a href="{{ route('quienes-somos') }}">Quiénes somos</a>
        </li>

        <li class="{{ Route::is('https://jovenesconinvestigadores.wordpress.com/') ? 'active' : '' }}">
            <a href="https://jovenesconinvestigadores.wordpress.com/">Jóvenes
                con Investigadores</a>
        </li>

        <li class="{{ Route::is('mentorizacion') ? 'active' : '' }}">
            <a href="{{ route('mentorizacion') }}">Mentorizacion</a>
        </li>

        <li class="{{ Route::is('proyectos-intercentros') ? 'active' : '' }}">
            <a href="{{ route('proyectos-intercentros') }}">Proyectos Intercentros</a>
        </li>

        <li class="{{ Route::is('panel-colaboradores') ? 'active' : '' }}">
            <a href="{{ route('panel-colaboradores') }}">Panel de colaboradores</a>
        </li>

        @auth
            @if (session('perfil') == 'admin')
                <li class="{{ Route::is('gestion-colaboradores') ? 'active' : '' }}">
                    <a href="{{ route('gestion-colaboradores') }}">Gestión de colaboradores</a>
                </li>
            @endif
        @endauth

        <li class="{{ Route::is('eventos') ? 'active' : '' }}">
            <a href="{{ route('eventos') }}">Eventos</a>
        </li>

        <li class="{{ Route::is('revistas') ? 'active' : '' }}">
            <a href="{{ route('revistas') }}">Revistas</a>
        </li>

        @if (session('perfil') == 'admin')
            <li class="{{ Route::is('gestion-videos*') ? 'active' : '' }}">
                <a href="{{ route('gestion-videos') }}">Gestión de revistas</a>
            </li>
        @endif

        <li class="{{ Request::url() === 'https://profundizaiesmartinrivero.blogspot.com/' ? 'active' : '' }}">
            <a href="https://profundizaiesmartinrivero.blogspot.com/">Blog</a>
        </li>

        @if (session('perfil') == 'admin')
            <li class="{{ Route::is('gestion-usuarios*') ? 'active' : '' }}">
                <a href="{{ route('gestion-usuarios') }}">Gestión de usuarios</a>
            </li>
        @endif
    </ul>
</nav>
