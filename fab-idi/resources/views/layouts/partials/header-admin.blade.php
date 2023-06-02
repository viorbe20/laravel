@auth
    @if (session('perfil') == 'admin')
        <header id='header-admin'>
            <h2>PANEL DE ADMINISTRACION FAB-IDI</h2>
            <div>
                <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </header>
    @endif
@endauth




