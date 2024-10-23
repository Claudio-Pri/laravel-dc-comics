@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')
<h1>
    {{ $comic->title }}
</h1>
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