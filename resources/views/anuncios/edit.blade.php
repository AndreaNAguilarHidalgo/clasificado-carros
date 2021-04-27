@extends('plantilla2')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Publicación: {{ $anuncio->titulo}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Editar Publicación</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section><!--Fin section content-header -->

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Editar publicación</h3>
                        </div><!-- card-header-->

                        <!-- Form -->
                        <div class="col-md-8 col-lg-12">
                            <form method="POST" action="{{ route('anuncios.update', ['anuncio' => $anuncio->id]) }}" 
                            enctype="multipart/form-data" novalidate>

                                @csrf

                                @method('PUT')
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                                            id="titulo" placeholder="Ej. Ford Fiesta"
                                            value="{{ $anuncio->titulo }}"/>

                                        @error('titulo')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="titulo">Año</label>
                                    <input type="text" name="año" class="form-control @error('año') is-invalid @enderror"
                                            id="año" placeholder="Ej. 2010"
                                            value="{{ $anuncio->año }}"/>

                                        @error('año')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="combustible">Tipo de Combustible</label>
                                    <select name="combustible" class="form-control @error('combustible') is-invalid @enderror" id="combustible">
                                        <option value="">-- Seleccione --</option>

                                        @foreach ($tipoCombustible as $combustible)
                                            <option value="{{ $combustible->id }}" 
                                                    {{ $anuncio->combustible_id == $combustible->id ? 'selected' : '' }} > 
                                                            {{ $combustible->tipo }}</option>
                                        
                                        @endforeach
                                    </select>

                                    @error('combustible')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="condicion">Condición</label>
                                    <select name="condicion" class="form-control @error('condicion') is-invalid @enderror" id="condicion">
                                        <option value="">-- Seleccione --</option>

                                        @foreach ($condicionCarro as $condicion)
                                            <option value="{{ $condicion->id }}" 
                                                    {{ $anuncio->condicion_id == $condicion->id ? 'selected' : '' }} > 
                                                            {{ $condicion->estado }}</option>
                                        
                                        @endforeach
                                    </select>

                                    @error('tipo_carro')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tipo_carro">Categoría</label>
                                    <select name="tipo_carro" class="form-control @error('tipo_carro') is-invalid @enderror" id="tipo_carro">
                                        <option value="">-- Seleccione --</option>

                                        @foreach ($tipoCarros as $tipo_carro)
                                            <option value="{{ $tipo_carro->id }}" 
                                                    {{ $anuncio->carro_id == $tipo_carro->id ? 'selected' : '' }} > 
                                                            {{ $tipo_carro->nombre }}</option>
                                        
                                        @endforeach
                                    </select>

                                    @error('tipo_carro')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="total_puertas">Número de Puertas</label>
                                    <input type="number" name="total_puertas" class="form-control @error('total_puertas') is-invalid @enderror"
                                            id="total_puertas" placeholder="Ej. 4"
                                            value="{{ $anuncio->total_puertas }}" min="1" max="6"/>

                                        @error('total_puertas')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            
                                            <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror"
                                            id="precio" placeholder="Ej. 10,000" value="{{ $anuncio->precio }}" min="0" step="any"/>

                                            @error('precio')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror

                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="kilometraje">Kilometraje</label>
                                    <input type="number" name="kilometraje" class="form-control @error('kilometraje') is-invalid @enderror"
                                            id="kilometraje" placeholder="Ej. 10,000"
                                            value="{{ $anuncio->kilometraje }}" min="0" step="any"/>

                                        @error('kilometraje')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label for="descripcion">Descripcion</label>
                                    <input id="descripcion" type="hidden" name="descripcion" value="{{ $anuncio->descripcion }}">
                                    <trix-editor
                                        class="form-control @error('descripcion') is-invalid @enderror "
                                        input="descripcion"></trix-editor>

                                    @error('descripcion')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                  <input type="submit" class="btn btn-primary" value="Actualizar publicación">
                                </div>
                            </form>
                        </div>
                    </div><!--card card-primary-->
                </div><!-- END COL-MD-6-->
            </div><!--end div row-->
        </div> <!--end div container-fluid-->
    </section><!-- end section-->
</div><!--Fin content-wrapper-->
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" 
    integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" 
    crossorigin="anonymous" defer></script>
@endsection