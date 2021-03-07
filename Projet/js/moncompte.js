function showTable() {
    var table = $("#table");
    if (table.hasClass("w3-hide")) {
        table.removeClass("w3-hide");
    } else {
        table.addClass("w3-hide");
    }
}

function showFormChange() {
    var div = $("#formulaire");
    if (div.hasClass("w3-hide")) {
        div.removeClass("w3-hide");
    } else {
        div.addClass("w3-hide");
    }
}