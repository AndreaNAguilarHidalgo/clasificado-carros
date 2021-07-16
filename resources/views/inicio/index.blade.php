@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
@endsection

@section('hero')
    <div class="hero-categorias">
        <form class="container h-100" action="{{ route('buscar.show') }}">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra tú próximo automóvil</p>
                </diV>
                <div class="row">
                    <div class="card col-lg-12 col-md-6 col-sm-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-4">
                                    <div class="form-group">
                                        <label for="marca">Marca</label>
                                        <select name="marca" class="form-control" id="marca">
                                            <option value="">-- Elige la marca --</option>
                                            @foreach ($marcas as $marca)
                                                <option value="{{ $marca->id }}"> {{ $marca->marca }} </option>
                                            @endforeach
                                        </select><!-- FIN SELECT MARCA -->
                                    </div>
                                    <!--FIN FORM-GROUP-->
                                    <div class="form-group">
                                        <label for="doors">Puertas</label>
                                        <select name="doors" class="form-control" id="doors">
                                            <option value="">-- Elige Núm de puertas --</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                        </select><!-- FIN SELECT # DOORS -->
                                    </div><!-- FORM-GROUP -->
                                </div>
                                <!--FIN COL-MD-6-->

                                <div class="col-lg-6 col-md-6 col-sm-4">
                                    <div class="form-group">
                                        <label for="tipoCarro">Tipo de Carro</label>
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
                                        <label for="combustible">Tipo de Combustible</label>
                                        <select name="combustible" class="form-control" id="combustible">
                                            <option value="">-- Tipo de combustible --</option>
                                            @foreach ($combustible as $combustible)
                                                <option value="{{ $combustible->id }}"> {{ $combustible->tipo }}
                                                </option>
                                            @endforeach
                                        </select><!-- FIN SELECT COMBUSTIBLE -->
                                    </div><!-- FIN FORM-GROUP -->
                                </div>
                                <!--FIN COL-MD-6-->
                            </div>
                            <!--FIN ROW-->
                            <div class="row">
                                <div class="col-lg-12 col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="priceRange">Rango de precio</label>
                                        <input id="priceRange" type="text" name="priceRange" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-4 col-sm-4">
                                    <div class="form-group" style="text-align: end">
                                        <input type="submit" name="buscar" class="btn btn-primary" value="Buscar">
                                    </div>
                                </div>
                            </div>
                        </div><!-- FIN CARD-BODY-->
                    </div><!-- FIN CARD-->
                </div><!-- FIN ROW -->
            </div><!-- FIN ROW h-100-->
        </form><!-- FORM-->
    </div><!-- FIN HERO-->
@endsection

@section('content')
    <div class="container nuevos-anuncios">
        <h2 class="titulo-anuncio text-uppercase mt-5 mb-4">Últimos anuncios</h2>

        <div class="owl-carousel owl-theme">
            @foreach ($nuevas as $nuevo)
                <div class="card">
                    <div class="image">
                        @if ($nuevo->images->count() <= 0)
                            <img src="/imagenes/avatar.png" class="rounded-circle">
                        @else
                            <img src="{{ $nuevo->images->random()->url }}">
                        @endif
                    </div>
                    <div class="card-body h-100">

                        <h3>{{ Str::title($nuevo->marcaCarro->marca) }}</h3>
                        <p>{{ Str::words(strip_tags($nuevo->descripcion), 15) }}</p>

                        <a href="{{ route('anuncios.show', ['anuncio' => $nuevo->id]) }}"
                            class="btn btn-primary d-block btn-anuncio">Ver más...
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <h2 class="titulo-anuncio text-uppercase mt-5 mb-4">Ver todos los anuncios</h2>
        <div class="row">
            @foreach ($nuevas as $anuncio)
                @include('ui.anuncio')
            @endforeach
        </div>
    </div>

    {{-- @foreach ($anuncios as $key => $grupo)
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
    @endforeach --}}
@endsection
@section('questions')
    <div class="questions py-3 mt-3 col-12">
        <div class="col-md-4 texto">
            <p class="display-3">Contactate con nostros</p>
        </diV>
        @include('ui.contact')
    </div>
@endsection

@section('scripts')
    <script src=" {{ asset('js/ionRange/ionRange.js') }}"></script>

    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
@endsection
