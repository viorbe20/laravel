import $ from 'jquery';


$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-gestion-usuarios").html();
    let tbody = document.querySelector("#tbody-tabla-gestion-usuarios");
    let queryInput = $("#buscar-gestion-usuarios");

    //Obtiene el perfil del usuario dado un ID
    function getPerfil(perfilId) {
        let perfilEncontrado = '';

        $.ajax({
            url: '/obtener-perfiles-ajax/',
            method: 'GET',
            async: false,  // Asegura que la petición se realice de forma síncrona
            success: function (perfiles) {
                perfiles.forEach(element => {
                    if (element.id == perfilId) {
                        perfilEncontrado = element.perfil;
                    }
                });
            },
            error: function () {
                // Manejar el error en caso de que la subconsulta falle
            }
        });

        return perfilEncontrado;
    }

    //Obtiene el el tipo de colaborador de un usuario dado un ID
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

    //Obtiene los todos usuarios mediante una petición AJAX
    function obtenerUsuarios() {
        let query = queryInput.val();
        
        if (query != undefined) {
            query = query.toLowerCase();
        }
        
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

                if (usuario.activo == 1) {
                    usuario.perfil_id = getPerfil(usuario.perfil_id);

                    if (usuario.id_colaborador != null){ //Si el usuario tiene un colaborador asociado se obtiene el nombre del colaborador
                        usuario.id_colaborador = getColaborador(usuario.id_colaborador);
                    }
                        

                    let rowHtml = `
                    <tr>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td>${usuario.email}</td>
                    <td>${usuario.telefono ? usuario.telefono : ''}</td>
                    <td>${usuario.twitter ? usuario.twitter : ''}</td>
                    <td>${usuario.instagram ? usuario.instagram : ''}</td>
                    <td>${usuario.linkedin ? usuario.linkedin : ''}</td>
                    <td>${usuario.id_colaborador ? usuario.id_colaborador : ''}</td>
                    <td>${usuario.perfil_id}</td>
                    <td>
                    <a href="/gestion-usuarios/eliminar-usuario/${usuario.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                    <a href="/gestion-usuarios/editar-usuario/${usuario.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
    
                    </td>
                   </tr> 
                    `;
                    tbody.innerHTML += rowHtml;
                }

            });

        });
    }

    //Muestra todos los usuarios al cargar la página
    mostrarUsuarios();

    //Muestra los usuarios que coincidan con la búsqueda
    $("#buscar-gestion-usuarios").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();
        tbody.innerHTML = "";

        if (query.length === 0) {
            mostrarUsuarios();
        } else {
            mostrarUsuariosCoincidentes();
        }
    });
}); 