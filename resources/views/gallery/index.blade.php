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

                <form action="{{ route('form.data') }}" name="demoform" id="demoform" method="POST" class="dropzone" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="form-group">

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
                        </div>
                        <div class="dropzone-previews"></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" 
        integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src=" {{ asset('js/dropzone/dropzone-custom.js') }}"></script>
@endsection
