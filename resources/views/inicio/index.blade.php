@extends('layouts.app')

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