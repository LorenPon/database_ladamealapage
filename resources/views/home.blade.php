@extends('layouts.app')

@section('title', 'La dame à la page')

@section('content')
      
<!------JUMBOTRON------->

<div class="jumbotron container">
    <img src=".\assets\img\background.jpg" alt="background" class="jumbotron">
    <h1 class="display-4">Il tuo stile, i tuoi accessori</h1>
    <p class="lead">La nuova collezione estate ti aspetta!</p>
    <div class= "flex-btn">
        <a class="btn btn-primary btn-lg d-flex justify-content-center" href="{{route('shop')}}" role="button">Shop now ></a>
    </div>
    </div>
</header>

@endsection