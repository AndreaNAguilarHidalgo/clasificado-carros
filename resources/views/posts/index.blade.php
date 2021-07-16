@extends('layouts.adminlayout')

@section('content')
    <section class="content-header">
        <h1>Gallery</h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="jumbotron">Subir imagen</h3>

                <form action="{{ route('posts.store') }}" name="demoform" id="demoform" method="POST"
                    enctype="multipart/form-data" novalidate>

                    @csrf
                    <div class="form-group">

                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name"
                            class="form-control @error('name') is-invalid @enderror" required autocomplete="off">
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email"
                            class="form-control @error('email') is-invalid @enderror" required autocomplete="off">
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagenes">Subir varias imágenes:</label>
                        <input type="file" class="form-control-file @error('imagenes') is-invalid @enderror"
                            name="imagenes[]" id="imagenes[]" multiple accept="image/*">
                        @error('imagenes')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="create" value="Create" />
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
