@extends('layout/main')
@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Data User</h3>
            </div>
        </div>
        @if (auth()->user()->level == 'admin')
        <button data-toggle="modal" data-target="#modalcreateuser" class="btn btn-primary btn-sm mb-2"><i class="fa fa-plus"></i> Tambah Data User</button>
        @endif
        <!--/ Title row end -->
        <div class="card mb-5">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data User</h5>
                <div class="table-responsive">
                    @if ($user->count())
                    <table id="table" class="table table-bordered text-nowrap mb-0 align-middle">
                        @else
                        <table class="table table-bordered text-nowrap mb-0 align-middle">
                            @endif
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Foto</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Username</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Email</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Role</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Keterangan</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($user->count())
                            @foreach ($user as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    <span class="fw-semibold mb-0">{{ $loop->iteration }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <center>
                                        @if ($item->foto)
                                        <img src="{{ url('storage').'/'.$item->foto }}" class="img-responsive" style="height:150px;width:130px;" />
                                        @else
                                        <img src="{{ url('img/default.jpg') }}" class="img-responsive" style="height:150px;width:130px;" />
                                        @endif
                                    </center>
                                  </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-normal">{{ ucwords($item->name) }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ $item->username }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ $item->email }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-normal">{{ $item->level }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="text-center">
                                        @if ($item->status_konfirmasi == 1)
                                        <span class="badge bg-warning text-white rounded-3 fw-semibold">Proses</span>
                                        @elseif ($item->status_konfirmasi == 2)
                                        <span class="badge bg-success text-white rounded-3 fw-semibold">Diterima</span>
                                        @elseif ($item->status_konfirmasi == 3)
                                        <span class="badge bg-danger text-white rounded-3 fw-semibold">Ditolak</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ ucfirst($item->keterangan) }}</span>
                                </td>
                                <td class="border-bottom-0 text-center">
                                    @if (auth()->user()->level == 'pimpinan')
                                    <a data-toggle="modal" data-target="#konfirmasi_data_user{{ $item->id }}" title="Konfirmasi" class="badge bg-info text-white"><i class="fa fa-user-check"></i></a>
                                    @endif
                                    @if (auth()->user()->level == 'admin')
                                    <a data-toggle="modal" data-target="#edit_data_user{{ $item->id }}" title="Edit" class="badge bg-warning text-white"><i class="fa fa-edit"></i></a>
                                    <form id="confirm-delete" action="/user/{{ $item->id }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('delete')
                                      <button onclick="confirmDel('confirm-delete')" title="Hapus" class="badge bg-danger border-0 confirm-delete"><i class="fa fa-trash text-white"></i></button>
                                    </form> 
                                    @endif
                                </td>
                            </tr>
                            @include('page/user/modal_edit_user')
                            @include('page/user/modal_konfirmasi_user')
                            @endforeach
                            @else
                                <tr class="text-center">
                                <td colspan="3">Data user tidak ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @include('page/user/modal_tambah_user')
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->
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