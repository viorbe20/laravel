import $ from 'jquery';

$(document).ready(function () {
    //console.log("Contador de caracteres cargado");

    $("textarea").on("keyup", function () {
        //cuenta el numero de caracteres
        let numeroCaracteres = $(this).val().length;
        //MOSTRAR EL NUMERO DE CARACTERES 
        let limiteCaracteres = 240;
        let caracteresRestantes = limiteCaracteres - numeroCaracteres;
        $(".contador-caracteres").text(caracteresRestantes);
    });

});
