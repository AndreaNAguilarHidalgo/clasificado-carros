@extends('layouts.anunciante')

@section('title', 'Anuncios')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Publicaciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Lista de Publicaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Publicaciones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 " style="height: 450px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th >Marca</th>
                      <th >Modelo</th>
                      <th >Año</th>
                      <th >Categoría</th>
                      <th >Combustible</th>
                      <th >Condición</th>
                      <th ># Puertas</th>
                      <th >Precio</th>
                      <th >Kilometraje</th>
                      <th >Estado</th>
                      <th >Municipio</th>
                      <th >Descripción</th>
                      <th >Acciones</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td>{{ $anuncio->marcaCarro->marca}}</td>
                            <td>{{ $anuncio->modeloCarro->modelo}}</td>
                            <td>{{ $anuncio->año}}</td>
                            <td>{{ $anuncio->tipoCarro->nombre }}</td>
                            <td>{{ $anuncio->tipoCombustible->tipo }}</td>
                            <td>{{ $anuncio->condicionCarro->estado }}</td>
                            <td>{{ $anuncio->total_puertas}}</td>
                            <td>${{ $anuncio->precio}}</td>
                            <td>{{ $anuncio->kilometraje}} KM</td>
                            <td>{{ $anuncio->estadoCarro->estado }}</td>
                            <td>{{ $anuncio->municipioCarro->municipio }}</td>
                            <td>{!! $anuncio->descripcion !!}</td>
                            <td>
                              <eliminar-anuncio anuncio-id={{ $anuncio->id }}
                              ></eliminar-anuncio>

                              <a href="{{ route('anuncios.edit', $anuncio->id) }}" 
                                 class="btn btn-dark d-block mb-2 w-100">Editar
                                    <i class="icono fas fa-edit"></i>
                              </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>
@endsection