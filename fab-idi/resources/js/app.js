import $ from 'jquery';

$(document).ready(function () {
    
    $("#form-select-tipo-usuario").change(function () {
        if ($(this).val() === "usuario") {
            $("#usuario-campos").show();
            $(".required-usuario").prop("required", true);
            $("#entidad-campos").hide();
            $(".required-entidad").prop("required", false);
        } else if ($(this).val() === "entidad") {
            $("#usuario-campos").hide();
            $(".required-usuario").prop("required", false);
            $("#entidad-campos").show();
            $(".required-entidad").prop("required", true);
        } else {
            $("#usuario-campos").hide();
            $(".required-usuario").prop("required", false);
            $("#entidad-campos").hide();
            $(".required-entidad").prop("required", false);
        }
    });
});
