@extends('layouts.anunciante')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Principal</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Principal</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

        <!--Main Content-->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <div class="card">
                            <div class="card-header  border-0">
                                <h2 class="card-title">Mis Publicaciones</h2>
                            </div>
                            <div class="card-body py-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Precio</th>
                                        <th>Ver más</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($anuncios as $anuncio)
                                            <tr>
                                                <td>{{ $anuncio->marcaCarro->marca }}</td>
                                                <td>{{ $anuncio->modeloCarro->modelo }}</td>
                                                <td>${{ $anuncio->precio }}</td>
                                                <td>
                                                  <a href="{{ route('anuncios.index')}}" 
                                                  class="btn btn-success d-block mb-2 w-100">
                                                  <i class="fas fa-eye"></i>
                                                  </a>
                                              </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.card -->
                    </div><!-- /.col -->
                    <div class="col-lg-6 col-md-4">
                      <div class="card">
                        <div class="card-header">
                          <h2 class="card-title">Perfil</h2>
                        </div>
                      </div>
                    </div>
                </div><!--row-->
            </div>
            <!--fin container-fluid-->
        </div>
        <!--fin content-->
    </div>
    <!--FIN DE content-wrapper-->
@endsection
