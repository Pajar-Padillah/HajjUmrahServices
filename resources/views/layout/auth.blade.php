<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Pelayanan Haji dan Umroh Kementrian Agama OKU</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/login/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.css') }}">
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-5 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <a href="{{ url('login') }}" class="text-center logo-img mt-3">
                                        <img src="{{ asset('img/logo2.png') }}" width="300"/>
                                    </a>
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/toastr/toastr.min.js' )}}"></script>
</body>

</html>