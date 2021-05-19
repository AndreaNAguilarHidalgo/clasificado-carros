@extends('layouts.adminlayout')

@section('content')
<section class="content-header">
    <h1>Gallery</h1>
</section>

<section class="content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="jumbotron">Multiples Imgs en laravel usando dropzone</h3>
            <form method="POST" action="{{ url('gallery') }}" class="dropzone" id="dropzone" enctype="multipart/form-data">
             {{ csrf_field() }}

             <div class="dz-default dz-message">
                <h4>Drop files here or click to upload</h4>
             </div>
            </form>
        </div>
    </div>
</section>
@endsection