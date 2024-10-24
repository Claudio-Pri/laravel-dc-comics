@extends('layouts.app')

@section('page-title', 'Crea nuovo fumetto')

@section('main-content')
<h1>
    Crea nuovo fumetto
</h1>

<form action="{{ route('comics.store') }}" method="POST">
    
    {{-- titolo --}}
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo...">
    </div>
    {{-- descrizione --}}
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Inserisci la descrizione...">
    </div>
    {{-- copertina --}}
    <div class="mb-3">
        <label for="thumb" class="form-label">Copertina</label>
        <input type="text" class="form-control" id="thumb" name="thumb" placeholder="Inserisci la copertina...">
    </div>
    {{-- prezzo --}}
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo...">
    </div>
    {{-- serie --}}
    <div class="mb-3">
        <label for="series" class="form-label">Serie</label>
        <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci la serie...">
    </div>
    {{-- data pubblicazione --}}
    <div class="mb-3">
        <label for="sale_date" class="form-label">Data pubblicazione</label>
        <input type="date" class="form-control" id="sale_date" name="sale_date" placeholder="Inserisci la data di pubblicazione...">
    </div>
    {{-- tipo --}}
    <div class="mb-3">
        <label for="type" class="form-label">Tipo</label>
        <select class="form-select" id="type" name="type">
            <option selected disabled>Seleziona una categoria...</option>
            <option value="comic book">Comic book</option>
            <option value="graphic novel">Graphic novel</option>
          </select>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
      
</form>

@endsection