<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="">

    <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/css/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> --}}

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" />

    <title>myPos</title>
</head>

<body>

    @include('partial.topbar')
    @include('partial.sidebar')

    <main class="mt-5 pt-3">
        <div class="container-fluid">
            @yield('container')
        </div>
    </main>

    {{-- script --}}
    <script src="{{ asset('template/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('template/js/jquery-3.6.3.js') }}"></script>

    <script src="{{ asset('template/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/js/dataTables.bootstrap5.min.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

    <script src="{{ asset('template/js/script.js') }}"></script>
</body>
@yield('script')

</html>
