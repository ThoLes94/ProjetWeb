$(document).ready(function() {
    $("select").imagepicker()
})

function select() {
    var galerie = $("#galerie");
    var select = $("#select");
    if (galerie.hasClass("w3-hide")) {
        galerie.removeClass("w3-hide");
        select.addClass("w3-hide");
    } else {
        select.removeClass("w3-hide");
        galerie.addClass("w3-hide");
    }
}