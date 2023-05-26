import $ from 'jquery';

$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-gestion-usuarios").html();
    let tbody = document.querySelector("#tbody-tabla-gestion-usuarios");
    let queryInput = $("#buscar-gestion-usuarios");

    console.log('dd');
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
            console.log(response);
            return response.json();
        });
    }

    //Devuelve el perfil del us
    function getPerfil(){

    }

    //Muestra todos los usuarios en la tabla
    function mostrarUsuarios() {

        obtenerUsuarios().then(function (usuarios) {
            tbody.innerHTML = "";

            usuarios.forEach(function(usuario){

                if(usuario.activo == 1){
                    let rowHtml =`
                    <tr>
                    <td>${usuario.nombre}</td>
                    <td>${usuario.apellidos}</td>
                    <td>${usuario.email}</td>
                    <td>${usuario.telefono}</td>
                    <td>${usuario.twitter}</td>
                    <td>${usuario.instagram}</td>
                    <td>${usuario.linkedin}</td>
                    <td>${usuario.id_colaborador}</td>
                    <td>${usuario.perfil_id}</td>
                    <td>
                    <a href="/gestion-usuarios/eliminar-usuario/${usuario.id}" class="btn btn-danger btn-eliminar-ususario">Eliminar Usuario</a>
                    <a href="/gestion-usuarios/editar-usuario/${usuario.id}" class="btn btn-primary btn-editar-ususario">Editar Usuario</a>
    
                    </td>
                   </tr> 
                    `;
                    tbody.innerHTML += rowHtml;
                }

            });

    //         usuarios.forEach(function (usuario) {

    //             if (usuario.id_colaborador == null) {

    //                 let rowHtml = `
    //       <tr>
    //       <td>${usuario.nombre}</td>
    //       <td>${usuario.apellidos}</td>
    //       <input type="hidden" name="usuario_id" value="${usuario.id}">
    //       <td>
    //           <div style="display:flex;justify-content: flex-end">
    //             <div class="form-check" style="margin: 0% 2%">
    //               <input class="form-check-input" type="radio" name="tipo_colaborador" value="2" required>
    //               <label class="form-check-label">Colaborador/Embajador</label>
    //             </div>
    //             <div class="form-check" style="margin: 0% 2%">
    //               <input class="form-check-input" type="radio" name="tipo_colaborador" value="3" required>
    //               <label class="form-check-label">Colaborador/Mentor</label>
    //             </div>
    //             <div class="form-check" style="margin: 0% 2%">
    //               <input class="form-check-input" type="radio" name="tipo_colaborador" value="4" required>
    //               <label class="form-check-label">Colaborador/Instituto</label>
    //             </div>
    //             <a href="/crear-colaborador/${usuario.id}/" class="btn btn-success btn-crear-colaborador">Crear Colaborador</a>
    //           </div>
    //       </td>
    //     </tr>
    //   `;
    //                 tbody.innerHTML += rowHtml;

    //                 //Actualizar el valor del href del boton que corresponde con el tipo de colaborador seleccionado
    //                 $(document).on('change', 'input[name="tipo_colaborador"]', function () {
    //                     //actualizar el valor del href del boton que corresponde con el tipo de colaborador seleccionado
    //                     let botones = document.querySelectorAll('.btn-crear-colaborador');
    //                     let tipoColaboradorSeleccionado = $('input[name="tipo_colaborador"]:checked').val();

    //                     botones.forEach((boton) => {
    //                         //imprirmir por consola el id del usuario y el tipo de colaborador seleccionado
    //                         usuario.id = $(this).closest('tr').find('input[name="usuario_id"]').val();
    //                         boton.href = '/crear-colaborador/' + usuario.id + '/' + tipoColaboradorSeleccionado + '/';
    //                         console.log(boton.href);
    //                     });
    //                 });

    //             } else {
    //                 let rowHtml = `
    //         <tr>
    //           <td>${usuario.nombre}</td>
    //           <td>${usuario.apellidos}</td>
    //           <td style="display:flex;justify-content: flex-end">
    //             <a href="/eliminar-colaborador/${usuario.id}" class="btn btn-warning">Eliminar Colaborador</a>
    //           </td>
    //         </tr>`;
    //                 tbody.innerHTML += rowHtml;
    //             }
    //         });
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