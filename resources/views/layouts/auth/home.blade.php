@extends('layouts.auth.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            
            <h1>Benvenuto nella nostra applicazione</h1>
            @auth
            <p>Benvenuto, {{ Auth::user()->name }}</p>
            @else
            <p>Benvenuto!</p>
            @endauth
        </div>
    </div>
</div>

@endsection
