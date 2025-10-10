<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="{{ url('') }}">
            <img src="{{ asset('images/logo-trans.png') }}" alt="Logo navbar Abeka" class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse w-100 justify-content-center" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#link1">Link 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#link2">Link 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('company')}}">Company Profile</a>
                </li>
            </ul>
        </div>

            <button type="button" class="btn btn-warning ms-auto">Login</button>
    </div>
</nav>

<style>
    body {
        margin: 0;
        padding: 0;
    }
    
    .navbar {
        padding: 0.5rem 1rem;
    }
    
    .navbar img {
        height: 40px;
    }
</style>