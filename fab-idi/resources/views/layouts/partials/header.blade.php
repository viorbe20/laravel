<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="{{ asset('images/logo.png') }}" width='25%'>
        </a>
    </div>
    <h1>FAB-IDI</h1>
    <div class="col-md-3 text-end">
        <i class="fa fa-twitter" aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
        <i class="fa fa-youtube-play" aria-hidden="true"></i>        
        
        @guest
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success me-2">Registro</a>
        @endguest

        @auth
        <a href="{{ route('index') }}" class="btn btn-outline-secondary me-2">Regresar</a> 
            <a href="{{ route('logout') }}" class="btn btn-danger me-2">Logout</a>
            <a class="btn btn-primary">Bienvenid@, {{ Auth::user()->nombre }} </a>
        @endauth

    </div>
</header>
