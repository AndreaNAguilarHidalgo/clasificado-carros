@extends('layouts.adminlayout')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <section class="content-header">
        <h1>Gallery</h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="jumbotron">Subir imagen</h3>
                {{--<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" accept="image/*">

                        @error('file')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>--}}

                <form action="{{ route('gallery.store') }}" method="POST" class="dropzone" 
                      id="my-awesome-dropzone">
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

    <script>
        // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Agregar imagénes aquí",
            acceptedFiles: "image/*",
            maxFiles: 4,
        };

    </script>
@endsection
