@extends('layouts.admin')
@section('title', 'La dame à la page')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <div class="card-body p-5 bg-light rounded">
                    <h2 class="mb-4">Modifica item</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('admin.items.update', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nome del prodotto -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}">
                        </div>

                        <!-- Collezioni del item -->
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="form-label">Collezioni</label>
                                <div class="row">
                                    @foreach($collections as $collection)
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input type="checkbox" name="collections[]" id="collection{{ $collection->id }}" value="{{ $collection->id }}" class="form-check-input" {{ in_array($collection->id, $item->collections->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                <label for="collection{{ $collection->id }}" class="form-check-label">{{ $collection->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                       

                        <!-- Categorie del item -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Categorie</label>
                            <select name="category_id" id="category" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Colori del item -->
                        <div class="mb-3">
                            <label for="colors" class="form-label">Colori</label>
                            <select name="colors[]" id="colors" class="form-control" multiple required>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" {{ in_array($color->id, $item->colors->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Misure del item -->
                        <div class="mb-3">
                            <label for="sizes" class="form-label">Misure</label>
                            <select name="sizes[]" id="sizes" class="form-control" multiple required>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}" {{ in_array($size->id, $item->sizes->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $size->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Prezzo del item -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Prezzo</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $item->price }}" required>
                        </div>

                        <!-- Descrizione del item -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $item->description }}</textarea>
                        </div>

                        <!-- Immagine del prodotto -->
                        <div class="mb-3">
                            <label for="img" class="form-label">Immagine del prodotto</label>
                            <input type="file" name="img" id="img" class="form-control-file">
                            <img src="{{ asset('assets/img/' . $item->img) }}" alt="{{ $item->name }}" class="img-thumbnail mt-2" style="max-width: 150px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection