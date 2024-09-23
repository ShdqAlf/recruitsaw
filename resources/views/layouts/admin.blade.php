<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/bootstrap.css') }}">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/app.css') }}">

    @yield('styles') <!-- Untuk menambahkan CSS tambahan -->
</head>

<body>
    <div id="app">
        @include('layouts.sidebar') <!-- Sidebar -->

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="container-fluid">
                @yield('content') <!-- Tempat untuk konten -->
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('mazer/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Include main JS -->
    <script src="{{ asset('mazer/assets/js/main.js') }}"></script>

    @yield('scripts') <!-- Untuk menambahkan JS tambahan -->
</body>
</html>
