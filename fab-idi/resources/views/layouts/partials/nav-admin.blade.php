{{-- <div id="sidebar-admin">

    <a href="{{ route('inicio-admin') }}">
        <h4>Menu Principal</h4>
    </a>
    <button class="accordion"> <i class="fas fa-home"></i>Inicio</button>
    <div class="panel">
        <li class="{{ Route::is('gestion-videos') ? 'active' : '' }}">
            <a href="{{ route('gestion-videos') }}">Gestión de vídeos</a>
        </li>
        <li class="{{ Route::is('gestion-premios') ? 'active' : '' }}">
            <a href="{{ route('gestion-premios') }}">Gestión de premios</a>
        </li>
    </div>



    <button class="accordion">Section 2</button>
    <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
    </div>

    <button class="accordion">Section 3</button>
    <div class="panel">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.</p>
    </div>

    
</div> --}}
{{-- 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let acc = document.getElementsByClassName("accordion");
        let i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }

                // Guardar el estado en localStorage
                localStorage.setItem("accordionState", this.classList.contains("active"));
            });

            // Restaurar el estado desde localStorage
            let accordionState = localStorage.getItem("accordionState");
            if (accordionState === "true") {
                acc[i].classList.add("active");
                acc[i].nextElementSibling.style.display = "block";
            }
        }
    });
</script> --}}
<div id="sidebar-admin">
    <ul>
        <li>
            <a href="{{ route('inicio-admin') }}">
                <h4>Menu Principal</h4>
            </a>
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
            <button class="accordion"><i class="fa-solid fa-calendar-days"></i>Eventos</button>
            <ul class="panel">
                <li class="{{ Route::is('gestion-eventos') ? 'active' : '' }}">
                    <a href="{{ route('gestion-eventos') }}">Gestión de eventos</a>
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
  
    .active + .panel {
      display: block;
    }
  </style>