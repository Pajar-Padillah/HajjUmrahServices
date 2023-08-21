@extends('layout/main')
@section('content')
<div class="banner-carousel banner-carousel-2 mb-0">
    <div class="banner-carousel-item" style="background-image:url(img/2.jpg)">
        <div class="container">
            <div class="box-slider-content">
                <div class="box-slider-text">
                    <h3 class="box-slide-sub-title">SISTEM INFORMASI PENDAFTARAN HAJI DAN UMROH</h3>
                    <p class="box-slide-description">Daftar haji dan umroh sekarang</p>
                    <p>
                        <a class="btn btn-primary" href="{{ route('register') }}"><strong>DAFTAR </strong></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-carousel-item" style="background-image:url(img/3.jpg)">
        <div class="slider-content text-left">
            <div class="container">
                <div class="box-slider-content">
                    <div class="box-slider-text">
                        <h3 class="box-slide-sub-title">KEMENTERIAN AGAMA OGAN KOMERING ULU</h3>
                        <p class="box-slide-description">Daftar haji dan umroh sekarang</p>
                        <p>
                            <a class="btn btn-primary" href="{{ route('register') }}"><strong>DAFTAR </strong></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="call-to-action no-padding">
    <div class="container">
        <div class="action-style-box">
            <div class="row">
                <div class="col-md-8 text-center text-md-left">
                    <div class="call-to-action-text">
                        <h3 class="action-title">Daftar Haji dan Umroh Sekarang</h3>
                    </div>
                </div>
                <!-- Col end -->
                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                    <div class="call-to-action-btn">
                        <a class="btn btn-primary" href="{{ route('register') }}"><strong>DAFTAR </strong></a>
                    </div>
                </div>
                <!-- col end -->
            </div>
            <!-- row end -->
        </div>
        <!-- Action style box -->
    </div>
    <!-- Container end -->
</section>

<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Informasi Haji dan Umroh</h3>
            </div>
        </div>
        <!--/ Title row end -->
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="img-div">
                            <img class="rounded image" src="{{ asset('img/haji.jpg') }}" height="460px" width="100%">    
                        </div>
                            <div class="popup-img">
                                <span>&times;</span>
                                <img class="image" src="{{ url('img/haji.jpg') }}">
                            </div>
                    </div>
                    <div class="col-lg-7">
                        <p align="justify">Hukum menjalankan ibadah haji ialah wajib bagi setiap muslim yang mampu, sesuai dengan firman Allah dalam Q.S. Ali Imran Ayat 97.</p>
                        فِيهِ ءَايَٰتٌۢ بَيِّنَٰتٌ مَّقَامُ إِبْرَٰهِيمَ ۖ وَمَن دَخَلَهُۥ كَانَ ءَامِنًا ۗ وَلِلَّهِ عَلَى ٱلنَّاسِ حِجُّ ٱلْبَيْتِ مَنِ ٱسْتَطَاعَ إِلَيْهِ سَبِيلًا ۚ وَمَن كَفَرَ فَإِنَّ ٱللَّهَ غَنِىٌّ عَنِ ٱلْعَٰلَمِينَ
                        <p align="justify">fiihi aayaatun bayyinaatun maqaamu ibraahiima waman dakhalahu kaana aaminan walillaahi ‘alaa nnaasi hijju lbayti mani istathaa’a ilayhi sabiilan waman kafara fa-inna laaha ghaniyyun ‘ani l’aalamiin.</p>
                        <p align="justify">Artinya: “Padanya terdapat tanda-tanda yang nyata (di antaranya) maqam Ibrahin, barang siapa memasukinya (Baitullah itu) menjadi amanlah dia. Mengerjakan haji adalah kewajiban manusia terhadap Allah, yaitu (bagi) orang
                            yang sanggup mengadakan perjalanan ke Baitullah. Barang siapa mengingkari (kewajiban haji) maka sesungguhnya Allah Mahakaya (tidak memerlukan sesuatu) dari semesta alam.” (Q.S. Ali Imran [97]).</p>
                        <p align="justify">Pendapat beberapa ulama bahwa umrah hukumnya mutahabah artinya baik untuk dilaksanakan dan sunah dilaksanakan (tidak diwajibkan).</p>
                        <p align="justify">Untuk dapat melaksanakan ibadah Haji dan Umroh para calon jemaah bisa mendapatkan Informasi mengenai syarat-syarat pelaksaan Haji dan Umroh di bawah ini</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>

<section class="pb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Syarat Pendaftaran</h3>
            </div>
        </div>
        <!--/ Title row end -->
        <div class="card mb-4 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <p align="justify">Persyaratan pendaftaran haji diatur dalam Keputusan Direktur Jenderal Penyelenggaraan Haji dan Umrah tentang Pedoman Pendaftaran Haji Reguler. Persyaratan dapat di lihat di gambar.</p>
                        <p align="justify">Untuk mendapatkan form pendaftaran Haji dan Umroh calon jemaah haji dan umroh dapat mengklik link
                            <a href="/img/form.pdf" download><strong class="text-success">Form Pendaftaran</strong></a></p>
                        <p>Untuk informasi lebih lanjut dapat menghubungi
                            <a href="https://api.whatsapp.com/send?phone=6285768725033"><strong class="text-warning">Kontak Kami</strong></a></p>
                        <p><a href="https://drive.google.com/file/d/1KIXO9_Z4VaH10wpKVEh0uj5MaG3r30qd/view?usp=sharing" target="_blank" class="btn btn-secondary btn-md">Contoh Berkas Pendaftaran</a></p>
                    </div>
                    <div class="col-lg-6">
                        @if ($syarats->count())
                        @foreach ($syarats as $syarat)
                        <p align="center"><iframe src="{{ asset('storage/'. $syarat->file_syarat) }}" height="300px" width="100%"> </iframe></p>
                        @endforeach
                        @else
                        <img class="image" src="{{ url('img/alurhaji.jpg') }}" width="100%" height="300px">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>
@endsection