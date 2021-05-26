@extends('layouts.adminlayout')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/dropzone/custom-style.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <h1>Gallery</h1>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="jumbotron">Subir imagen</h3>
                {{-- <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" accept="image/*">

                        @error('file')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form> --}}

                {{-- <form action="{{ route('gallery.store') }}" method="POST" class="dropzone" 
                      id="my-awesome-dropzone">
                </form> --}}

                {{-- <form id="my-awesome-dropzone" class="dropzone">
                    <div class="dropzone-previews"></div> <!-- this is were the previews should be shown. -->
                    
                    <!-- Now setup your input fields -->
                    <input type="email" name="username" />
                    <input type="password" name="password" />
                  
                    <button type="submit">Submit data and files!</button>
                </form> --}}

                <form action="{{ route('gallery.store') }}" name="demoform" id="demoform" enctype="multipart/form-data"
                    method="POST" class="dropzone">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" class="userid" name="userid" id="userid" value="">

                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" required
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control"
                            required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div id="myDropzoneArea" class="dz-default dz-message myDropzoneArea">
                            <span>Cargar Imágenes</span>
                        </div>
                        <div class="dropzone-previews"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">create</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;
        // Dropzone.options.demoform = false;	
        let token = $('meta[name="csrf-token"]').attr('content');
        $(function() {
            var myDropzone = new Dropzone("div#myDropzoneArea", {
                paramName: "file",
                url: "{{ url('gallery') }}",
                previewsContainer: 'div.dropzone-previews',
                addRemoveLinks: true,
                autoProcessQueue: true,
                uploadMultiple: false,
                parallelUploads: 1,
                maxFiles: 1,
                params: {
                    _token: token
                },
                // The setting up of the dropzone
                init: function() {
                    var myDropzone = this;

                    //Gets triggered when we submit the image.
                    this.on('sending', function(file, xhr, formData) {
                        //fetch the user id from hidden input field and send that userid with our image
                    });

                    this.on("success", function(file, response) {
;
                    });
                    this.on("queuecomplete", function() {

                    });

                    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                    // of the sending event because uploadMultiple is set to true.
                    this.on("sendingmultiple", function() {
                        // Gets triggered when the form is actually being sent.
                        // Hide the success button or the complete form.
                    });

                    this.on("successmultiple", function(files, response) {
                        // Gets triggered when the files have successfully been sent.
                        // Redirect user or notify of success.
                    });

                    this.on("errormultiple", function(files, response) {
                        // Gets triggered when there was an error sending the files.
                        // Maybe show form again, and notify user of error
                    });
                }
            });
        });

    </script>
@endsection
