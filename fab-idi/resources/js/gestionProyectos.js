import $ from "jquery";

$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-proyecto").html();
    let tbody = document.querySelector("#tbody-tabla-proyectos");
    let queryInput = $("#buscar-proyecto");
    //contar los proyectos destacados sacandolo del número de filas de la tabla
    let numproyectosDestacados = $("#tbody-tabla-proyectos-destacados tr").length;

    function obtenerproyectos() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-proyectos");
        console.log(tbody);


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
                return response.json();
            });
        }

    }

    //Muestra todos los proyectos en la tabla
    function mostrarproyectos() {

        obtenerproyectos().then(function (proyectos) {
            tbody.innerHTML = "";

            let ultimosproyectos = proyectos.slice(-6);

            ultimosproyectos.forEach(function (proyecto) {

                if (!proyecto.destacado) {

                    let rowHtml = `
                    <tr>
                        <td>${proyecto.titulo}</td>
                        <td>${proyecto.descripcion}</td>
                        <td>${proyecto.url ? proyecto.url : ''}</td>
                        <td>${proyecto.imagen}</td>
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
    function mostrarproyectosCoincidentes() {
        obtenerproyectos().then(function (proyectos) {
            tbody.innerHTML = "";

            let proyectosFiltrados = proyectos.filter(function (proyecto) {
                return proyecto.titulo.toLowerCase().includes(queryInput.val());
            });


            proyectosFiltrados.forEach(function (proyecto) {


                if (!proyecto.destacado) {

                    let fecha = new Date(proyecto.fecha);
                    let fechaFormateada = `${String(fecha.getDate()).padStart(2, '0')}/${fecha.getMonth() + 1}/${fecha.getFullYear()}`;

                    let rowHtml = `
                    <tr>
                    <td>${proyecto.titulo}</td>
                    <td>${fechaFormateada}</td>
                    <td>${proyecto.descripcion}</td>
                    <td>${proyecto.url ? proyecto.url : ''}</td>
                    <td>${proyecto.imagen}</td>
                    <td>
                    <a href="/gestion-proyectos/editar/${proyecto.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="/gestion-proyectos/eliminar/${proyecto.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                    ${numproyectosDestacados < 3 ?
                            `<a href="${proyecto.destacado ? `gestion-proyectos/quitar-destacado/${proyecto.id}` : `gestion-proyectos/destacar/${proyecto.id}`}" class="btn ${proyecto.destacado ? "btn-warning" : "btn btn-admin-proyecto"} btn-destacar-proyecto">
                            <i class="fa-sharp fa-solid fa-eye"></i></a>`
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
    if (window.location.pathname === "/gestion-proyectos") {
        mostrarproyectos();
    }

    //Muestra los proyectos que coinciden con la búsqueda
    $("#buscar-proyecto").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();

        if (query.length === 0) {
            mostrarproyectos();
        } else {
            mostrarproyectosCoincidentes();
        }
    });
});