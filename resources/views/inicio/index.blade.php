@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra tú próximo automóvil</p>
                </diV>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="marca" class="form-control" id="marca">
                                            <option value="">-- Elige la marca --</option>
                                            @foreach ($marcas as $marca)
                                                <option value="{{ $marca->id }}"> {{ $marca->marca }} </option>
                                            @endforeach
                                        </select><!-- FIN SELECT MARCA -->
                                    </div>
                                    <!--FIN FORM-GROUP-->
                                    <div class="form-group">
                                        <select name="doors" class="form-control" id="doors">
                                            <option value="">-- Elige Núm de puertas --</option>
                                        </select>
                                    </div>
                                </div>
                                <!--FIN COL-MD-6-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="tipoCarro" class="form-control" id="tipoCarro">
                                            <option value="">-- Elige el tipo de auto --</option>
                                            @foreach ($tipoAuto as $tipo)
                                                <option value="{{ $tipo->id }}"> {{ $tipo->nombre }} </option>
                                            @endforeach
                                        </select>
                                        <!--FIN SELECT TIPO CARRO-->
                                    </div>
                                    <!--FIN FORM-GROUP-->
                                    <div class="form-group">
                                        <select name="combustible" class="form-control" id="combustible">
                                            <option value="">-- Tipo de combustible --</option>
                                            @foreach ($combustible as $combustible)
                                                <option value="{{ $combustible->id }}"> {{ $combustible->tipo }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--FIN COL-MD-6-->
                                <div class="form-group">
                                    <input type="range" class="custom-range" id="customRange1">
                                </div>
                                </div>
                            </div><!--FIN ROW-->
                        </div><!-- FIN CARD-BODY-->
                    </div><!-- FIN CARD-->
                </div>
            </div><!-- FIN ROW h-100-->
        </form><!-- FORM-->
    </div><!-- FIN HERO-->
@endsection

@section('content')
    <div class="container nuevos-anuncios">
        <h2 class="titulo-anuncio text-uppercase-mb-4">Últimos anuncios</h2>

        <div class="owl-carousel owl-theme">
            @foreach ($nuevas as $nuevo)
                <div class="card">
                    <div class="card-body h-100">
                        <h3>{{ Str::title($nuevo->marcaCarro->marca) }}</h3>
                        <p>{{ Str::words(strip_tags($nuevo->descripcion), 15) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($anuncios as $key => $grupo)
        <div class="container">
            <h2 class="titulo-anuncio text-uppercase mt-5 mb-4">{{ str_replace('-', ' ', $key) }}</h2>
            <div class="row">
                @foreach ($grupo as $anuncios)
                    @foreach ($anuncios as $anuncio)
                        @include('ui.anuncio')
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
