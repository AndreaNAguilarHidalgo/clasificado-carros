@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" 
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container nuevos-anuncios">
        <h2 class="titulo-anuncio text-uppercase-mb-4">Últimos anuncios</h2>

        <div class="owl-carousel owl-theme">
            @foreach ($nuevos as $nuevo)
                <div class="card">
                    <div class="card-body h-100">
                        <h3>{{ Str::title($nuevo->marca_id) }}</h3>
                        <p>{{ Str::words( strip_tags($nuevo->descripcion), 15 ) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @foreach ($marcas as $key => $grupo)
        <div class="container">
            <h2 class="titulo-anuncio text-uppercase mt-5 mb-4">{{ str_replace('-', ' ', $key) }}</h2>
            <div class="row">
                @foreach ($grupo as $marcas)
                    @foreach($marcas as $marca)

                    {{$marcas}}
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach
@endsection