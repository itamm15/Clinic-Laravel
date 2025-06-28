@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Dokumenty</h2>
  <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">Dodaj dokument</a>
</div>

<input type="text" placeholder="Podaj opis" class="form-control mb-3 w-50" id="searcher">

<table class="table">
  <thead>
    <tr>
      <th>Pacjent</th>
      <th>Data</th>
      <th>Opis</th>
      <th>Akcje</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($documents as $document)
      <tr class="data-to-filter" data-text="{{ $document->description }} ">
        <td>{{ $document->patient->first_name }} {{ $document->patient->last_name }}</td>
        <td>{{ $document->date }}</td>
        <td>{{ $document->description }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
          <form action="{{ route('documents.delete', $document->id) }}" method="POST" onsubmit="return confirm('Na pewno usunąć?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
