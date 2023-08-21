@extends('layout/main')
@section('content')

<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                    <h3 class="section-sub-title">Detail Data Pendaftaran : {{ $pendaftaran->nama_lengkap }}</h3>
            </div>
        </div>
        <div class="card p-2 shadow border-bottom mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-4 mb-md-0">
                        <img src="{{ asset('storage/'.$pendaftaran->dokumenPendaftar->image) }}" alt="" class="img-thumbnail rounded-5 mb-2">
                        <a href="/pendaftaran" class="btn btn-sm d-md-block btn-warning text-white"><i class="fa fa-arrow-left"></i> <b>Kembali</b></a>
                    </div>
                    <div class="col-md-5">
                        <table class="table">
                            <tr>
                                <th width="150">No. Pendaftaran</th>
                                <td>: {{ $pendaftaran->no_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Daftar</th>
                                <td>: {{ ucfirst($pendaftaran->jenis_daftar) }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Daftar</th>
                                <td>: {{ $pendaftaran->tanggal_pendaftaran }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Berangkat</th>
                                <td>: {{ $pendaftaran->tanggal_berangkat}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ ucwords($pendaftaran->nama_lengkap) }}</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal lahir</th>
                                <td>: {{ $pendaftaran->tempat_lahir, $pendaftaran->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: {{ ucfirst($pendaftaran->jenis_kelamin) }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>: {{ ucwords($pendaftaran->pekerjaan) }}</td>
                            </tr>
                            <tr>
                                <th>Pendidikan Terakhir</th>
                                <td>: {{ ucfirst($pendaftaran->pendidikan_terakhir) }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ayah</th>
                                <td>: {{ ucwords($pendaftaran->biodataPendaftar->nama_ayah) }}</td>
                            </tr>
                            <tr>
                                <th>Nama Ibu</th>
                                <td>: {{ ucwords($pendaftaran->biodataPendaftar->nama_ibu )}}</td>
                            </tr>
                            <tr>
                                <th>Nama Mahram</th>
                                @if ($pendaftaran->biodataPendaftar->nama_mahram)
                                <td>: {{ ucfirst($pendaftaran->biodataPendaftar->nama_mahram) }}</td>
                                @else
                                <td>: -</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Status Mahram</th>
                                @if ($pendaftaran->biodataPendaftar->status_mahram)
                                <td>: {{ ucfirst($pendaftaran->biodataPendaftar->status_mahram) }}</td>
                                @else
                                <td>: -</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ ucfirst($pendaftaran->alamatPendaftar->alamat) }}</td>
                            </tr>
                            <tr>
                                <th>Kelurahan</th>
                                <td>: {{ ucfirst($pendaftaran->alamatPendaftar->kelurahan) }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>: {{ ucfirst($pendaftaran->alamatPendaftar->kecamatan) }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>: {{ ucfirst($pendaftaran->alamatPendaftar->kota) }}</td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td>: {{ $pendaftaran->alamatPendaftar->kode_pos }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <table class="table">
                            <tr>
                                <th width="150">Email</th>
                                <td>: {{ $pendaftaran->alamatPendaftar->email }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>: {{ $pendaftaran->alamatPendaftar->no_telp }}</td>
                            </tr>
                            <tr>
                                <th>Pernah Pergi Haji</th>
                                <td>: {{ ucfirst($pendaftaran->biodataPendaftar->pernah_haji) }}</td>
                            </tr>
                            <tr>
                                <th>Pernah Pergi Umroh</th>
                                <td>: {{ ucfirst( $pendaftaran->biodataPendaftar->pernah_umroh) }}</td>
                            </tr>
                            <tr>
                                <th>Fasilitas Kamar</th>
                                <td>: {{ ucfirst($pendaftaran->fasilitas_kamar) }}</td>
                            </tr>
                            <tr>
                                <th>Merokok</th>
                                @if ($pendaftaran->biodataPendaftar->merokok)
                                <td>: {{ ucfirst($pendaftaran->biodataPendaftar->merokok) }}</td>
                                @else
                                <td>: -</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Memiliki Penyakit Khusus</th>
                                <td>: {{ ucfirst($pendaftaran->biodataPendaftar->memiliki_penyakit) }}</td>
                            </tr>
                            <tr>
                                <th>Nama Penyakit</th>
                                <td>: {{ ucfirst($pendaftaran->biodataPendaftar->nama_penyakit) }}</td>
                            </tr>
                            <tr>
                                <th>Memerlukan Penanganan Khusus</th>
                                <td>: {{ucfirst( $pendaftaran->biodataPendaftar->perlu_penanganan_khusus) }}</td>
                            </tr>
                            <tr>
                                <th>Fasilitas Kursi Roda</th>
                                <td>: {{ ucfirst($pendaftaran->biodataPendaftar->perlu_kursi_roda) }}</td>
                            </tr>
                            <tr>
                                <th>Tabungan Haji/Umroh</th>
                                <td>: 
                                <span class="btn btn-warning btn-sm text-white">
                                    <a href="{{ asset('storage/'. $pendaftaran->dokumenPendaftar->bukti_tabungan) }}" target="_blank"><i class="fa fa-eye"></i> <b>Lihat File</b></a>
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Setoran BPIH</th>
                                <td>: 
                                <span class="btn btn-warning btn-sm text-white">
                                    <a href="{{ asset('storage/'. $pendaftaran->dokumenPendaftar->bukti_setoran_bpih) }}" target="_blank"><i class="fa fa-eye"></i> <b>Lihat File</b></a>
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Setoran BIPIJ</th>
                                <td>: 
                                <span class="btn btn-warning btn-sm text-white">
                                    <a href="{{ asset('storage/'. $pendaftaran->dokumenPendaftar->bukti_setoran_bipij) }}" target="_blank"><i class="fa fa-eye"></i> <b>Lihat File</b></a>
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <th>KTP</th>
                                <td>: 
                                <span class="btn btn-warning btn-sm text-white">
                                    <a href="{{ asset('storage/'. $pendaftaran->dokumenPendaftar->ktp) }}" target="_blank"><i class="fa fa-eye"></i> <b>Lihat File</b></a>
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <th>KK</th>
                                <td>: 
                                <span class="btn btn-warning btn-sm text-white">
                                    <a href="{{ asset('storage/'. $pendaftaran->dokumenPendaftar->kk) }}" target="_blank"><i class="fa fa-eye"></i> <b>Lihat File</b></a>
                                </span>
                                </td>
                            </tr>
                            <tr>
                                <th>AKTE</th>
                                <td>: 
                                <span class="btn btn-warning btn-sm text-white">
                                    <a href="{{ asset('storage/'. $pendaftaran->dokumenPendaftar->akte) }}" target="_blank"><i class="fa fa-eye"></i> <b>Lihat File</b></a>
                                </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection