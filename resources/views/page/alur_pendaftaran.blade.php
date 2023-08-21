@extends('layout/main')
@section('content')
<div id="banner-area" class="banner-area" style="background-image:url(img/3.jpg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Alur Pendaftaran</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Alur Pendaftaran</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Col end -->
            </div>
            <!-- Row end -->
        </div>
        <!-- Container end -->
    </div>
    <!-- Banner text end -->
</div>

<section>
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Alur Pendaftaran Haji dan Umroh</h3>
            </div>
        </div>
        <!--/ Title row end -->
        <div class="card mb-5 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <p align="justify">Adapun persyaratan untuk mendaftar Haji dan Umroh adalah </p>
                        <ol>
                            <li>Beragama Islam</li>
                            <li>Berusia paling rendah 12 (dua belas) tahun pada saat mendaftar</li>
                            <li>Memiliki kartu identitas yang sah sesuai domisili</li>
                            <li>Memiliki Kartu Keluarga</li>
                            <li>Memiliki akta kelahiran atau surat kenal lahir atau kutipan akta nikah atau ijazah</li>
                            <li>Memiliki tabungan atas nama calon jemaah yang bersangkutan pada BPS-BPIH</li>
                        </ol>
                    </div>
                    <div class="col-lg-5">
                        <div class="img-div">
                            <img class="image" src="{{ url('img/alurhaji.jpg') }}" height="250px" width="100%">
                        </div>
                        <div class="popup-img">
                            <span>&times;</span>
                            <img class="image" src="{{ url('img/alurhaji.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p> Alur pendaftran untuk mendaftar Haji dan Umroh adalah</p>
                        <ol>
                            <li align="justify">Calon jemaah haji membuka tabungan haji pada BPS-BPIH sesuai domisili dengan syarat membawa Kartu ldentitas dan setoran awal sebesar 25 juta</li>
                            <li align="justify">CaIon jemaah haji menandatangani surat pernyataan memenuhi persyaratan pendaftaran haji yang diterbitkan oleh Kementerian Agama Republik Indonesia.</li>
                            <li align="justify">CaIon jemaah haji melakukan transfer ke rekening BPKH sebesar setoran awal BPIH pada cabang BPS-BPIH sesuai domisili.</li>
                            <li align="justify">BPS – BPIH menerbitkan lembar bukti setoran awal yang berisi NOMOR VALIDASI. (HARAP PERHATIKAN NOMOR VALIDASI ANDA)</li>
                            <li align="justify">Dokumen bukti setoran awal BPIH ditempel pas foto calon jemaah haji ukuran 3x4 dan bermaterai</li>
                            <li align="justify">CaIon jemaah haji mendatangi Kementerian Agama Kabupaten/Kota dengan membawa dokumen bukti setoran awal dan persyaratan lainnya sesuai ketentuan untuk diverifikasi kelengkapannya paling lambat 5 (lima) hari kerja setelah
                                pembayaran setoran awal BPIH.</li>
                            <li align="justify">CaIon jemaah haji mengisi formulir pendaftaran haji berupa Surat Pendaftaran Pergi Haji (SPPH) dan menyerahkannya kepada petugas Kantor Kementerian Agama Kabupaten/Kota.</li>
                            <li align="justify">CaIon jemaah haji menerima lembar bukti pendaftaran haji yang berisi NOMOR PORSI pendaftaran, ditandatangani dan dibubuhi stempel dinas oleh petugas Kantor Kementerian Agama Kabupaten/Kota. (HARAP PERHATIKAN NOMOR PORSI
                                ANDA)
                            </li>
                            <li align="justify">Kantor Kementerian Agama Kabupaten/Kota menerbitkan bukti cetak SPPH sebanyak 5 (lima) lembar yang setiap lembarnya dicetak/ditempel pas foto calon jemaah haji ukuran 3x4</li>
                        </ol>
                        <span>Kantor Departemen Agama Kab. Ogan Kemering Ulu,</span>
                        <span>Kantor Kementerian Agama Kab. Ogan Kemering Ulu,</span>
                        <span> Alamat : Jl. H. S. Simanjuntak No. 768 Ulu Baturaja OKU, Sumatera Selatan No. Telepon : (0735) 324516-3225 </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>
@endsection