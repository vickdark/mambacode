<!-- Footer -->
<footer class="landing-footer" id="contacto">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="d-flex align-items-center gap-2 mb-3 justify-content-center">
                    <img src="{{ asset('img/mambacode.jpeg') }}" alt="Mamba Code Icon" style="height: 30px; border-radius: 4px;">
                    <span class="fw-bold">Mamba<span style="color: var(--mamba-secondary)">Code</span></span>
                </div>
                <p class="text-white text-justify">Soluciones tecnológicas de alto nivel para empresas modernas.</p>
            </div>

            <div class="col-md-6 mb-4 mb-md-0">
                <h5 class="fw-bold mb-3 text-white">Contacto</h5>
                <ul class="list-unstyled text-white">
                    <li class="mb-2"><i class="fa-solid fa-envelope me-2"></i> contacto@mambacode.com</li>
                    <li class="mb-2"><i class="fa-solid fa-phone me-2"></i> +1 234 567 890</li>
                    <li>
                        <a href="#" class="text-white me-3 fs-5"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="text-white me-3 fs-5"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-white fs-5"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 mb-4 mb-md-0">
                <div class="text-center">
                    @php
                        $fullQuote = \Illuminate\Foundation\Inspiring::quotes()->random();
                        $parts = explode(' - ', $fullQuote);
                        $quote = $parts[0] ?? '';
                        $author = $parts[1] ?? '';
                    @endphp
                    <p class="text-white fst-italic mt-3 text-justify">"{{ $quote }}"<br>- {{ $author }}</p>
                </div>
            </div>
        </div>

        <div class="border-top border-secondary mt-5 pt-4 text-center text-white" style="border-color: rgba(255,255,255,0.1) !important;">
            &copy; {{ date('Y') }} Mamba Code. Todos los derechos reservados.
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<a href="#inicio" class="back-to-top" id="backToTop" title="Volver arriba">
    <i class="fa-solid fa-arrow-up"></i>
</a>
