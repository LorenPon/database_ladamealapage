
@extends('layouts.app') 

@section('title', 'Shop')

@section('styles')
    <link rel="stylesheet" href="{{ asset('.\assets\style.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>Shop</h1>
    <div class="row">
        @foreach($items as $item)
        <div class="col-md-4">
            <div class="card mb-4 img-thumbnail shadow-sm">
                <img src="{{ $item->img ? asset('assets/img/' . $item->img) : '.\assets\logo\logo_ladame_web.jpg' }}" class="card-img-top img-thumbnail" alt="{{ $item->name }}">
                <div class="card-body">
                    <h5 class="card-title " >{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <p class="card-text"><strong>€{{ $item->price }}</strong></p>
                    <a href="{{ route('shop.show', $item->id) }}" class="btn btn-primary">Dettagli prodotto</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- Paginazione --}}
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($items->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                <li class="page-item"><a class="page-link" href="{{ $items->previousPageUrl() }}">&laquo;</a>
                </li>
                @endif

                @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                @if ($page == $items->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
                @endforeach

                @if ($items->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $items->nextPageUrl() }}">&raquo;</a></li>
                @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection