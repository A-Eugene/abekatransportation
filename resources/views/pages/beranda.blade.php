@extends('layouts.landing')

@section('title', 'Abeka Transportation')

@section('content')

<div class="jumbotron container-fluid position-relative">
  <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>

  <div class="container position-relative text-white text-center d-flex flex-column justify-content-center align-items-center h-100">
      <h1 class="fw-bold display-4">Solusi Terpercaya untuk Pengiriman Anda</h1>
      <p class="lead mt-3">
          Abeka Transportation — Mitra ekspedisi andalan sejak 1994, melayani pengiriman antar kota dengan aman dan tepat waktu.
      </p>
      <a href="#layanan" class="btn btn-lg theme-button">Pelajari Layanan Kami</a>
  </div>
</div>

<section class="section-vert-p">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">MENGAPA<br><span style="color: #f15a25;">MEMILIH KAMI</span></h2>
                <div style="width: 80px; height: 3px; background-color: #f15a25;" class="mb-4"></div>
                <p class="text-muted">
                    Kami percaya bahwa layanan pengiriman terbaik harus didukung oleh kualitas, kecepatan, dan kepercayaan.
                    Berikut adalah empat alasan utama mengapa ABEKA Transportation adalah mitra logistik yang tepat untuk Anda :
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="p-4 h-100">
                    <h1 style="color: #f15a25; font-size: 3rem;" class="fw-bold mb-3">01</h1>
                    <h5 class="fw-bold mb-3">Efisiensi Biaya dan Waktu Maksimal</h5>
                    <p class="text-muted mb-0">
                        Kami menjamin layanan pengiriman yang cepat tanpa mengorbankan dompet Anda dan kami berkomitmen untuk memberikan solusi logistik
                        yang hemat biaya dengan tetap menjaga standar ketepatan waktu yang tinggi
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="p-4 h-100">
                    <h1 style="color: #f15a25; font-size: 3rem;" class="fw-bold mb-3">02</h1>
                    <h5 class="fw-bold mb-3">Kekuatan Tim Operasional yang Profesional</h5>
                    <p class="text-muted mb-0">
                        Di balik setiap pengiriman sukses adalah tim kami yang solid, terlatih, dan berdedikasi tinggi. 
                        Setiap anggota tim bekerja secara profesional untuk memastikan barang Anda ditangani dengan hati-hati dan keahlian terbaik.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="p-4 h-100">
                    <h1 style="color: #f15a25; font-size: 3rem;" class="fw-bold mb-3">03</h1>
                    <h5 class="fw-bold mb-3">Jaringan Luas dan Keandalan Regional</h5>
                    <p class="text-muted mb-0">
                        Kami telah membangun fokus operasional yang kuat di berbagai wilayah strategis, menawarkan jangkauan yang
                        luas dan keandalan yang telah teruji di daerah tersebut.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="p-4 h-100">
                    <h1 style="color: #f15a25; font-size: 3rem;" class="fw-bold mb-3">04</h1>
                    <h5 class="fw-bold mb-3">Komitmen Penuh terhadap Keamanan</h5>
                    <p class="text-muted mb-0">
                        Kami menempatkan keamanan barang Anda sebagai prioritas utama dan kami sangat menjamin setiap paket diangkut dengan
                        integritas penuh dan tiba di tujuan dalam kondisi utuh dan sesuai jadwal yang telah disepakati.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-vert-p bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">JANGKAUAN<br><span style="color: #f15a25;">LAYANAN</span></h2>
                <div style="width: 80px; height: 3px; background-color: #f15a25;" class="mb-4"></div>
            </div>
        </div>

        <div class="row g-4">
            @foreach($jangkauans as $jangkauan)
                <div class="jangkauan col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-image position-relative overflow-hidden rounded-top">
                            <img src="{{ asset('images/jangkauan/' . $jangkauan->image) }}" 
                                class="card-img-top w-100 h-100 object-fit-cover" 
                                alt="{{ $jangkauan->lokasi }}">
                            <div class="position-absolute top-0 start-0 w-100 h-100" 
                                style="background-color: rgba(0,0,0,0.4);"></div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $jangkauan->lokasi }}</h5>
                            <p class="card-text text-muted mb-1">{{ $jangkauan->alamat }}</p>
                            <p class="card-text text-muted">{{ $jangkauan->telepon }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="container-fluid">
    @include('components.contact-section')
</div>

@endsection

<style>
    .jumbotron {
        background-image: url('{{ asset('images/jumbotron-test.jpg') }}');
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
        height: calc(100vh - 66px);
    }

    .jumbotron .overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .card-image {
        height: 250px; 
        overflow: hidden;
    }

    .jangkauan > .card {
        transition: 0.3s ease;
    }

    .jangkauan > .card:hover {
        background: #f15a25 !important;
        color: white !important;
    }
</style>