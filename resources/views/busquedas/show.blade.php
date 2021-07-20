@extends('layouts.app')
@section('botones')
<div class="py-3 mt-3 col-12">
    <a href="{{ route('inicio.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="icono" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
        Volver
    </a> 
</div>   
@endsection

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
            Total de la búsqueda: {{ $contador }}
        </h2>
        <div class="row">
            @foreach ($anuncios as $anuncio)
                @include('ui.anuncio')
            @endforeach
        </div>
    </div>

@endsection