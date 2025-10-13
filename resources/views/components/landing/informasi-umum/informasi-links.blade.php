<div>
    @foreach($allKategori as $kategori_info)
        <h4 class="fw-bold text-dark mb-2" style="font-size: 18px;">{{ $kategori_info->kategori }}</h4>
        <ul class="list-unstyled mb-{{ $gap }}">
            @foreach($kategori_info->informasiUmum as $info)
                <li><a href="/informasi-umum/{{ $kategori_info->kategori }}#{{ Str::slug($info->judul) }}" class="nav-link">{{ $info->judul }}</a></li>
            @endforeach
        </ul>
    @endforeach       
</div>