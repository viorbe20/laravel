import $ from 'jquery';

$(document).ready(function () {
    console.log("app.js cargado");
    $("#form-select-tipo-usuario").change(function () {
        if ($(this).val() === "usuario") {
            $("#usuario_campos").show();
            console.log("usuario");
        } else if ($(this).val() === "entidad") {
            $("#usuario_campos").hide();
            $("#entidad_campos").show();
        } else {
            $("#usuario_campos").hide();
            $("#entidad_campos").hide();
            $("button[type='submit']").hide();
        }
    });
});
