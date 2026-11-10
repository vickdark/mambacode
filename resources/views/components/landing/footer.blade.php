@php
    $contacts = [
        ['text' => 'lbarriosmunoz1012@gmail.com', 'href' => 'mailto:lbarriosmunoz1012@gmail.com'],
        ['text' => 'victormanjarres3mayo@gmail.com', 'href' => 'mailto:victormanjarres3mayo@gmail.com'],
        ['text' => '+57 323 505 9939', 'href' => 'tel:+573235059939'],
        ['text' => '+57 312 335 5193', 'href' => 'tel:+573123355193'],
    ];
@endphp

<footer class="bg-footer text-sm text-muted" id="contacto">
    <div class="container-page grid gap-10 border-t border-glass py-12 md:grid-cols-3">
        <div class="flex flex-col gap-3">
            <x-brand />
            <p>Soluciones tecnológicas de alto nivel para empresas modernas.</p>
        </div>

        <div>
            <h2 class="mb-3 font-mono text-xs text-faint uppercase">Contacto</h2>
            <ul class="space-y-2 font-mono text-[13px]">
                @foreach ($contacts as $contact)
                    <li><a href="{{ $contact['href'] }}" class="break-all transition hover:text-primary">{{ $contact['text'] }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="flex flex-col gap-2">
            <h2 class="mb-1 font-mono text-xs text-faint uppercase">Empresa</h2>
            <a href="{{ route('home') }}#productos" class="transition hover:text-primary">Portafolio</a>
            <a href="{{ route('access.index') }}" class="transition hover:text-primary">Portal de accesos</a>
            <a href="{{ route('privacy.policy') }}" class="transition hover:text-primary">Política de tratamiento de datos</a>
            <span class="mt-2 text-faint">&copy; {{ date('Y') }} Mamba Code</span>
        </div>
    </div>
</footer>

{{-- Floating actions: WhatsApp grows while the top of the page is in view --}}
<div x-data="{ y: window.scrollY }" @scroll.window.throttle.50ms="y = window.scrollY">
    <a
        href="https://wa.me/573235059939"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Contactar por WhatsApp"
        class="fixed right-5 z-[1000] grid place-items-center rounded-full bg-[#25D366] text-white shadow-lg transition-all duration-300 hover:bg-[#1DA851]"
        :class="y < window.innerHeight / 2 ? 'bottom-5 size-15' : 'bottom-[5.25rem] size-12'"
    >
        <x-icons.whatsapp class="size-1/2" />
    </a>

    <a
        href="#inicio"
        aria-label="Volver arriba"
        class="group fixed right-5 bottom-6 z-[999] grid size-12 place-items-center rounded-xl border border-btn-border bg-btn text-fg shadow-soft transition-all duration-300 hover:border-primary hover:text-primary"
        :class="y > 100 ? 'visible opacity-100' : 'invisible translate-y-6 opacity-0'"
        @click.prevent="window.scrollTo({ top: 0 })"
    >
        <i class="fa-solid fa-arrow-up transition-transform group-hover:-translate-y-0.5" aria-hidden="true"></i>
    </a>
</div>
