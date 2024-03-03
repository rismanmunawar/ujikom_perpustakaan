<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan | @yield('title', $title)</title>
    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="assets/compiled/css/iconly.css">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
    <style>
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px 0;
        }

        #main {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>

    @include('layouts.sidebar')
    <div id="main" class='layout-navbar navbar-fixed'>
        <!-- Menetapkan posisi tetap untuk header -->
        @include('layouts.header')
        @yield('content')
    </div>
    @include('layouts.footer')
    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    {{-- <script src="{{ asset('/assets/compiled/js/app.js') }}"></script> --}}
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>
