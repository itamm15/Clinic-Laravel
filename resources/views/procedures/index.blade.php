@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Zabiegi</h2>
  @if (!auth()->user()->patient)
    <a href="{{ route('procedures.create') }}" class="btn btn-primary mb-3">Dodaj zabieg</a>
  @endif
</div>

<input type="text" placeholder="Podaj opis zabiegu" class="form-control mb-3 w-50" id="searcher">

<table class="table">
  <thead>
    <tr>
      <th>Lekarz</th>
      <th>Opis</th>
      <th>Akcje</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($procedures as $procedure)
      <tr class="data-to-filter" data-text="{{ $procedure->description }} ">
        <td>{{ $procedure->doctor->first_name }} {{ $procedure->doctor->last_name }}</td>
        <td>{{ $procedure->description }}</td>
        <td class="d-flex gap-2">
          @if (!auth()->user()->patient)
            <a href="{{ route('procedures.edit', $procedure->id) }}" class="btn btn-primary btn-sm">Edytuj</a>

            <form action="{{ route('procedures.delete', $procedure->id) }}" method="POST" onsubmit="return confirm('Na pewno usunąć?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
            </form>
          @else
            Brak akcji
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
