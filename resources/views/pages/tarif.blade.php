@extends('layouts.landing')

@section('title', 'Tarif - Abeka Transportation')

@section('content')

<section class="section-vert-p bg-light">
    <div class="container">
        <x-landing.section-heading-and-container
            heading_1="Tarif"
            heading_2="Layanan"
        >
            <p class="lead text-muted">Kami menghadirkan harga yang kompetitif dan adil untuk setiap kilometer perjalanan barang Anda.</p>
        </x-landing.section-heading-and-container>
    </div>

   <div class="container">
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <th scope="col">Layanan</th>
                    <th scope="col">Harga per Km</th>
                    <th scope="col">Harga per Kg</th>
                    <th scope="col">Biaya Minimum</th>
                    <th scope="col">Berat Maks (kg)</th>
                    <th scope="col">Volume Maks (m<sup>3</sup>)</th>
                    <th scope="col">Rasio Berat Volumetrik</th>
                </thead>
                <tbody>
                    @foreach($layanans as $layanan)
                        <div class="container">
                            <tr>
                                <td>{{ $layanan->judul }}</td>
                                <td>Rp {{ $layanan->harga_per_km }}</td>
                                <td>Rp {{ $layanan->harga_per_kg }}</td>
                                <td>Rp {{ $layanan->biaya_minimum }}</td>
                                <td>{{ $layanan->berat_maks_kg }} kg</td>
                                <td>{{ $layanan->volume_maks_m3 }} m<sup>3</sup></td>
                                <td>{{ $layanan->berat_volumetrik_ratio }}</td>
                            </tr>
                        </div>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
{{-- 
<section class="section-vert-p">
 
</section> --}}

@endsection