<!-- resources/views/shop/show.blade.php -->
@extends('layouts.app') <!-- o il layout che usi di solito -->

@section('title', $item->name)

@section('styles')
    <link rel="stylesheet" href="{{ asset('.\assets\style.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>{{ $item->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $item->img ? asset('assets/img/' . $item->img) : '.\assets\logo\logo_ladame_web.jpg' }}" class="img-fluid" alt="{{ $item->name }}">
        </div>
        <div class="col-md-6">
            <p><strong>Descrizione:</strong> {{ $item->description }}</p>
            <p><strong>Prezzo:</strong> €{{ $item->price }}</p>
            <p><strong>Categoria:</strong> {{ $item->category->name }}</p>
            <p><strong>Collezioni:</strong> 
                @foreach($item->collections as $collection)
                    {{ $collection->name }}
                @endforeach
            </p>
            <p><strong>Colori:</strong> 
                @foreach($item->colors as $color)
                    {{ $color->name }}
                @endforeach
            </p>
            <p><strong>Misure:</strong> 
                @foreach($item->sizes as $size)
                    {{ $size->name }}@if(!$loop->last), @endif
                @endforeach
            </p>
            <a href="{{ route('shop') }}" class="btn btn-secondary">Aggiungi al carrello</a>
        </div>
    </div>
</div>
@endsection