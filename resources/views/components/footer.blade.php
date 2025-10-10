<footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <img src="{{ asset('images/logo-trans.png') }}" alt="Logo Abeka" class="mb-3" style="height: 50px;">
                <p class="text-muted small">Layanan transportasi terpercaya untuk perjalanan Anda.</p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3">Navigation</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#link1" class="text-decoration-none text-muted">Link 1</a></li>
                    <li class="mb-2"><a href="#link2" class="text-decoration-none text-muted">Link 2</a></li>
                    <li class="mb-2"><a href="{{ route('company')}}" class="text-decoration-none text-muted">Company Profile</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3">Contact Us</h5>
                <div class="mb-3">
                    <p class="mb-2"><a href="mailto:aj_care@yahoo.com" class="text-decoration-none text-muted">aj_care@yahoo.com</a></p>
                </div>
                <p class="mb-2 small"><strong>Telepon:</strong></p>
                <p class="mb-1 small text-muted">☎️ 0852-2364-1947 (Surabaya)</p>
                <p class="mb-1 small text-muted">☎️ 0851-0079-8845 (Tulungagung)</p>
                <p class="mb-1 small text-muted">☎️ 0823-4809-0700 (Kediri)</p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3">Follow Us</h5>
                <a href="https://www.instagram.com/abekatransportation/" target="_blank" class="text-light" style="font-size: 1.5rem;">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>

        <hr class="border-secondary mt-4 mb-3">

        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 small text-muted">&copy; 2025 Abeka Transportation. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<style>
    footer a:hover {
        color: #f15a25 !important;
        transition: color 0.3s ease;
    }

    footer i {
        transition: transform 0.3s ease;
    }

    footer i:hover {
        transform: scale(1.2);
    }
</style>