@extends('layouts.app')


@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
            Resultados Búsqueda: {{$searchBrand}} {{$searchFuel}} {{$searchDoors}} {{$searchCar}}
        </h2>
        <div class="row">
            @foreach ($anuncios as $anuncio)
                @include('ui.anuncio')
            @endforeach
        </div>
    </div>

@endsection