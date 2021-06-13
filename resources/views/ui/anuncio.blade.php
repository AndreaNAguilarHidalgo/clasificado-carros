<div class="col-md-4 mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title">{{$anuncio->marca}}</h3>

            <div class="anuncio-meta d-flex justify-content-between">
                @php
                    $fecha = $anuncio->created_at
                @endphp
            </div>

            <p> {{ Str::words(  strip_tags( $anuncio->descripcion ), 20, ' ...' ) }} </p>

            <a href="{{ route('anuncios.show', ['anuncio' => $anuncio->id ])}}"
                class="btn btn-primary d-block btn-anuncio">Ver anuncio
            </a>
        </div>
    </div>
</div>