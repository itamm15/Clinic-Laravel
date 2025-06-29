@extends('layout')

@section('content')
  <div id='calendar' data-data='@json($visits)'></div>
@endsection

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const data = JSON.parse(calendarEl.getAttribute('data-data'));

    const calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: data
    });

    calendar.render();
  })
</script>
