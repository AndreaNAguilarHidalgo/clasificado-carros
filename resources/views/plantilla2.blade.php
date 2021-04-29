<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Anunciante | Clasificado de carros</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<!--=====================================
	PLUGINS DE CSS
	======================================-->

	{{-- BOOTSTRAP 4 --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    {{-- OverlayScrollbars.min.css --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/OverlayScrollbars.min.css">

    {{-- CSS AdminLTE --}}
	<link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.min.css">

	{{-- google fonts --}}
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

	@yield('styles')
	<!--=====================================
	PLUGINS DE JS
	======================================-->

	{{-- Fontawesome --}}
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    {{-- jquery.overlayScrollbars.min.js --}}
	<script src="{{ url('/') }}/js/plugins/jquery.overlayScrollbars.min.js"></script>

    {{-- JS AdminLTE --}}
	<script src="{{ url('/') }}/js/plugins/adminlte.js"></script>


	{{-- Scripts --}}
	 <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
	<div id="app">
		<div class="wrapper">
			@include('modulos.header')

			@include('modulos.sidebaranu')

			@yield('botones')

			@yield('content')

			@include('modulos.footer')

			@yield('scripts')
		</div>
	</div>
</body>
</html>