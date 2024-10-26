@extends('layouts.app')

@section('page-title', 'Modifica '.$comic->title)

@section('main-content')
<h1>
    Modifica {{ $comic->title }}
</h1>

<form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
    @csrf
    {{-- direttiva per cambiare il metodo --}}
    @method('PUT')
    {{-- titolo --}}
    <div class="mb-3">
        <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
        <input 
            type="text" 
            class="form-control" 
            id="title" 
            name="title" 
            required 
            maxlength="128" 
            placeholder="Inserisci il titolo..." 
            value="{{ $comic->title }}">
    </div>
    {{-- descrizione --}}
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
        <input 
            type="text" 
            class="form-control" 
            id="description" 
            name="description" 
            required 
            placeholder="Inserisci la descrizione..."
            value="{{ $comic->description }}">
    </div>
    {{-- copertina --}}
    <div class="mb-3">
        <label for="thumb" class="form-label">Copertina</label>
        <input 
            type="text" 
            class="form-control" 
            id="thumb" 
            name="thumb" 
            placeholder="Inserisci la copertina..."
            value="{{ $comic->thumb }}">
    </div>
    {{-- prezzo --}}
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo <span class="text-danger">*</span></label>
        <input 
            type="number" 
            class="form-control" 
            id="price" 
            step="0.01" 
            min="0" 
            max="999.99" 
            name="price" 
            required 
            placeholder="Inserisci il prezzo..."
            value="{{ $comic->price }}">
    </div>
    {{-- serie --}}
    <div class="mb-3">
        <label for="series" class="form-label">Serie <span class="text-danger">*</span></label>
        <input 
            type="text" 
            class="form-control" 
            id="series" 
            name="series" 
            required 
            maxlength="64" 
            placeholder="Inserisci la serie..."
            value="{{ $comic->series }}">
    </div>
    {{-- data pubblicazione --}}
    <div class="mb-3">
        <label for="sale_date" class="form-label">Data pubblicazione</label>
        <input 
            type="date" 
            class="form-control" 
            id="sale_date" 
            name="sale_date" 
            placeholder="Inserisci la data di pubblicazione..."
            value="{{ $comic->sale_date }}">
    </div>
    {{-- tipo --}}
    <div class="mb-3">
        <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
        <select class="form-select" id="type" name="type" required>
            <option
                @if(!isset($comic->type) || $comic->type == '')
                    selected
                @endif
                disabled>Seleziona una categoria...</option>
            <option 
                @if($comic->type == 'comic book')
                    selected
                @endif
                value="comic book">Comic book</option>
            <option
                @if($comic->type == 'graphic novel')
                    selected
                @endif
                value="graphic novel">Graphic novel</option>
          </select>
    </div>
    {{-- Artisti --}}
    <div class="mb-3">
        <label for="artists" class="form-label">Artisti</label>
        <input 
            type="text" 
            class="form-control" 
            id="artists" 
            name="artists" 
            aria-describedby="artists-help" 
            placeholder="Inserisci gli artisti..."
            value="{{ implode(',', json_decode($comic->artists)) }}">
        <div id="artists-help" class="form-text">
            Inserire i nomi degli artisti separati da virgole
        </div>
    </div>
    {{-- Scrittori --}}
    <div class="mb-3">
        <label for="writers" class="form-label">Scrittori</label>
        <input 
            type="text" 
            class="form-control" 
            id="writers" 
            name="writers" 
            aria-describedby="writers-help" 
            placeholder="Inserisci gli scrittori..."
            value="{{ implode(',', json_decode($comic->writers)) }}">
        <div id="writers-help" class="form-text">
            Inserire i nomi degli scrittori separati da virgole
        </div>
    </div>

    <button type="submit" class="btn btn-warning">Conferma modifica</button>

    <a href="{{ route('comics.show', ['comic' => $comic->id])}}" class="btn btn-secondary">Annulla</a>
      
</form>

@endsection