@extends('layout/main')
@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                @if ($user->level == 'user')
                    <h3 class="section-sub-title">Data Pendaftar {{ $user->name }}</h3>
                @else
                    <h3 class="section-sub-title">Data Pendaftar</h3>
                @endif
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-body p-4">
                @if ($user->level == 'user')
                <h5 class="card-title fw-semibold mb-4">Data Pendaftar {{ $user->name }}</h5>
                @else
                <h5 class="card-title fw-semibold mb-4">Semua Data Pendaftar</h5>
                @endif
                <div class="table-responsive">
                    @if ($pendaftaran->count())
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
                                    <h6 class="fw-semibold mb-0">No. Pendaftaran</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Jenis Daftar</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tanggal Daftar</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Status</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Keterangan</h6>
                                </th>
                                @if ($user->level == 'pimpinan')
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Validasi</h6>
                                </th>
                                @endif
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pendaftaran->count())
                            @foreach ($pendaftaran as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ $loop->iteration }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ $item->no_pendaftaran }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">{{ ucwords($item->nama_lengkap) }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ ucfirst($item->jenis_daftar) }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ $item->tanggal_pendaftaran }}</span>
                                </td>
                                <td class="border-bottom-0">
                                    <div class="text-center">
                                        @if ($item->status_pendaftaran == 'proses')
                                        <span class="badge bg-warning text-white rounded-3 fw-semibold">{{ ucfirst($item->status_pendaftaran) }}</span>
                                        @elseif ($item->status_pendaftaran == 'diterima')
                                        <span class="badge bg-success text-white rounded-3 fw-semibold">{{ ucfirst($item->status_pendaftaran)  }}</span>
                                        @elseif ($item->status_pendaftaran == 'ditolak')
                                        <span class="badge bg-danger text-white rounded-3 fw-semibold">{{ ucfirst($item->status_pendaftaran)  }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="border-bottom-0">
                                    <span class="fw-normal">{{ ucfirst($item->keterangan) }}</span>
                                </td>
                                @if ($user->level == 'pimpinan')
                                <td class="border-bottom-0 text-center">
                                    @if ($item->status_pendaftaran == 'proses')
                                        <a data-toggle="modal" data-target="#terima{{ $item->id }}" title="Terima" class="badge bg-success rounded-4 text-white"><i class="fa fa-check"></i></a>
                                        <a data-toggle="modal" data-target="#tolak{{ $item->id }}" title="Tolak" class="badge bg-danger rounded-4 text-white"><i class="fa fa-times"></i></a>
                                    @elseif ($item->status_pendaftaran == 'ditolak')
                                        <a data-toggle="modal" data-target="#terima{{ $item->id }}" title="Terima" class="badge bg-success rounded-4 text-white"><i class="fa fa-check"></i></a>
                                    @endif
                                </td>
                                @endif
                                <td class="border-bottom-0 text-white text-center">
                                    <a href="/pendaftaran/{{ $item->id }}" title="Lihat Detail" class="badge bg-info"><i class="fa fa-eye"></i></a>
                                    @if ($user->level == 'user')
                                    <a href="/pendaftaran/{{ $item->id }}/edit" title="Edit" class="badge bg-warning"><i class="fa fa-edit"></i></a>
                                    @endif
                                    @if ($user->level == 'user' || $user->level == 'admin')
                                    <form id="confirm-delete" action="/pendaftaran/{{ $item->id }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('delete')
                                      <button onclick="confirmDel('confirm-delete')" title="Hapus" class="badge bg-danger border-0 confirm-delete"><i class="fa fa-trash text-white"></i></button>
                                    </form> 
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr class="text-center">
                                <td colspan="9">Data pendaftaran tidak ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->

@foreach ($pendaftaran as $item)
    <!-- Modal Setuju -->
    <div class="modal fade" id="terima{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Setujui Data Pendaftaran</h5>
                </div>
                <form action="/pendaftaran/validasiterima" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_pendaftaran" value="{{ $item->id }}" />
                        <label for="keterangan">Keterangan diterima</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tolak -->
    <div class="modal fade" id="tolak{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tolak Data Pendaftaran</h5>
                </div>
                <form action="/pendaftaran/validasitolak" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_pendaftaran" value="{{ $item->id }}" />
                        <label for="keterangan">Keterangan ditolak</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endforeach
</section>
@endsection