@extends('layouts.app')

@section('title', 'Ver anuncio')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mis Publicaciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Mis Publicaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <article class="contenido-anuncio bg-white p-5 shadow">
      <h1 class="text-center mb-4">{{$anuncio->marcaCarro->marca}}</h1>

      <div class="anuncio-meta mt-3">
          <p>
              <span class="font-weight-bold text-primary">Escrito en:</span>
              <a class="text-dark" href="">
                  {{$anuncio->marcaCarro->marca}}
              </a>

          </p>
          <p>
              <span class="font-weight-bold text-primary">Autor:</span>
              <a class="text-dark" href="">
                  {{$anuncio->autor->name}}
              </a>
          </p>

          <p>
              <span class="font-weight-bold text-primary">Fecha:</span>
              @php
                  $fecha = $anuncio->created_at
              @endphp

              <fecha-anuncio fecha="{{$fecha}}" ></fecha-anuncio>
          </p>

          <div class="descripcion">
              <h2 class="my-3 text-primary">Descripción:</h2>

              {!! $anuncio->descripcion !!}
          </div>

          {{--<div class="preparacion">
              <h2 class="my-3 text-primary">Preparación</h2>

              {!! $anuncio->preparacion !!}
          </div>

          <div class="justify-content-center row text-center">
              <like-button
                  anuncio-id="{{$receta->id}}"
                  like="{{$like}}"
                  likes="{{$likes}}"
              ></like-button>
          </div>--}}
      </div>
  </article>
</div>
@endsection