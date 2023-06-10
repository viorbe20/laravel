import $ from 'jquery';

$(document).ready(function () {
    //console.log("Contador de caracteres cargado");

    $("textarea").on("keyup", function () {
        let numeroCaracteres = $(this).val().length;
        let limiteCaracteres = 240;
        let caracteresRestantes = limiteCaracteres - numeroCaracteres;
        $(".contador-caracteres").text(caracteresRestantes);
    });

});
