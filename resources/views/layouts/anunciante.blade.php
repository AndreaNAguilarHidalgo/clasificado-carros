<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('styles')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- OverlayScrollbars.min.css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/OverlayScrollbars.min.css') }}">

    <!-- CSS AdminLTE -->
    <link rel="stylesheet" href="{{ asset('css/plugins/adminlte.min.css') }}">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>


    <!-- BOOTSTRAP 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- jquery.overlayScrollbars.min.js -->
    <script src="{{ asset('js/plugins/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- JS AdminLTE -->
    <script src="{{ asset('js/plugins/adminlte.js') }}"></script>

    <!-- Scripts -->
	{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    
    <title>@yield('title', 'Clasificado de Carros')</title>
</head>
<body class="sidebar-mini layout-fixed" style="height: auto;">
	<div id="app">
		<div class="wrapper">
			@include('modulos.header')

			@include('modulos.sidebaranu')

			@yield('botones')

			@yield('content')

			@include('modulos.footer')
        </div>
	</div>
    @yield('scripts')

    <!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>