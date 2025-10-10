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

@endsection

<style>
    .jumbotron {
        background-image: url('{{ asset('images/jumbotron-test.jpg') }}');
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
        height: 100vh;
    }

    .jumbotron .overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>