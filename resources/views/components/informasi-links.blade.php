<div>
    @foreach($allKategori as $kategori_info)
        <a href="/informasi-umum/{{ $kategori_info->kategori }}" class="nav-link mb-3">
            <h4 class="fw-bold text-dark mb-2 nav-link" style="font-size: 18px; cursor: pointer">{{ $kategori_info->kategori }}</h4>
        </a>
        <ul class="mb-{{ $gap }}">
            @foreach($kategori_info->informasiUmum as $info)
                <li><a href="/informasi-umum/{{ $kategori_info->kategori }}#{{ Str::slug($info->judul) }}" class="nav-link text-muted">{{ $info->judul }}</a></li>
            @endforeach
        </ul>
    @endforeach       
</div>