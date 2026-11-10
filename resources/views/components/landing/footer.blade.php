@php
    [$quote, $author] = array_pad(explode(' - ', \Illuminate\Foundation\Inspiring::quotes()->random()), 2, '');

    $contacts = [
        ['icon' => 'fa-envelope', 'text' => 'lbarriosmunoz1012@gmail.com', 'href' => 'mailto:lbarriosmunoz1012@gmail.com'],
        ['icon' => 'fa-envelope', 'text' => 'victormanjarres3mayo@gmail.com', 'href' => 'mailto:victormanjarres3mayo@gmail.com'],
        ['icon' => 'fa-phone', 'text' => '+57 323 505 9939', 'href' => 'tel:+573235059939'],
        ['icon' => 'fa-phone', 'text' => '+57 312 335 5193', 'href' => 'tel:+573123355193'],
    ];
@endphp

<footer class="mt-16 border-t border-subtle bg-footer px-4 py-16 text-center text-sm text-muted" id="contacto">
    <div class="container-page grid gap-10 md:grid-cols-4">
        <div>
            <x-brand class="mb-3 justify-center" />
            <p>Soluciones tecnológicas de alto nivel para empresas modernas.</p>
        </div>

        <div class="md:col-span-2">
            <h2 class="mb-4 text-lg font-bold text-fg">Contacto</h2>
            <ul class="space-y-2 text-fg">
                @foreach ($contacts as $contact)
                    <li>
                        <a href="{{ $contact['href'] }}" class="break-all transition hover:text-secondary">
                            <i class="fa-solid {{ $contact['icon'] }} me-2 text-secondary" aria-hidden="true"></i>{{ $contact['text'] }}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('privacy.policy') }}" class="text-secondary hover:underline" target="_blank" rel="noopener">
                        <i class="fa-solid fa-file-contract me-2" aria-hidden="true"></i>Política de Tratamiento de Datos
                    </a>
                </li>
            </ul>
        </div>

        <p class="mx-auto max-w-xs italic md:mt-3">"{{ $quote }}"<br>- {{ $author }}</p>
    </div>

    <div class="container-page mt-12 border-t border-subtle pt-6">
        &copy; {{ date('Y') }} Mamba Code. Todos los derechos reservados.
    </div>
</footer>

{{-- Floating actions: WhatsApp grows while the top of the page is in view --}}
<div x-data="{ y: window.scrollY }" @scroll.window.throttle.50ms="y = window.scrollY">
    <a
        href="https://wa.me/573235059939"
        target="_blank"
        rel="noopener noreferrer"
        title="Contactar por WhatsApp"
        aria-label="Contactar por WhatsApp"
        class="fixed right-5 z-[1000] grid place-items-center rounded-full bg-[#25D366] text-white shadow-lg transition-all duration-300 hover:bg-[#1DA851]"
        :class="y < window.innerHeight / 2 ? 'bottom-5 size-16 text-[2rem]' : 'bottom-[5.5rem] size-[50px] text-2xl'"
    >
        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
    </a>

    <a
        href="#inicio"
        title="Volver arriba"
        aria-label="Volver arriba"
        class="group fixed right-5 bottom-7 z-[999] grid size-[55px] place-items-center rounded-[18px] border border-btn-border bg-btn text-xl text-fg shadow-[0_10px_40px_var(--shadow-color)] backdrop-blur-md transition-all duration-500 hover:-translate-y-2 hover:bg-primary hover:text-white"
        :class="y > 100 ? 'visible opacity-100 scale-100' : 'invisible opacity-0 translate-y-8 scale-75'"
        @click.prevent="window.scrollTo({ top: 0 })"
    >
        <i class="fa-solid fa-arrow-up transition-transform group-hover:-translate-y-1" aria-hidden="true"></i>
    </a>
</div>
