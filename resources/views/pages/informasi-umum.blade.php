@extends("layouts.landing")

@section('title', 'Informasi Umum - Abeka Transportation')

@section('content')

<section class="section-vert-p bg-light">
    <div class="container">
        <x-landing.section-heading-and-container
            heading_1="Informasi"
            heading_2="Umum"
        >
            <p class="lead text-muted">
                Panduan mengenai syarat pengiriman, batasan berat dan volume, perhitungan biaya, serta kebijakan layanan disediakan untuk memastikan proses pengiriman berjalan lancar dan aman.
            </p>
        </x-landing.section-heading-and-container>
    </div>
</section>

<section class="section-vert-p">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sidebar-nav position-sticky" style="top: 76px;">
                    <div class="d-flex gap-0">
                        <div class="flex-1 overflow-y-auto" style="max-height: calc(95vh - 76px); padding-right: 40px;">
                            <x-landing.informasi-umum.informasi-links :allKategori="$allKategori" gap="5" /> 
                        </div>
                    </div>        
                </div>
            </div>

            <div class="accordion show d-block d-lg-none">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed full-width" type="button" data-bs-toggle="collapse" data-bs-target="#informasiCollapse" aria-expanded="false" aria-controls="informasiCollapse">
                            <div class="container-fluid text-center">
                                <i class="fa-solid fa-bars text-black"></i>
                            </div>
                        </button>
                    </h2>
                    <div id="informasiCollapse" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="d-flex gap-4 overflow-y-auto" style="max-height: 250px;">
                                <x-landing.informasi-umum.informasi-links :allKategori="$allKategori" gap="4" />
                            </div>      
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 ps-lg-5">
                @foreach($informasiCurrent as $info)
                    <h3 class="fw-bold mb-4 pt-4" id="{{ Str::slug($info->judul) }}">{{ $info->judul }}</h3>
                    <p class="text-muted mb-3 infoisi">{{ $info->isi }}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

<style>
    .accordion-button {
        background-color: #fff !important;
        color: black;
        border: none;
        box-shadow: none !important;
    }
    .accordion-button:not(.collapsed) {
        background-color: #e0e0e0;
        color: #000;
    }
    .accordion-button:focus {
        outline: none;
        box-shadow: none;
    }

    .infoisi {
        text-align: justify;
    }
</style>