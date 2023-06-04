import $ from 'jquery';


$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-gestion-entidades").html();
    let tbody = document.querySelector("#tbody-tabla-gestion-entidades");
    let queryInput = $("#buscar-gestion-entidades");

    //Obtiene el el tipo de colaborador de una entidad dado un ID
    function getColaborador(colaboradorId) {
        let colaboradorEncontrado = '';

        $.ajax({
            url: '/obtener-colaboradores-ajax/',
            method: 'GET',
            async: false,  // Asegura que la petición se realice de forma síncrona
            success: function (colaboradores) {
                colaboradores.forEach(element => {
                    if (element.id == colaboradorId) {
                        colaboradorEncontrado = element.colaborador;
                    }
                });
            },
            error: function () {
                // Manejar el error en caso de que la subconsulta falle
            }
        });

        return colaboradorEncontrado;
    }

    //Obtiene todas las entidades mediante una petición AJAX
    function obtenerEntidades() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-gestion-entidades");

        if (tbody) {
            tbody.innerHTML = "";

            return fetch('/obtener-entidades-ajax', {
                method: 'POST',
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(function (response) {
                console.log(response);
                return response.json();
            });
        }
    }

    //Muestra todas las entidades en la tabla
    function mostrarEntidades() {

        obtenerEntidades().then(function (entidades) {
            tbody.innerHTML = "";

            let ultimasEntidades = entidades.slice(-6);

            ultimasEntidades.forEach(function (entidad) {

                if (entidad.colaborador_id != null) { //Si el entidad tiene un colaborador asociado se obtiene el nombre del colaborador
                    entidad.colaborador_id = getColaborador(entidad.colaborador_id);
                }


                let rowHtml = `
                    <tr>
                    <td style="width:30px;"><img src="${rutaImagen}/${entidad.imagen}" alt="foto-perfil-entidad" width="100%"></td>
                    <td>${entidad.nombre}</td>
                    <td>${entidad.representante ? entidad.representante : '' }</td>
                    <td>${entidad.email}</td>
                    <td>${entidad.telefono ? entidad.telefono : ''}</td>
                    <td>${entidad.url ? entidad.url : ''}</td>
                    <td>${entidad.colaborador_id ? entidad.colaborador_id : ''}</td>
                    <td>
                    <a href="/gestion-entidades/eliminar-entidad/${entidad.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                    <a href="/gestion-entidades/editar-entidad/${entidad.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
    
                    </td>
                   </tr> 
                    `;
                tbody.innerHTML += rowHtml;


            });

        });
    }

    function mostrarEntidadesCoincidentes() {

        let query = queryInput.val().toLowerCase();

        obtenerEntidades().then(function (entidades) {
            tbody.innerHTML = "";

            let entidadesFiltrados = entidades.filter(function (entidad) {
                if (entidad.nombre) {
                    return entidad.nombre.toLowerCase().includes(query);
                }
                return false;
            });


            entidadesFiltrados.forEach(function (entidad) {

                if (entidad.activo == 1) {
                    entidad.perfil_id = getPerfil(entidad.perfil_id);

                    if (entidad.id_colaborador != null) { //Si el entidad tiene un colaborador asociado se obtiene el nombre del colaborador
                        entidad.id_colaborador = getColaborador(entidad.id_colaborador);
                    }


                    let rowHtml = `
                    <tr>
                    <td>${entidad.nombre}</td>
                    <td>${entidad.apellidos}</td>
                    <td>${entidad.email}</td>
                    <td>${entidad.telefono ? entidad.telefono : ''}</td>
                    <td>${entidad.twitter ? entidad.twitter : ''}</td>
                    <td>${entidad.instagram ? entidad.instagram : ''}</td>
                    <td>${entidad.linkedin ? entidad.linkedin : ''}</td>
                    <td>${entidad.id_colaborador ? entidad.id_colaborador : ''}</td>
                    <td>${entidad.perfil_id}</td>
                    <td>
                    <a href="/gestion-entidades/eliminar-entidad/${entidad.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                    <a href="/gestion-entidades/editar-entidad/${entidad.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
    
                    </td>
                   </tr> 
                    `;
                    tbody.innerHTML += rowHtml;
                }

            });
        });
    }

    //Muestra entidades al cargar la página
    if (window.location.pathname === "/gestion-entidades") {
        mostrarEntidades();
    }


    //Muestra los entidades que coincidan con la búsqueda
    $("#buscar-gestion-entidades").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();
        tbody.innerHTML = "";

        if (query.length === 0) {
            mostrarEntidades();
        } else {
            mostrarEntidadesCoincidentes();
        }
    });
}); 