
<div class="informasi-links flex-1 overflow-y-auto" style="max-height: calc(0.95 * (100vh - 76px)); padding-right: 40px;">
    @foreach($allKategori as $kategori_info)
        <a href="{{ route('informasi-umum', ['kategori' => $kategori_info->kategori]) }}" class="nav-link mb-3">
            <h4 class="fw-bold text-dark mb-2 informasi-link" id="{{ $kategori_info->kategori }}">{{ $kategori_info->kategori }}</h4>
        </a>
        <ul class="mb-{{ $gap }}">
            @foreach($kategori_info->informasiUmum as $info)
                <li>
                    <a href="{{ route('informasi-umum', ['kategori' => $kategori_info->kategori]) }}#{{ Str::slug($info->judul) }}" class="informasi-link text-muted">
                        {{ $info->judul }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endforeach       
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const pathname = window.location.pathname.split('/');

        if (pathname.length == 2) {
            return;
        }

        document.querySelector('.informasi-links').scrollTo({
            top: document.getElementById(decodeURI(pathname.pop())).offsetTop
        });

        const hash = window.location.hash.substring(1);

        if (hash.length == 0) {
            return;
        }

        window.scrollTo({
            top: document.getElementById(`info-${hash}`).offsetTop - 66
        });

        window.addEventListener('hashchange', () => {
            location.reload();
        });
    });
</script>

<style>
    .informasi-link {
        font-size: 18px;
        cursor: pointer;
        text-decoration: none;
    }

    .informasi-link:hover {
        color: #f15a25;
        transition: color 0.3s ease;
    }
</style>

{{-- <div class="list-group">
    @foreach($allKategori as $kategori_info)
        <div class="dropdown mb-3">
            <!-- Dropdown toggle -->
            <a class="list-group-item list-group-item-action dropdown-toggle fw-bold text-dark" 
               href="#" 
               role="button" 
               id="dropdown-{{ $kategori_info->id }}" 
               data-bs-toggle="dropdown" 
               aria-expanded="false" 
               style="font-size: 18px; cursor: pointer;">
               {{ $kategori_info->kategori }}
            </a>

            <!-- Dropdown menu -->
            <ul class="dropdown-menu" aria-labelledby="dropdown-{{ $kategori_info->id }}">
                @foreach($kategori_info->informasiUmum as $info)
                    <li>
                        <a class="dropdown-item" href="/informasi-umum/{{ $kategori_info->kategori }}#{{ Str::slug($info->judul) }}">
                            {{ $info->judul }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div> --}}
