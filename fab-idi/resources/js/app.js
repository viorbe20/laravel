import $ from 'jquery';

$(document).ready(function () {

    $("#buscar-usuario").on("keyup", function () {
        const originalTbodyContent = $("#tbody-tabla-usuarios").html();
        console.log(originalTbodyContent);

        let tbody = document.querySelector("#tbody-tabla-usuarios");
        let query = $(this).val().toLowerCase();
        tbody.innerHTML = "";

        if (query.length === 0) {
            // Realizar una solicitud AJAX para obtener los datos de $lastUsuarios
            fetch('/obtener-usuarios-ajax', {
                method: 'POST',
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(function (response) {
                return response.json();
            }).then(function (usuarios) {
                let tbody = document.querySelector("#tbody-tabla-usuarios");
                tbody.innerHTML = ""; // Vaciar el tbody

                // Obtener solo los primeros 3 registros
                // Ordenar los usuarios en orden descendente
                usuarios.sort(function (a, b) {
                    return new Date(b.created_at) - new Date(a.created_at);
                });
                // Obtener los últimos 3 usuarios
                let ultimosUsuarios = usuarios.slice(0, 3);

                ultimosUsuarios.forEach(function (usuario) {
                    // Construir la estructura de la fila de la tabla
                    let rowHtml = `
                  <tr>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td>${usuario.id_colaborador}</td>
                    ${usuario.id_colaborador == null ?
                            `<td><button type="button" class="btn btn-success">Agregar</button></td>` :
                            `<td><button type="button" class="btn btn-warning">Eliminar</button></td>`
                        }
                  </tr>
                `;

                    // Agregar la fila al tbody
                    tbody.innerHTML += rowHtml;
                });

                console.log(tbody);
            });
        } else {
            fetch('/obtener-usuarios-ajax', {
                method: 'POST',
                body: JSON.stringify({ query: query }),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).then(function (response) {
                return response.json();
            }).then(function (usuarios) {
                let tbody = document.querySelector("#tbody-tabla-usuarios");
                tbody.innerHTML = ""; 

                //Hacer filtro de usuarios que coincidan con query
                let usuariosFiltrados = usuarios.filter(function (usuario) {
                    return usuario.nombre.toLowerCase().includes(query);
                }
                );

                usuariosFiltrados.forEach(function (usuario) {
                    // Construir la estructura de la fila de la tabla
                    let rowHtml = `
                  <tr>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td>${usuario.id_colaborador}</td>
                    ${usuario.id_colaborador == null ?
                            `<td><button type="button" class="btn btn-success">Agregar</button></td>` :
                            `<td><button type="button" class="btn btn-warning">Eliminar</button></td>`
                        }
                  </tr>
                `;

                    // Agregar la fila al tbody
                    tbody.innerHTML += rowHtml;
                }
                );
            });
        }

    });








    /*Muestra usuarios con coincidencia nombre en input*/
    // $("#buscar-usuario").on("keyup", function () {
    //     let query = $(this).val().toLowerCase();
    //     if (query.length === 0) {
    //         $('#resultado-busqueda').empty();
    //         return;
    //     }

    //     //llamda fetch
    //     fetch('/obtener-usuarios-ajax', {
    //         method: 'POST',
    //         body: JSON.stringify({ query: query }),
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     }).then(function (response) {
    //         console.log(response);
    //         return response.json();
    //     }).then(function (usuarios) {
    //         let resultadoBusqueda = $('#resultado-busqueda');
    //         resultadoBusqueda.empty();

    //         usuarios.forEach(function (usuario) {
    //             resultadoBusqueda.append(`<p>${usuario.nombre}</p>`);
    //         });

    //         console.log(resultadoBusqueda);
    //     })
    // });

    /*Formulario creación usuario. Muestra o esconde campos según tipo usuario*/
    $('#btn-crear-usuario').hide();
    $("#form-select-tipo-usuario").change(function () {
        if ($(this).val() === "usuario") {
            $("#usuario-campos").show();
            $(".required-usuario").prop("required", true);
            $("#entidad-campos").hide();
            $(".required-entidad").prop("required", false);
            $('#btn-crear-usuario').show();
        } else if ($(this).val() === "entidad") {
            $("#usuario-campos").hide();
            $(".required-usuario").prop("required", false);
            $("#entidad-campos").show();
            $(".required-entidad").prop("required", true);
            $('#btn-crear-usuario').show();
        } else {
            $("#usuario-campos").hide();
            $(".required-usuario").prop("required", false);
            $("#entidad-campos").hide();
            $(".required-entidad").prop("required", false);
            $('#btn-crear-usuario').hide();
        }
    });
});
