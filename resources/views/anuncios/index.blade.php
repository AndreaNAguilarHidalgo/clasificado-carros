@extends('plantilla2')

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th scole="col">Título</th>
                      <th scole="col">Año</th>
                      <th scole="col">Número de Puertas</th>
                      <th scole="col">Precio</th>
                      <th scole="col">Kilometraje</th>
                      <th scole="col">Descripción</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($anuncios as $anuncio)
                        <tr>
                            <td>{{$anuncio->titulo}}</td>
                            <td>{{$anuncio->año}}</td>
                            <td>{{$anuncio->total_puertas}}</td>
                            <td>{{$anuncio->precio}}</td>
                            <td>{{$anuncio->kilometraje}}</td>
                            <td>{{$anuncio->descripcion}}</td>
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