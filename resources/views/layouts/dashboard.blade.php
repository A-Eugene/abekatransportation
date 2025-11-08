<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="icon" href="{{ asset('images/logo-trans-white.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        .navbar {
            padding: 0.5rem 1rem;
        }
        
        .navbar img {
            height: 40px;
        }

        .sidebar {
            width: 250px;
            padding: 0px;
        }

        .dashboard-link {
            width: 100%;
            padding: 16px 20px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.55);
            display: block;
            transition: color 0.3s ease;
        }

        .dashboard-link:hover {
            color: #f15a25 !important;
            /* background: rgba(255, 255, 255, 0.1); */
        }

        .sidebar-link-is-route {
            color: #f15a25 !important;
            background: rgba(255, 255, 255, 0.1);
        }

        .content {
            flex: 1;
        }

        #navbarNav {
            padding: 0px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="{{  route('beranda') }}">
                <img src="{{ asset('images/logo-trans-white.png') }}" alt="Logo navbar Abeka" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse w-100 justify-content-center" id="navbarNav">
                <x-dashboard-link model="User" :forNavbar="true" />
                <x-dashboard-link model="Informasi Umum" :forNavbar="true" />
                <x-dashboard-link model="Kategori Informasi Umum" :forNavbar="true" />
                <x-dashboard-link model="Jangkauan" :forNavbar="true" />
                <x-dashboard-link model="Layanan" :forNavbar="true" />
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row"  style="height: calc(100vh - 66px)">
            <div class="bg-dark sidebar d-none d-md-block">
                <x-dashboard-link model="User" />
                <x-dashboard-link model="Informasi Umum" />
                <x-dashboard-link model="Kategori Informasi Umum" />
                <x-dashboard-link model="Jangkauan" />
                <x-dashboard-link model="Layanan" />
            </div>

            <div class="content">
            </div>
        </div>
    </div>

    @yield('content')
    @yield('create_modal_content')
    @yield('update_modal_content')
</body>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script>
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            const nav = document.getElementById('navbarNav');
            const inst = bootstrap.Collapse.getInstance(nav);

            if (inst) {
                nav.classList.remove('collapsing');
                nav.classList.remove('show');
                nav.style.height = '';
            }
        }
    });
</script>
</html>