@extends('layouts.landing')

@section('title', 'Tarif - Abeka Transportation')

@section('content')

<section class="section-vert-p bg-light">
    <div class="container">
        <x-section-heading-and-container
            heading_1="Tarif"
            heading_2="Layanan"
        >
            <p class="lead text-muted">Kami menghadirkan harga yang kompetitif dan adil untuk setiap kilometer perjalanan barang Anda.</p>
        </x-section-heading-and-container>
    </div>

   <div class="container">
        <div class="table-responsive mb-4">
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
                    @foreach($layanan as $layanan)
                        <tr class="{{ $loop->iteration >= 11 ? 'collapse table-collapse' : '' }}">
                            <td class="text-muted">{{ $layanan->judul }}</td>
                            <td class="text-muted">Rp {{ number_format($layanan->harga_per_km, 0, ',', '.') }}</td>
                            <td class="text-muted">Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}</td>
                            <td class="text-muted">Rp {{ number_format($layanan->biaya_minimum, 0, ',', '.') }}</td>
                            <td class="text-muted">{{ $layanan->berat_maks_kg }} kg</td>
                            <td class="text-muted">{{ $layanan->volume_maks_m3 }} m<sup>3</sup></td>
                            <td class="text-muted">{{ $layanan->berat_volumetrik_ratio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container text-center">
        <button class="btn theme-button" data-bs-toggle="collapse" data-bs-target=".table-collapse">
            Lihat Semuanya
        </button>
    </div>
</section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const button = document.querySelector('.theme-button[data-bs-toggle="collapse"]');

        button.addEventListener('click', () => {
            button.style.display = 'none';
        });
    });
</script>