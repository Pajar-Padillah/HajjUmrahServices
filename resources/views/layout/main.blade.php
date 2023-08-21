<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }} | Pelayanan Haji dan Umroh Kementrian Agama OKU</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body>
    <div class="body-inner">
        @include('layout/component/header')

        <div class="content">
            @yield('content')
        </div>

        @include('layout/component/footer')

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
            <button class="btn btn-primary" title="Back to Top">
              <i class="fa fa-angle-double-up"></i>
            </button>
        </div>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick-animation.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/toastr/toastr.min.js' )}}"></script>
        <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
        <script>
           new DataTable('#table');
        </script>
         <script>
            document.querySelector('.img-div .image').onclick = () => {
                document.querySelector('.popup-img').style.display = 'block';
                document.querySelector('.popup-img img').src = image.getAttribute('src');
            };
            document.querySelector('.popup-img span').onclick = () => {
                document.querySelector('.popup-img').style.display = 'none';
            }

            function confirmDel(item_id){
            event.preventDefault();
            swal({
                   title: "Yakin ingin menghapus?",
                   text: "Semua data akan hilang dan tidak dapat di kembalikan!", 
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                   $('#'+item_id).submit(); 
                 } else {
                  swal({
                    title: "Tindakan berhasil dibatalkan",
                    text: "Perubahan tidak akan diterapkan dan data tetap utuh", 
                    icon: "info",
                    buttons: false,
                    timer: 2000
                  });
                 }
               });
           }
        </script>
    </div>
</body>

</html>