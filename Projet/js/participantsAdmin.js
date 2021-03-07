var id;
var test;
var table;

$(document).ready(function() {
    $.fx.off = true;
    id = $("#select").val();
    id = "2aecf08d771a4239da9d7622";
    $('#example tfoot th').each(function() {
        var title = $(this).text();
        if (title == "Email") {
            $(this).html('<input type="text" placeholder="Rechercher ' + title + '" />');
        }

    });
    table = $('#example').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
        //"dom": "tp",
        //"pageLength": 15,
        "ajax": {
            "url": 'scripts/get-participants.php',
            data: function(d) {
                d.id = $('#select').val();
            }
        },
        "columns": [
            { "data": "nom" },
            { "data": "prenom" },
            //{ "data": "start" },
            //{ "data": "end" },
            { "data": "email" },
        ],
        "order": [
            [2, 'desc']
        ],
        initComplete: function() {
            // Apply the search
            this.api().columns(0).every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change clear', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
            this.api().columns(2).every(function() {
                var column = this;
                console.log(column);
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        },
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
    }); //.filtersOn();
    $('#example tbody').on('click', 'td', function() {
        var colIndex = table.cell(this).index().column;
        //if (colIndex == 4) return;
        var data = table.row(this).data();
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        //alert( 'You clicked on '+data[1]+'\'s row' );
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(dr(row.data())).show();
            tr.addClass('shown');
        }
    });
    $('#example tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        console.log(row.child);
        /*if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }*/
    })
    $('select').on('change', function() {
        id = this.value;
        console.log(id);
        table.ajax.reload();
    });



});


function dr(d) {
    return '<div class="  mx-auto my-auto w3-round w3-card w3-center" id="descrip">' +
        '<div class="col-lg-2 col-md-1"></div><div class="container form w3-card col-md-10 col-lg-8 w3-roundn w3-center">' +
        '<form action="index.php?todo=addEvent&page=tableau" method="post">' +
        '<div class="col-md-6">' +
        '<p>Nom de l\'événement : <input id="formnom" type="text" name="nom" value=' + d.nom + ' required /></p>' +
        '<p>Description de l\'événement : <input id="formdesc" type="text" name="description" value=' + d.dec + ' required /></p>' +
        '<p>Jour de l\'événement : <input id="formdate" type="date" name="jour" value=' + d.date + ' class="hasDatepicker" required /></p></div>' +
        '<div class="col-md-6"><div class="col-sm-6">' +
        '<p>Heure de début : <input id="formstart" type="start" name="start" value=' + d.start + ' required /></p>' +
        '</div>' +
        '<div class="col-sm-6">' +
        '<p>Heure de fin : <input id="formend" type="end" name="end" value=' + d.end + ' required /></p>' +
        '</div>' +
        '<p> Lieu : <input id="lieu" type="text" name="lieu" value=' + d.lieu + ' required> </p>' +
        '<p class="w3-hide"><input id="banane" type="text" name="idevent" value=' + d.id + '  required></p>' +
        '<input type=submit value="Sauvegarder" style="color:blue" class="w3-btn my-auto">' +
        '</div></form>' +
        '<div id="suppr" >' +
        '<form action="index.php?todo=removeEvent&page=tableau" method="post">' +
        '<span class="w3-hide"><input id="idevent" type="text" name="idevent" value=' + d.id + '   required></span>' +
        '<input type=submit value="Supprimer" style="color:red" class="w3-btn">' +
        '</form>' +
        '</div>' +
        '</div>' +
        '</div>';
}

function affiche(title, arg) {
    myDate = arg.start;
    myDate2 = arg.end;
    var heure = myDate.getHours() - 1;
    if (heure == -1) {
        heure = 23;
    }
    var minutes = myDate.getMinutes();
    var heure1 = myDate2.getHours() - 1;
    if (heure1 == -1) {
        heure1 = 23;
    }
    var minutes1 = myDate2.getMinutes();
    var hor1;
    if (heure < 10) hor1 = "0" + heure.toString() + ":";
    else {
        hor1 = heure.toString() + ":";
    }
    if (minutes < 10) {
        hor1 += "0" + minutes.toString();
    } else hor1 += minutes.toString();
    $("#formstart").val(hor1);

    if (heure1 < 10) hor2 = "0" + heure1.toString() + ":";
    else {
        hor2 = heure1.toString() + ":";
    }
    if (minutes1 < 10) {
        hor2 += "0" + minutes1.toString();
    } else hor2 += minutes1.toString();
    var date2 = myDate.toISOString().substring(0, 10);
    $("#formdate").val(date2);
    $("#formstart").val(hor1);
    $("#formend").val(hor2);
    //$("#banane").val(arg.id);
    document.getElementById("banane").value = "test";
    console.log(arg.title != undefined);
    if (arg.title != undefined) {
        $("#formdesc").val(arg.extendedProps.description);
        $("#lieu").val(arg.extendedProps.lieu)
        document.getElementById("banane").value = arg.id;
        $("#idevent").val(arg.id);
        $("#banane").val(arg.id);
        $("#suppr").removeClass("w3-hide");
    }
    document.getElementById("nom").innerHTML = title;
    document.getElementById("formnom").value = title;
    $("#descrip").removeClass("w3-hide");
    $("#banane").addClass("w3-hide");
}



// setInterval(function() {
//     table.ajax.reload();
// }, 300);