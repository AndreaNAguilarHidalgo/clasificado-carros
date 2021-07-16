<div class="col-md-4 mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h3>{{ Str::title($anuncio->marcaCarro->marca) }}</h3>
            <div class="anuncio-meta d-flex justify-content-between">
                @php
                    $fecha = $anuncio->created_at;
                @endphp
            </div>
            <div class="image">
                @if ($anuncio->images->count() <= 0)
                    <img style="height: 150px;    width: 250px;" src="/imagenes/avatar.png" class="rounded-circle">
                @else
                    <img style="height: 150px;    width: 280px;" src="{{ $anuncio->images->random()->url }}">
                @endif
            </div>
            <ul class="nav nav-tabs py-2 mb-3">
                <li class="nav-item">
                    <i class="fas fa-door-closed"></i>
                    {{ $anuncio->total_puertas }}
                </li>
                <li class="nav-item">
                    <i class="fas fa-dollar-sign"></i>
                    {{ $anuncio->precio }}
                </li>
                <li class="nav-item">
                    <i class="fas fa-car-side"></i>
                    {{ $anuncio->modeloCarro->modelo }}
                </li>
                <li class="nav-item">
                    <i class="fas fa-gas-pump"></i>
                    {{ $anuncio->tipoCombustible->tipo }}
                </li>
                <li class="nav-item">
                    <i class="fas fa-motorcycle"></i>
                    {{ $anuncio->tipoCarro->nombre }}
                </li>
                <li class="nav-item">
                    <i class="fas fa-car"></i>
                    {{ $anuncio->condicionCarro->estado }}
                </li>
            </ul>

            <p> {{ Str::words(strip_tags($anuncio->descripcion), 20, ' ...') }} </p>

            <a href="{{ route('anuncios.show', ['anuncio' => $anuncio->id]) }}"
                class="btn btn-primary d-block btn-anuncio">Ver más...
            </a>
        </div>
    </div>
</div>
