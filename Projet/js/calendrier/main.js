document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var initialLocaleCode = 'fr';
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        locale: initialLocaleCode,
        initialDate: Date.now(),
        navLinks: true, // can click day/week names to navigate views
        selectable: false,
        timeZone: 'Europe/Paris',
        slotMinTime: '08:00:00',
        height: 700,
        initialView: 'timeGridWeek',
        nowIndicator: true,
        selectMirror: true,
        allDaySlot: false,
        scrollTime: '14:00:00',
        select: function(arg) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                })
            }
            calendar.unselect()
        },
        eventClick: function(arg) {
            affiche(arg.event.title, arg.event)
        },
        editable: false,
        dayMaxEvents: true, // allow "more" link when too many events
        events: {
            url: 'routes/get-events.php',
        },
        loading: function(bool) {
            document.getElementById('loading').style.display =
                bool ? 'block' : 'none';
        }
    });

    calendar.render();
});

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
    // console.log(arg.title != undefined);
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

function descrip_a() {
    $("#descrip").addClass("w3-hide");
}