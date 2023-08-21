@extends('layout/main')
@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Profil {{ $user->name }}</h3>
            </div>
        </div>
        <div class="card mb-5 container">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">My Profil</h5>
                <div class="row">
                    <div class="col-md-3 mb-4 mb-md-0">
                        @if ($user->foto)
                            <img src="{{ asset('storage/'. $user->foto) }}"  class="mb-2" width="100%" height="250px">
                        @else
                            <img src="{{ asset('img/default.jpg') }}" class="mb-2">
                        @endif
                        <a data-toggle="modal" data-target="#edit_data_profil"  class="btn btn-sm d-md-block btn-primary"><i class="fa fa-edit"></i> Edit Profil</a>
                    </div>
                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <th >Nama</th>
                                <td>: {{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>: {{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td class="text-capitalize">: {{ $user->level }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('page/user/modal_edit_profil')
</section>
<script>
    function previewImage(){
   const img = document.querySelector('#image');
   const imgPreview = document.querySelector('.img-preview');
   imgPreview.style.display = 'block';

   const blob = URL.createObjectURL(img.files[0]);
   imgPreview.src = blob;
   }
</script>
@endsection