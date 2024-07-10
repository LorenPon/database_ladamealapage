@extends('layouts.admin') 
@section('title', 'La dame à la page')
@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="p-5 bg-light rounded">
            <h2 class="mb-4">Inserisci un nuovo prodotto</h2>

            <form method="POST" action="{{ route('admin.items.store')}}" enctype="multipart/form-data">
                @csrf

                <!-- Nome del prodotto-->
                <div class="form-group mb-3">
                    <label for="name" class="text-primary">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Categorie</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="collections" class="form-label">Collezioni</label>
                <div class="mb-3">
                    @foreach($collections as $collection)
                        <input type="checkbox" id="collection_{{$collection->id}}" name="collections[]" value="{{$collection->id}}">
                        <label for="collection_{{ $collection->id }}"> {{ $collection->name }} </label>
                    @endforeach
                </div> 

                <label for="colors" class="form-label">Colori</label>
                <div class="mb-3">
                    @foreach($colors as $color)
                        <input type="checkbox" id="color_{{$color->id}}" name="colors[]" value="{{$color->id}}">
                        <label for="color_{{ $color->id }}"> {{ $color->name }} </label>
                    @endforeach
                </div> 

                <label for="sizes" class="form-label">Misure</label>
                <div class="mb-3">
                    @foreach($sizes as $size)
                        <input type="checkbox" id="size_{{$size->id}}" name="sizes[]" value="{{$size->id}}">
                        <label for="size_{{$size->id}}"> {{ $size->name }} </label>
                    @endforeach
                </div> 

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <input type="text" class="form-control" id="description" name="description" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Immagine del prodotto</label>
                    <input type="file" class="form-control" id="img" name="img">
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form> 
        </div>
    </div>
</div>

@endsection