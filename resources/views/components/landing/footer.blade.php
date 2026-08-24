<!-- Footer -->
<footer class="landing-footer" id="contacto">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="d-flex align-items-center gap-2 mb-3 justify-content-center">
                    <img src="{{ asset('img/mambacode.jpeg') }}" alt="Mamba Code Icon" loading="lazy" decoding="async" class="landing-logo-mobile">
                    <span class="fw-bold" style="color: var(--mamba-text);">Mamba<span style="color: var(--mamba-secondary)">Code</span></span>
                </div>
                <p style="color: var(--mamba-text-muted);">Soluciones tecnológicas de alto nivel para empresas modernas.</p>
            </div>

            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="h5 fw-bold mb-3" style="color: var(--mamba-text);">Contacto</h2>
                <ul class="list-unstyled" style="color: var(--mamba-text);">
                    <li class="mb-2"><i class="fa-solid fa-envelope me-2" style="color: var(--mamba-secondary);"></i>lbarriosmunoz1012@gmail.com</li>
                    <li class="mb-2"><i class="fa-solid fa-envelope me-2" style="color: var(--mamba-secondary);"></i>victormanjarres3mayo@gmail.com</li>
                    <li class="mb-2"><i class="fa-solid fa-phone me-2" style="color: var(--mamba-secondary);"></i> +57 323 505 9939</li>
                    <li class="mb-2"><i class="fa-solid fa-phone me-2" style="color: var(--mamba-secondary);"></i> +57 312 335 5193</li>
                    <li class="mb-2"><i class="fa-solid fa-file-contract me-2" style="color: var(--mamba-secondary);"></i><a href="{{ route('privacy.policy') }}" style="color: var(--mamba-secondary);" target="_blank" rel="noopener">Política de Tratamiento de Datos</a></li>
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
                    <p class="fst-italic mt-3 text-justify" style="color: var(--mamba-text-muted);">"{{ $quote }}"<br>- {{ $author }}</p>
                </div>
            </div>
        </div>

        <div class="mt-5 pt-4 text-center" style="border-top: 1px solid var(--footer-border); color: var(--mamba-text-muted);">
            &copy; {{ date('Y') }} Mamba Code. Todos los derechos reservados.
        </div>
    </div>
</footer>

<!-- WhatsApp Button -->
<a href="https://wa.me/573235059939" class="whatsapp-button" target="_blank" title="Contactar por WhatsApp">
    <i class="fa-brands fa-whatsapp"></i>
</a>
<!-- Back to Top Button -->
<a href="#inicio" class="back-to-top" id="backToTop" title="Volver arriba">
    <i class="fa-solid fa-arrow-up"></i>
</a>
