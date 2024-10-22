var id;
var test;
var table;

$(document).ready(function() {
    table = $('#example').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        },
        //"dom": "tp",
        //"pageLength": 15,
        "ajax": {
            "url": 'routes/get-participants.php',
            data: function(d) {
                d.id = $('#select').val();
            }
        },
        "columns": [
            { "data": "nom" },
            { "data": "prenom" },
            //{ "data": "start" },
            //{ "data": "end" },
            { "data": "email", searchable: false },
            {
                "data": 'niveau',
                "searchtype": "select",
                render: function(niveau, full) {
                    if (niveau == 1) return "Débutant";
                    if (niveau == 2) return "Intermédiaire";
                    return "Fort";
                }
            }
        ],
        "order": [
            [2, 'desc']
        ],
        initComplete: function() {
            // Apply the search
        },
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
    }).filtersOn();
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
    $('#select').on('change', function() {
        id = this.value;
        table.ajax.reload();
        $("#ajout").addClass("w3-hide");
        $("#idevent").val($('select').val());
    });


});

function remplir() {
    $("#ajout").removeClass("w3-hide");
    $("#idevent").val($('select').val());
    $("#add").attr('action', 'index.php?todo=inscription_cours&page=participant&id=' + $('select').val());
}


function dr(d) {
    var id = $("#select").val();
    // console.log('<form action="index.php?todo=removeInscription&page=participant&id=' + id + '" method="post">')
    return '<div class="  mx-auto my-auto w3-round w3-card w3-center " id="descrip">' +
        '<div class="col-lg-2 col-md-1"></div><div class="container w3-padding form w3-card col-md-10 col-lg-8 w3-round w3-center">' +
        '<div id="suppr" >' +
        '<form action="index.php?todo=removeInscription&page=participant&id=' + id + '\" method="post">' +
        '<span class="w3-hide"><input id="idevent" type="text" name="id_event" value=\"' + d.id_event + '\"   required></span>' +
        '<span class="w3-hide"><input id="ideleve" type="text" name="id_eleve" value=\"' + d.id_eleve + '\"   required></span>' +
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