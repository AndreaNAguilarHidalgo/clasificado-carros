<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- BOOTSTRAP 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- ======== Dropzone start css ======== -->
    <link rel="stylesheet" href="{{ asset('css/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropzone/custom-style.css') }}">

    <script>
        var delete_url = "{{ url('image/delete') }}";
        var gallery = "{{ url('getimages') }}";
    </script>

</head>
<body>
    <div id="app">
        <div class="wrapper">

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- LOAD DROPZONE JS FILE -->
    <script src="{{ asset('js/dropzone/dropzone.min.js') }}"></script>
    <!-- LOAD DROPZONE CUSTOM JS FILE -->
    <script src="{{ asset('js/dropzone/dropzone-script.js') }}"></script>
</body>
</html>