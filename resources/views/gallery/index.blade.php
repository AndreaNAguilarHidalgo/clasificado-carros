@extends('layouts.adminlayout')

@section('content')
<section class="content-header">
    <h1>Gallery</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="jumbotron">Subir imagen</h3>
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="file" accept="image/*">

                    @error('file')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</section>
@endsection