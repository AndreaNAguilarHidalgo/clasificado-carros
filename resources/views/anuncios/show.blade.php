@extends('layouts.app')

@section('title', 'Ver anuncio')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Anuncios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('inicio.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Anuncios</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <article class="contenido-anuncio bg-white p-5 shadow">
            <h1 class="text-center mb-4">{{ $anuncio->marcaCarro->marca }}</h1>

            <div class="anuncio-meta mt-3">
                <p>
                    <span class="font-weight-bold text-primary">Escrito en:</span>
                    <a class="text-dark" href="">
                        {{ $anuncio->marcaCarro->marca }}
                    </a>

                </p>
                <p>
                    <span class="font-weight-bold text-primary">Autor:</span>
                    <a class="text-dark" href="">
                        {{ $anuncio->autor->name }}
                    </a>
                </p>

                <p>
                    <span class="font-weight-bold text-primary">Fecha:</span>
                    @php
                        $fecha = $anuncio->created_at;
                    @endphp

                    <fecha-anuncio fecha="{{ $fecha }}"></fecha-anuncio>
                </p>

                <div class="descripcion">
                    <h2 class="my-3 text-primary">Descripción:</h2>

                    {!! $anuncio->descripcion !!}
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            Galeria de Imágenes:
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($anuncio->images as $image)
                                <div id="idimagen-{{ $image->id }}" class="col-sm-2">
                                    <a href="{{ $image->url }}" data-toggle="lightbox" data-title="Id:{{ $image->id }}"
                                        data-gallery="gallery">
                                        <img style="width:280px; height:150px;" src=" {{ asset($image->url) }}"
                                            class="img-fluid mb-2" />
                                    </a>
                                    <br>
                                    <a style="display:none" href="{{ $image->url }}">
                                        <i class="fas fa-trash-alt" style="color:red"></i> Id:{{ $image->id }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
@endsection
