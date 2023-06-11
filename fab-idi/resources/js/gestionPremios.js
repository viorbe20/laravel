import $ from "jquery";

$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-premios").html();
    let tbody = document.querySelector("#tbody-tabla-premios");
    let queryInput = $("#buscar-premio");
    //contar los premios destacados sacandolo del número de filas de la tabla
    let numPremiosDestacados = $("#tbody-tabla-premios-destacados tr").length;

    function obtenerPremios() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-premios");

        if (tbody) {
            tbody.innerHTML = "";
            return fetch("/obtener-premios-ajax", {
                method: "POST",
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).then(function (response) {
                return response.json();
            }).then(function (premios) {
                let premiosArray = Object.values(premios);
                // Filtrar premios activos
                let premiosActivos = premiosArray.filter(function (premio) {
                    return premio.activo === 1;
                });

                return premiosActivos;
            });

        }
    }

    //Muestra todos los premios en la tabla
    function mostrarPremios() {

        obtenerPremios().then(function (premios) {
            tbody.innerHTML = "";

            let ultimosPremios = premios.filter(function (premio) {
                return premio.destacado === 0;
            }).slice(-5).reverse();

            ultimosPremios.forEach(function (premio) {

                let fecha = new Date(premio.fecha);
                let fechaFormateada = `${String(fecha.getDate()).padStart(2, '0')}/${fecha.getMonth() + 1}/${fecha.getFullYear()}`;

                renderData(premio, fechaFormateada, numPremiosDestacados, tbody);

            });
        });
    }

    //Muestra los premios que coinciden con la búsqueda
    function mostrarPremiosCoincidentes() {

        obtenerPremios().then(function (premios) {
            tbody.innerHTML = "";

            let premiosFiltrados = premios.filter(function (premio) {
                return premio.titulo.toLowerCase().includes(queryInput.val());
            });

            premiosFiltrados.forEach(function (premio) {

                if (!premio.destacado && premio.activo == 1) {

                    let fecha = new Date(premio.fecha);
                    let fechaFormateada = `${String(fecha.getDate()).padStart(2, '0')}/${fecha.getMonth() + 1}/${fecha.getFullYear()}`;

                    renderData(premio, fechaFormateada, numPremiosDestacados, tbody);
                }
            });
        });
    }

    //Muestra premios al cargar la página
    mostrarPremios();


    //Muestra los premios que coinciden con la búsqueda
    $("#buscar-premio").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();

        if (query.length === 0) {
            mostrarPremios();
        } else {
            mostrarPremiosCoincidentes();
        }
    });
});

function renderData(premio, fechaFormateada, numPremiosDestacados, tbody) {
    let rowHtml = `
                    <tr>
                        <td style="width:10%;"><img src="${rutaImagen}/${premio.imagen}" alt="foto-perfil-entidad" width="30%"></td>
                        <td>${premio.titulo}</td>
                        <td>${fechaFormateada}</td>
                        <td>${premio.url ? `<a href="${premio.url}" target="_blank">${premio.url}</a>` : ''}</td>
                        <td>
                        <a href="/gestion-premios/editar/${premio.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href='#' class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                        ${numPremiosDestacados < 4 ?
            `<a href="${premio.destacado ? `gestion-premios/destacar/${premio.id}` : `gestion-premios/destacar/${premio.id}`}" class="btn ${premio.destacado ? "btn-admin-save" : "btn btn-admin-premio"} btn-destacar-premio">
                                            <i class="fa-solid fa-eye"></i>
                                </a>`
            : ''}
                        </td>
                    </tr>
                `;
    tbody.innerHTML += rowHtml;

    // Agregar evento de clic al enlace de eliminación
    // const enlaceEliminacion = tbody.querySelector('.btn-admin-delete');
    // console.log(enlaceEliminacion);

    // enlaceEliminacion.addEventListener('click', function() {
    //     console.log(enlaceEliminacion);
    //     const nombrePremio = this.dataset.nombrePremio;
    //     const idPremio = this.dataset.idPremio;

    //     $('#modal-eliminacion').find('.modal-body p').text(`¿Quieres eliminar el elemento '${nombrePremio}'?`);
    //     $('#modal-eliminacion').find('.modal-footer .btn-primary').attr('href', `/gestion-premios/eliminar-premio/${idPremio}`);

    //     $('#modal-eliminacion').modal('show');
    // });
}
