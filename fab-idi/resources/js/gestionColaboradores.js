import $ from 'jquery';

$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-usuarios").html();
    let tbody = document.querySelector("#tbody-tabla-usuarios");
    let queryInput = $("#buscar-usuario");

    //Obtiene los todos usuarios mediante una petición AJAX
    function obtenerUsuarios() {
        let query = queryInput.val().toLowerCase();
        tbody.innerHTML = "";

        return fetch('/obtener-usuarios-ajax', {
            method: 'POST',
            body: JSON.stringify({ query: query }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).then(function (response) {
            return response.json();
        });
    }

    //Muestra todos los usuarios en la tabla
    function mostrarUsuarios() {
        obtenerUsuarios().then(function (usuarios) {
            tbody.innerHTML = "";

            usuarios.forEach(function (usuario) {
                if (usuario.id_colaborador == null) {
                    let rowHtml = `
              <tr>
                <td>${usuario.nombre}</td>
                <td>${usuario.apellidos}</td>
                <td>
                  <form method="POST" action="{{ route('crear-colaborador-post', ['id' => ${usuario.id}]) }}">
                    <div style="display:flex">
                      <div class="form-check" style="margin: 0% 2%">
                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_embajador" value="2" required>
                        <label class="form-check-label" for="tipo_colaborador_embajador">
                          Colaborador/Embajador
                        </label>
                      </div>
                      <div class="form-check" style="margin: 0% 2%">
                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_mentor" value="3" required>
                        <label class="form-check-label" for="tipo_colaborador_mentor">
                          Colaborador/Mentor
                        </label>
                      </div>
                      <div class="form-check" style="margin: 0% 2%">
                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_instituto" value="4" required>
                        <label class="form-check-label" for="tipo_colaborador_instituto">
                          Colaborador/Instituto
                        </label>
                      </div>
                      <button type="submit" class="btn btn-success">Crear Colaborador</button>
                    </div>
                  </form>
                </td>
              </tr>`;
                    tbody.innerHTML += rowHtml;
                }
            });
        });
    }

    function mostrarUsuariosCoincidentes() {
        let query = queryInput.val().toLowerCase();
        obtenerUsuarios().then(function (usuarios) {
            tbody.innerHTML = "";

            let usuariosFiltrados = usuarios.filter(function (usuario) {
                return usuario.nombre.toLowerCase().includes(query);
            });

            usuariosFiltrados.forEach(function (usuario) {
                if (usuario.id_colaborador == null) {
                    let rowHtml = `
              <tr>
                <td>${usuario.nombre}</td>
                <td>${usuario.apellidos}</td>
                <td>
                  <form method="POST" action="{{ route('crear-colaborador-post', ['id' => ${usuario.id}]) }}">
                    <div style="display:flex">
                      <div class="form-check" style="margin: 0% 2%">
                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_embajador" value="2" required>
                        <label class="form-check-label" for="tipo_colaborador_embajador">
                          Colaborador/Embajador
                        </label>
                      </div>
                      <div class="form-check" style="margin: 0% 2%">
                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_mentor" value="3" required>
                        <label class="form-check-label" for="tipo_colaborador_mentor">
                          Colaborador/Mentor
                        </label>
                      </div>
                      <div class="form-check" style="margin: 0% 2%">
                        <input class="form-check-input" type="radio" name="tipo_colaborador" id="tipo_colaborador_instituto" value="4" required>
                        <label class="form-check-label" for="tipo_colaborador_instituto">
                          Colaborador/Instituto
                        </label>
                      </div>
                      <button type="submit" class="btn btn-success">Crear Colaborador</button>
                    </div>
                  </form>
                </td>
              </tr>`;
                    tbody.innerHTML += rowHtml;
                }
            });
        });
    }



    //Muestra todos los usuarios al cargar la página
    mostrarUsuarios();

    //Muestra los usuarios que coincidan con la búsqueda
    $("#buscar-usuario").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();
        tbody.innerHTML = "";

        if (query.length === 0) {
            mostrarUsuarios();
        } else {
            mostrarUsuariosCoincidentes();
        }
    });
});

