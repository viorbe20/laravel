<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="{{ asset('images/logo.png') }}" width='25%'>
        </a>
    </div>
    <h1>FAB-IDI</h1>
    <div id='header-right'>
        <div id='iconos-rrss'>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-youtube"></i>
        </div>

        @guest
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        @endguest

        @auth
            <div class="user-info">
                <span class="greeting">Bienvenid@,</span>
                <span class="username">{{ Auth::user()->nombre }}</span>
                <a href="{{ route('logout') }}" class="btn btn-danger me-2">Salir</a>
            </div>
        @endauth

    </div>
</header>
