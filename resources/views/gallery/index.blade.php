@extends('layouts.adminlayout')

@section('styles')
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

                <form action="{{ route('form.data') }}" name="demoform" id="demoform" method="POST" enctype="multipart/form-data" novalidate>
                    
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
                        <my-dropzone-area></my-dropzone-area>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
