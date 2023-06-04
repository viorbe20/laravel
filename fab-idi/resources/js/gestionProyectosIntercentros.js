import $ from "jquery";

$(document).ready(function () {
    let tbody = document.querySelector("#tbody-tabla-proyectos-intercentros");
    let queryInput = $("#buscar-proyecto-intercentro");
    let numproyectosDestacados = $("#tbody-tabla-proyectos-destacados-intercentros tr").length;

    //Obtiene el curso académico del proyecto dado un ID
    function getCursoAcademico(proyectoId) {
        let cursoEncontrado = '';

        $.ajax({
            url: '/obtener-curso-academico-ajax/',
            method: 'GET',
            async: false,
            success: function (cursos) {
                cursos.forEach(curso => {
                    console.log(curso.id == proyectoId);
                    if (curso.id == proyectoId) {
                        console.log(curso.id == proyectoId);
                        cursoEncontrado = curso.curso_academico;
                    }
                });
            },
        });

        return cursoEncontrado;
    }


    function obtenerproyectos() {

        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-proyectos-intercentros");

        if (tbody) {
            tbody.innerHTML = "";

            return fetch("/obtener-proyectos-ajax", {
                method: "POST",
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).then(function (response) {
                //console.log(response);
                return response.json();
            });
        }

    }

    //Muestra todos los proyectos en la tabla
    function mostrarProyectos() {
        obtenerproyectos().then(function (proyectos) {
            tbody.innerHTML = "";

            let ultimosproyectos = proyectos.slice(-6);

            ultimosproyectos.forEach(function (proyecto) {

                //Solo se muestran en el listado los no destacados
                if (proyecto.destacado == 0 && proyecto.activo == 1) {
                    proyecto.curso_academico_id = getCursoAcademico(proyecto.curso_academico_id);
                    let rowHtml = `
                    <tr>
                        <td style="width:30px;"><img src="${rutaImagen}/${proyecto.imagen}" alt="foto-perfil-entidad" width="100%"></td>
                        <td>${proyecto.nombre}</td>
                        <td>${proyecto.curso_academico_id}</td>
                        <td>${proyecto.url ? `<a href="${proyecto.url}">Documentación</a>` : ''}</td>
                        <td>
                        <a href="/gestion-proyectos/editar/${proyecto.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/gestion-proyectos/eliminar/${proyecto.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                            ${numproyectosDestacados < 3 ?
                            `<a href="${proyecto.destacado ? `gestion-proyectos/quitar-destacado/${proyecto.id}` : `gestion-proyectos/destacar/${proyecto.id}`}" class="btn ${proyecto.destacado ? "btn-warning" : "btn btn-admin-proyecto"} btn-destacar-proyecto">
                            <i class="fa-solid fa-eye"></i>
                </a>`
                            : ''
                        }
                        </td>
                    </tr>
                `;
                    tbody.innerHTML += rowHtml;
                }
            });
        });
    }

    //Muestra los proyectos que coinciden con la búsqueda
    function mostrarProyectosCoincidentes() {
        
        obtenerproyectos().then(function (proyectos) {
            tbody.innerHTML = "";

            let proyectosFiltrados = proyectos.filter(function (proyecto) {
                return proyecto.nombre.toLowerCase().includes(queryInput.val());
            });


            proyectosFiltrados.forEach(function (proyecto) {

                //Solo se muestran en el listado los no destacados
                if (proyecto.destacado == 0 && proyecto.activo == 1) {
                    proyecto.curso_academico_id = getCursoAcademico(proyecto.curso_academico_id);
                    let rowHtml = `
                    <tr>
                        <td style="width:30px;"><img src="${rutaImagen}/${proyecto.imagen}" alt="foto-perfil-entidad" width="100%"></td>
                        <td>${proyecto.nombre}</td>
                        <td>${proyecto.curso_academico_id}</td>
                        <td>${proyecto.url ? `<a href="${proyecto.url}">Documentación</a>` : ''}</td>
                        <td>
                        <a href="/gestion-proyectos/editar/${proyecto.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/gestion-proyectos/eliminar/${proyecto.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                            ${numproyectosDestacados < 3 ?
                            `<a href="${proyecto.destacado ? `gestion-proyectos/quitar-destacado/${proyecto.id}` : `gestion-proyectos/destacar/${proyecto.id}`}" class="btn ${proyecto.destacado ? "btn-warning" : "btn btn-admin-proyecto"} btn-destacar-proyecto">
                            <i class="fa-solid fa-eye"></i>
                </a>`
                            : ''
                        }
                        </td>
                    </tr>
                `;
                    tbody.innerHTML += rowHtml;
                }
            });
        });
    }

    //Muestra proyectos al cargar la página
    mostrarProyectos();

    //Muestra los proyectos que coinciden con la búsqueda
    $("#buscar-proyecto-intercentro").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();

        if (query.length === 0) {
            mostrarProyectos();
        } else {
            mostrarProyectosCoincidentes();
        }
    });
});