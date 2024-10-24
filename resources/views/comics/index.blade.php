@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')
<h1>
    Comics
</h1>
{{-- link alla pagina create --}}
<div class="mb-3">
  <a href="{{ route('comics.create') }}" class="btn btn-success">
    + Aggiungi nuovo fumetto
  </a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Serie</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($comics as $comic)
      <tr>
        <th scope="row">{{ $comic->id }}</th>
        <td>{{ $comic->title }}</td>
        <td>{{ $comic->series }}</td>
        <td>€{{ number_format($comic->price, 2, ',', '.') }}</td>
        <td>{{ $comic->type }}</td>
        <td>
            <a href="{{ route('comics.show', ['comic' => $comic->id ]) }}" class="btn btn-primary">
                Dettagli
            </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection