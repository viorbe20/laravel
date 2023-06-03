<div id="sidebar-admin">
    <ul>
        <li class="profile-container">
            <div>
                <img src="{{ asset('images/usuarios/' . Auth::user()->imagen) }}" alt="Foto de perfil" class="profile-picture">
                <p class="profile-name">Bienvenido, {{ Auth::user()->nombre }}</p>
            <div>
        </li>
        
        <li>
            <button class="accordion"><i class="fas fa-home"></i>Inicio</button>
            <ul class="panel">
                <li class="{{ Route::is('gestion-videos') ? 'active' : '' }}">
                    <a href="{{ route('gestion-videos') }}">Gestión de vídeos</a>
                </li>
                <li class="{{ Route::is('gestion-premios') ? 'active' : '' }}">
                    <a href="{{ route('gestion-premios') }}">Gestión de premios</a>
                </li>
            </ul>
        </li>
        <li>
            <button class="accordion"><i class="fa-solid fa-user"></i>Usuarios</button>
            <ul class="panel">
                <li class="{{ Route::is('gestion-usuarios') ? 'active' : '' }}">
                    <a href="{{ route('gestion-usuarios') }}">Gestión de usuarios</a>
                </li>
            </ul>
        </li>
        <li>
            <button class="accordion"><i class="fa-solid fa-flask"></i>Proyectos Intercentros</button>
            <ul class="panel">
                <li class="{{ Route::is('gestion-proyectos-intercentros') ? 'active' : '' }}">
                    <a href="{{ route('gestion-proyectos-intercentros') }}">Gestión de proyectos</a>
                </li>
            </ul>
        </li>
        <li>
            <button class="accordion"><i class="fa-solid fa-newspaper"></i>Revistas</button>
            <ul class="panel">
                <li class="{{ Route::is('gestion-eventos') ? 'active' : '' }}">
                    <a href="{{ route('gestion-eventos') }}">Gestión de Revistas</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let accordions = document.getElementsByClassName("accordion");

        for (let i = 0; i < accordions.length; i++) {
            accordions[i].addEventListener("click", function() {
                this.classList.toggle("active");
                let panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }

                // Guardar el estado en sessionStorage
                sessionStorage.setItem("panelState" + i, this.classList.contains("active"));
            });

            // Restaurar el estado desde sessionStorage
            let panelState = sessionStorage.getItem("panelState" + i);
            if (panelState === "true") {
                accordions[i].classList.add("active");
                accordions[i].nextElementSibling.style.display = "block";
            }
        }
    });
</script>

<style>
    .panel {
        display: none;
    }

    .active+.panel {
        display: block;
    }
</style>
