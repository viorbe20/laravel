
import $ from "jquery";

//console.log('confirmarEliminacion.js cargado');

function confirmarEliminacion(enlacesEliminacion) {
    

    enlacesEliminacion.forEach(function (enlace) {
        enlace.addEventListener('click', function () {
            const nombrePremio = this.dataset.nombrePremio;
            const idPremio = this.dataset.idPremio;
            const urlEliminar = `/gestion-premios/eliminar/${idPremio}`;

            $('#modal-eliminacion').find('.modal-body p').text(`¿Quieres eliminar el elemento '${nombrePremio}'?`);
            $('#modal-eliminacion').find('.modal-footer .btn-admin-delete').attr('href', urlEliminar);
            document.querySelector('#modal-eliminacion').style.display = 'flex';
        });
    });

    $('#modal-eliminacion .btn-close').click(function () {
        document.querySelector('#modal-eliminacion').style.display = 'none';
    });
}

export default confirmarEliminacion;
