import $ from 'jquery';


$(document).ready(function () {
    const originalTbodyContent = $("#tbody-tabla-gestion-eventos").html();
    let tbody = document.querySelector("#tbody-tabla-gestion-eventos");
    let queryInput = $("#buscar-gestion-eventos");

    //Obtiene los todos eventos mediante una petición AJAX
    function obtenereventos() {
        let query = queryInput.val();

        if (query != undefined) {
            query = query.toLowerCase();
        }

        let tbody = document.querySelector("#tbody-tabla-gestion-eventos");

        if (tbody) {
            tbody.innerHTML = "";

            return fetch('/obtener-eventos-ajax', {
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

    //Muestra todos los eventos en la tabla
    function mostrareventos() {

        obtenereventos().then(function (eventos) {
            tbody.innerHTML = "";

            let ultimoseventos = eventos.slice(-6);

            ultimoseventos.forEach(function (evento) {
                let fecha = new Date(evento.fecha);
                let fechaFormateada = `${String(fecha.getDate()).padStart(2, '0')}/${fecha.getMonth() + 1}/${fecha.getFullYear()}`;

                    let rowHtml = `
                    <tr>
                    <td>${evento.nombre}</td>
                    <td>${fechaFormateada}</td>
                    <td>${evento.descripcion}</td>
                    <td>mejor no lo ponemos y solo en edicion</td>
                    <td>${evento.url ? evento.url : ''}</td>
                    <td>
                    <a href="/gestion-eventos/eliminar-evento/${evento.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                    <a href="/gestion-eventos/editar-evento/${evento.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
    
                    </td>
                </tr> 
                    `;
                    tbody.innerHTML += rowHtml;
                

            });

        });
    }

    function mostrareventosCoincidentes() {
        
        let query = queryInput.val().toLowerCase();
        
        obtenereventos().then(function (eventos) {
            tbody.innerHTML = "";

            let eventosFiltrados = eventos.filter(function (evento) {
                if (evento.nombre) {
                    return evento.nombre.toLowerCase().includes(query);
                }
                return false;
            });


            eventosFiltrados.forEach(function (evento) {
                    let rowHtml = `
                    <tr>
                    <td>${evento.nombre}</td>
                    <td>${evento.fecha}</td>
                    <td>${evento.descripcion}</td>
                    <td>${evento.imagen ? evento.imagen : ''}</td>
                    <td>${evento.url ? evento.url : ''}</td>
                    <td>
                    <a href="/gestion-eventos/eliminar-evento/${evento.id}" class="btn btn-danger btn-admin-delete"><i class="fa-solid fa-trash"></i></a>
                    <a href="/gestion-eventos/editar-evento/${evento.id}" class="btn btn-primary btn-admin-edit"><i class="fa-solid fa-pen-to-square"></i></a>
    
                    </td>
                </tr> 
                    `;
                    tbody.innerHTML += rowHtml;

            });
        });
    }

    //Muestra eventos al cargar la página
    if (window.location.pathname === "/gestion-eventos") {
        mostrareventos();
    }


    //Muestra los eventos que coincidan con la búsqueda
    $("#buscar-gestion-eventos").on("keyup", function () {
        let query = $(this).val().toLowerCase().trim();
        tbody.innerHTML = "";

        if (query.length === 0) {
            mostrareventos();
        } else {
            mostrareventosCoincidentes();
        }
    });
}); 