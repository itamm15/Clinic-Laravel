@extends('layout')

@section('content')
  <a href="{{ route('visits.calendar') }}" class="btn btn-primary">Wszystkie</a>
  <a href="{{ route('visits.calendar', ['active' => 1]) }}" class="btn btn-success">Aktywne</a>
  <a href="{{ route('visits.calendar', ['active' => 0]) }}" class="btn btn-danger">Nieaktywne</a>
  <div id='calendar' class="mt-5" data-data='@json($visits)'></div>
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
