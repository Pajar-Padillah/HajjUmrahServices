@extends('layout/main')
@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Data Persyaratan</h3>
            </div>
        </div>
        @if (!$syarats->count())
        <button data-toggle="modal" data-target="#modalcreatesyarat" class="btn btn-primary btn-sm mb-2"> <i class="fa fa-plus"></i> Tambah Data Persyaratan</button>
        @endif
        <!--/ Title row end -->
        <div class="card mb-5">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Persyaratan</h5>
                <div class="table-responsive">
                    @if ($syarats->count())
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
                                    <h6 class="fw-semibold mb-0">File Syarat</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($syarats->count())
                            @foreach ($syarats as $item)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <iframe src="{{ asset('storage/'.$item->file_syarat) }}" height="300" width="100%"> </iframe>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="/syarat/{{ $item->id }}/edit" data-toggle="modal" data-target="#edit_data_syarat{{ $item->id }}" title="Edit" class="badge bg-warning text-white"><i class="fa fa-edit"></i></a>
                                    <form id="confirm-delete" action="/syarat/{{ $item->id }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('delete')
                                      <button onclick="confirmDel('confirm-delete')" title="Hapus" class="badge bg-danger border-0 confirm-delete"><i class="fa fa-trash text-white"></i></button>
                                    </form> 
                                </td>
                            </tr>
                            @include('page/syarat/modal_edit_syarat')
                            @endforeach
                            @else
                                <tr class="text-center">
                                <td colspan="3">Data syarat tidak ditemukan</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @include('page/syarat/modal_tambah_syarat')
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>
@endsection