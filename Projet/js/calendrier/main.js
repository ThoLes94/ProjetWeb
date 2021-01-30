document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var initialLocaleCode = 'fr';
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    locale: initialLocaleCode,
    initialDate: Date.now(),
    navLinks: true, // can click day/week names to navigate views
    selectable: false,
    selectMirror: true,
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
      if (confirm('Êtes-vous sûr de vouloir vous inscrire à cet événement?')) {
        //arg.event.remove()
      }
    },
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: {
      url: 'scripts/get-events.php', 
    },
    loading: function(bool) {
      document.getElementById('loading').style.display =
        bool ? 'block' : 'none';
    }
  });

  calendar.render();
});
