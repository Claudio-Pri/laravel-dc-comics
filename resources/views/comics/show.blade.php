@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')
<div class="container">
  <h1>
    {{ $comic->title }}
</h1>
</div>
<div class="container my-3">
  <a href="{{ route('comics.edit', ['comic' => $comic->id ]) }}" class="btn btn-success">
    Modifica
</a>
</div>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <ul>
            <li>
              Serie: {{ $comic->series }}
            </li>
            <li>
              Tipo: {{ $comic->type }}
            </li>
            <li>
              Prezzo: €{{ number_format($comic->price, 2, ',', '.') }}
            </li>
            <li>
              Artisti:
              <ul>
                {{-- decodifico la stringa json-> ciclo sul nuovo array --}}
                @foreach(json_decode($comic->artists, true) as $artist)
                  <li>
                    {{ $artist }}
                  </li>
                @endforeach
              </ul>
            </li>
            <li>
              Scrittori:
              <ul>
                {{-- decodifico la stringa json-> ciclo sul nuovo array --}}
                @foreach(json_decode($comic->writers, true) as $writer)
                  <li>
                    {{ $writer }}
                  </li>
                @endforeach
              </ul>
            </li>
          </ul>
          <p>
            {{ $comic->description }}
          </p>
        </div>
        <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="card-img-bottom">
      </div>
    </div>
  </div>
</div>

@endsection