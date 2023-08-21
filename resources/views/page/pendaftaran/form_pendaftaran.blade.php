@extends('layout/main')
@section('content')
<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Form Pendaftaran Haji dan Umroh</h3>
            </div>
        </div>
        <!--/ Title row end -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="/pendaftaran" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-warning mb-3">
                        <h5 class="card-title fw-semibold ml-3  text-white">Data Pendaftaran</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-4 col-form-label">No. Pendaftaran</label>
                                        <div class="col-md-8">
                                            <input readonly name="no_pendaftaran" value="{{ $no_pendaftaran }}" class="form-control @error('no_pendaftaran') is-invalid @enderror" type="text" />
                                            @error('no_pendaftaran')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="defaultSelect" class="col-md-4 col-form-label">Jenis Daftar</label>
                                        <div class="col-md-8">
                                        <select class="form-control @error('jenis_daftar') is-invalid @enderror" name="jenis_daftar">
                                                <option disabled selected value>Pilih Jenis Pendaftaran</option>
                                                <option value="haji" {{ old('jenis_daftar') == 'haji' ? 'selected' : '' }}>Haji</option>
                                                <option value="umroh" {{ old('jenis_daftar') == 'umroh' ? 'selected' : '' }}>Umroh</option>
                                        </select>
                                        @error('jenis_daftar')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-5 col-form-label">Tanggal Pendaftaran</label>
                                        <div class="col-md-7">
                                        <input readonly value="{{ $tgl_skrg }}" class="form-control @error('tanggal_pendaftaran') is-invalid @enderror" name="tanggal_pendaftaran" type="date" />
                                        @error('tanggal_pendaftaran')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="tanggal_berangkat" class="col-md-5 col-form-label">Tanggal Keberangkatan</label>
                                        <div class="col-md-7">
                                        <input name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}" class="form-control @error('tanggal_berangkat') is-invalid @enderror" type="date" />
                                        @error('tanggal_berangkat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-warning">
                        <h5 class="card-title fw-semibold my-3 ml-3  text-white">Data Diri Jamaah</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="nama_lengkap" class="col-md-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-9">
                                            <input readonly value="{{ auth()->user()->name }}" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" type="text" />
                                            @error('nama_lengkap')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-search-input" class="col-md-3 col-form-label">Tempat/ Tanggal lahir</label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input value="{{ old('tempat_lahir') }}" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" type="text" />
                                                    @error('tempat_lahir')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" />
                                                    @error('tanggal_lahir')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="defaultSelect" class="col-md-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-md-9">
                                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                            <option disabled selected value>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Pekerjaan</label>
                                        <div class="col-md-9">
                                            <input name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control @error('pekerjaan') is-invalid @enderror" type="text" />
                                            @error('pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Pendidikan Terakhir</label>
                                        <div class="col-md-9">
                                            <input value="{{ old('pendidikan_terakhir') }}" name="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" type="text" />
                                            @error('pendidikan_terakhir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Nama Ayah</label>
                                        <div class="col-md-9">
                                            <input name="nama_ayah" value="{{ old('nama_ayah') }}" class="form-control @error('nama_ayah') is-invalid @enderror" type="text" />
                                            @error('nama_ayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Nama Ibu</label>
                                        <div class="col-md-9">
                                            <input name="nama_ibu" value="{{ old('nama_ibu') }}" class="form-control @error('nama_ibu') is-invalid @enderror" type="text" />
                                            @error('nama_ibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <small class="text-danger mb-3 "><i>Jika perempuan wajib diisi :</i></small>
                                    <div class="card my-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <label for="html5-text-input" class="col-md-3 col-form-label">Nama Mahram</label>
                                                <div class="col-md-9">
                                                    <input name="nama_mahram" value="{{ old('nama_mahram') }}" class="form-control @error('nama_mahram') is-invalid @enderror" type="text" />
                                                    @error('nama_mahram')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="defaultSelect" class="col-md-3 col-form-label">Status Mahram</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="status_mahram">
                                                        <option disabled selected value>Pilih Status Mahram</option>
                                                        <option value="suami" {{ old('status_mahram') == 'suami' ? 'selected' : '' }}>Suami</option>
                                                        <option value="ayah" {{ old('status_mahram') == 'ayah' ? 'selected' : '' }}>Ayah</option>
                                                        <option value="anak" {{ old('status_mahram') == 'anak' ? 'selected' : '' }}>Anak</option>
                                                        <option value="adik" {{ old('status_mahram') == 'adik' ? 'selected' : '' }}>Adik</option>
                                                        <option value="kakak" {{ old('status_mahram') == 'kakak' ? 'selected' : '' }}>Kakak</option>
                                                        <option value="lain_lain" {{ old('status_mahram') == 'lain_lain' ? 'selected' : '' }}>Lain-lain</option>
                                                    </select>
                                                    @error('status_mahram')
                                                    <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Pas Foto 3x4</label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <img class="img-preview img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-warning">
                        <h5 class="card-title fw-semibold my-3 ml-3  text-white">Data Paspor Jamaah</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">No. Paspor</label>
                                        <div class="col-md-9">
                                            <input name="no_paspor" value="{{ old('no_paspor') }}" class="form-control @error('no_paspor') is-invalid @enderror" type="number" />
                                            @error('no_paspor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Dikeluarkan di</label>
                                        <div class="col-md-9">
                                            <input name="tempat_paspor_terbit" value="{{ old('tempat_paspor_terbit') }}" class="form-control @error('tempat_paspor_terbit') is-invalid @enderror" type="text" />
                                            @error('tempat_paspor_terbit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-5 col-form-label">Tanggal dikeluarkannya</label>
                                        <div class="col-md-7">
                                            <input name="tanggal_paspor_dibuat" value="{{ old('tanggal_paspor_dibuat') }}" class="form-control @error('tanggal_paspor_dibuat') is-invalid @enderror" type="date" />
                                            @error('tanggal_paspor_dibuat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-5 col-form-label">Tanggal akhir berlakunya</label>
                                        <div class="col-md-7">
                                            <input name="tanggal_akhir_paspor" value="{{ old('tanggal_akhir_paspor') }}" class="form-control @error('tanggal_akhir_paspor') is-invalid @enderror" type="date" />
                                            @error('tanggal_akhir_paspor')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-warning">
                        <h5 class="card-title fw-semibold my-3 ml-3  text-white">Alamat Jamaah</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Alamat</label>
                                        <div class="col-md-9">
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Kelurahan</label>
                                        <div class="col-md-9">
                                            <input name="kelurahan" value="{{ old('kelurahan') }}" class="form-control @error('kelurahan') is-invalid @enderror" type="text" />
                                            @error('kelurahan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Kecamatan</label>
                                        <div class="col-md-9">
                                            <input name="kecamatan" value="{{ old('kecamatan') }}" class="form-control @error('kecamatan') is-invalid @enderror" type="text" />
                                            @error('kecamatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Kota</label>
                                        <div class="col-md-9">
                                            <input name="kota" value="{{ old('kota') }}" class="form-control @error('kota') is-invalid @enderror" type="text" />
                                            @error('kota')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Kode Pos</label>
                                        <div class="col-md-9">
                                            <input name="kode_pos" value="{{ old('kode_pos') }}" class="form-control @error('kode_pos') is-invalid @enderror" type="number" />
                                            @error('kode_pos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-9">
                                            <input readonly name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror" type="email" />
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-3 col-form-label">No. Telepon</label>
                                        <div class="col-md-9">
                                            <input name="no_telp" value="{{ old('no_telp') }}" class="form-control @error('no_telp') is-invalid @enderror" type="number" />
                                            @error('no_telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-warning">
                        <h5 class="card-title fw-semibold my-3 ml-3  text-white">Lain-lain</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="defaultSelect" class="col-md-3 col-form-label">Pernah Pergi Haji</label>
                                        <div class="col-md-9">
                                            <select class="form-control  @error('pernah_haji') is-invalid @enderror" name="pernah_haji">
                                            <option disabled selected value>Pilih</option>
                                            <option value="pernah" {{ old('pernah_haji') == 'pernah' ? 'selected' : '' }}>Pernah</option>
                                            <option value="belum" {{ old('pernah_haji') == 'belum' ? 'selected' : '' }}>Belum</option>
                                        </select>
                                        @error('pernah_haji')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="defaultSelect" class="col-md-3 col-form-label">Pernah Pergi Umroh</label>
                                        <div class="col-md-9">
                                            <select class="form-control  @error('pernah_umroh') is-invalid @enderror" name="pernah_umroh">
                                            <option disabled selected value>Pilih</option>
                                            <option value="pernah" {{ old('pernah_umroh') == 'pernah' ? 'selected' : '' }}>Pernah</option>
                                            <option value="belum" {{ old('pernah_umroh') == 'belum' ? 'selected' : '' }}>Belum</option>
                                        </select>
                                        @error('pernah_umroh')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="defaultSelect" class="col-md-3 col-form-label">Fasilitas Kamar</label>
                                        <div class="col-md-9">
                                            <select class="form-control  @error('fasilitas_kamar') is-invalid @enderror" name="fasilitas_kamar">
                                            <option disabled selected value>Pilih Fasilitas</option>
                                            <option value="double" {{ old('fasilitas_kamar') == 'double' ? 'selected' : '' }}>Double</option>
                                            <option value="triple" {{ old('fasilitas_kamar') == 'triple' ? 'selected' : '' }}>Triple</option>
                                            <option value="quad" {{ old('fasilitas_kamar') == 'quad' ? 'selected' : '' }}>Quad</option>
                                        </select>
                                        @error('fasilitas_kamar')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <small class="text-danger mb-3"><i>Jika memilih Triple * atau Quad * wajib diisi :</i></small>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <label for="defaultSelect" class="col-md-3 col-form-label">Merokok</label>
                                                <div class="col-md-9">
                                                    <select class="form-control @error('merokok') is-invalid @enderror" name="merokok">
                                                    <option disabled selected value>Pilih</option>
                                                    <option value="ya" {{ old('merokok') == 'ya' ? 'selected' : '' }}>Ya</option>
                                                    <option value="tidak" {{ old('merokok') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                                </select>
                                                @error('merokok')
                                                <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row">
                                        <label for="defaultSelect" class="col-md-4 col-form-label">Memiliki Penyakit Khusus</label>
                                        <div class="col-md-8">
                                            <select class="form-control @error('memiliki_penyakit') is-invalid @enderror" name="memiliki_penyakit">
                                            <option disabled selected value>Pilih</option>
                                            <option value="ya" {{ old('memiliki_penyakit') == 'ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="tidak" {{ old('memiliki_penyakit') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                        @error('memiliki_penyakit')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <small class="text-danger"><i>Jika <strong>Ya</strong> sebutkan :</i></small>
                                    <div class="card my-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <label for="html5-text-input" class="col-md-4 col-form-label">Nama Penyakit</label>
                                                <div class="col-md-8">
                                                    <input name="nama_penyakit" value="{{ old('nama_penyakit') }}" class="form-control @error('nama_penyakit') is-invalid @enderror"  type="text" />
                                                    @error('nama_penyakit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="defaultSelect" class="col-md-4 col-form-label">Memerlukan Penanganan Khusus</label>
                                        <div class="col-md-8">
                                            <select class="form-control @error('perlu_penanganan_khusus') is-invalid @enderror" name="perlu_penanganan_khusus">
                                            <option disabled selected value>Pilih</option>
                                            <option value="ya" {{ old('perlu_penanganan_khusus') == 'ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="tidak" {{ old('perlu_penanganan_khusus') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                        @error('perlu_penanganan_khusus')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="defaultSelect" class="col-md-4 col-form-label">Fasilitas Kursi Roda</label>
                                        <div class="col-md-8">
                                            <select class="form-control @error('perlu_kursi_roda') is-invalid @enderror" name="perlu_kursi_roda">
                                            <option disabled selected value>Pilih</option>
                                            <option value="ya" {{ old('perlu_kursi_roda') == 'ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="tidak" {{ old('perlu_kursi_roda') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                        @error('perlu_kursi_roda')
                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-warning">
                        <h5 class="card-title fw-semibold my-3 ml-3  text-white">Dokumen Pendaftaran</h5>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-4 col-form-label">Tabungan Haji/Umroh</label>
                                        <div class="col-md-8">
                                            <input name="bukti_tabungan" class="form-control @error('bukti_tabungan') is-invalid @enderror" type="file" id="formFile" />
                                            @error('bukti_tabungan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-4 col-form-label">Setoran BPIH</label>
                                        <div class="col-md-8">
                                            <input name="bukti_setoran_bpih" class="form-control @error('bukti_setoran_bpih') is-invalid @enderror" type="file" id="formFile" />
                                            @error('bukti_setoran_bpih')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-4 col-form-label">Setoran BIPIJ</label>
                                        <div class="col-md-8">
                                            <input name="bukti_setoran_bipij" class="form-control @error('bukti_setoran_bipij') is-invalid @enderror" type="file" id="formFile" />
                                            @error('bukti_setoran_bipij')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">KTP</label>
                                        <div class="col-md-10">
                                            <input name="ktp" class="form-control @error('ktp') is-invalid @enderror" type="file" id="formFile" />
                                            @error('ktp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">KK</label>
                                        <div class="col-md-10">
                                            <input name="kk" class="form-control @error('kk') is-invalid @enderror" type="file" id="formFile" />
                                            @error('kk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">AKTE</label>
                                        <div class="col-md-10">
                                            <input name="akte" class="form-control @error('akte') is-invalid @enderror" type="file" id="formFile" />
                                            @error('akte')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mr-1">
                        <button type="submit" class="btn btn-warning text-white mt-3"><strong>DAFTAR</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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