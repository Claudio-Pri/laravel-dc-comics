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
            <a href="{{ route('comics.edit', ['comic' => $comic->id ]) }}" class="btn btn-warning">
                Modifica
            </a>
            <form 
              {{-- doppia conferma cancellazione --}}
              onsubmit="return confirm('Sei sicuro di voler cancellare questo comic?')"
              action="{{ route('comics.destroy', ['comic' => $comic->id ]) }}" 
              method="POST" 
              class="d-inline-block">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                Emilina
              </button>
            </form>
            
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection