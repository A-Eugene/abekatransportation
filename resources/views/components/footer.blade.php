<footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <img src="{{ asset('images/logo-trans-white.png') }}" alt="Logo Abeka" class="mb-3" style="height: 50px;">
                <p class="text-body-secondary small">Layanan ekspedisi terpercaya untuk pengiriman Anda.</p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3">Navigation</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" class="text-decoration-none text-body-secondary">Beranda</a></li>
                    <li class="mb-2"><a href="/tarif" class="text-decoration-none text-body-secondary">Tarif</a></li>
                    <li class="mb-2"><a href="/informasi" class="text-decoration-none text-body-secondary">Informasi</a></li>
                    <li class="mb-2"><a href="/profil-perusahaan" class="text-decoration-none text-body-secondary">Company Profile</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="mb-3">Contact Us</h5>
                <div class="mb-3">
                    <p class="mb-2"><a href="mailto:aj_care@yahoo.com" class="text-decoration-none text-body-secondary">aj_care@yahoo.com</a></p>
                </div>
                <p class="mb-2 small"><strong>Telepon:</strong></p>
                <p class="mb-1 small text-body-secondary">☎️ 0852-2364-1947 (Surabaya)</p>
                <p class="mb-1 small text-body-secondary">☎️ 0851-0079-8845 (Tulungagung)</p>
                <p class="mb-1 small text-body-secondary">☎️ 0823-4809-0700 (Kediri)</p>
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
                <p class="mb-0 small text-body-secondary">&copy; {{ date("Y") }} Abeka Transportation. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<style>
    footer a:hover {
        color: #f15a25 !important;
        transition: color 0.3s ease;
    }

    footer .text-body-secondary {
        color: #adb5bd !important;
    }
</style>