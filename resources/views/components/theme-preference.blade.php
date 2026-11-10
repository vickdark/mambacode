{{-- First-visit dialog asking for light or dark mode. Closing it keeps the current theme. --}}
<div
    x-data="{ show: false }"
    x-init="$store.theme.askPreference && setTimeout(() => show = true, 500)"
    x-show="show"
    x-cloak
    x-transition.opacity
    @keydown.escape.window="show && $store.theme.choose($store.theme.current); show = false"
    class="fixed inset-0 z-[3000] flex items-center justify-center bg-black/70 p-4 backdrop-blur-sm"
    role="dialog"
    aria-modal="true"
    aria-labelledby="theme-preference-title"
>
    <div
        @click.outside="$store.theme.choose($store.theme.current); show = false"
        x-show="show"
        x-transition.scale.90
        class="relative w-full max-w-md rounded-3xl border border-glass bg-surface p-6 text-center shadow-hero sm:p-8"
    >
        <button
            type="button"
            @click="$store.theme.choose($store.theme.current); show = false"
            class="absolute top-3 right-3 grid size-9 place-items-center rounded-full text-muted transition hover:bg-hover hover:text-fg"
            aria-label="Cerrar"
        >
            <i class="fa-solid fa-xmark" aria-hidden="true"></i>
        </button>

        <h2 id="theme-preference-title" class="mb-6 text-xl font-bold sm:text-2xl">¿Cómo prefieres ver la web?</h2>

        <div class="flex flex-col gap-3 sm:flex-row sm:justify-center">
            <button
                type="button"
                @click="$store.theme.choose('dark'); show = false"
                class="flex items-center justify-center gap-3 rounded-xl border-2 border-[#3b82f6] bg-[#0a0a0c] px-6 py-4 font-semibold text-[#f0f0f5] transition hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-500/30"
            >
                <i class="fa-solid fa-moon text-2xl" aria-hidden="true"></i> Modo Oscuro
            </button>
            <button
                type="button"
                @click="$store.theme.choose('light'); show = false"
                class="flex items-center justify-center gap-3 rounded-xl border-2 border-[#2563eb] bg-[#f8fafc] px-6 py-4 font-semibold text-[#0f172a] transition hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-500/30"
            >
                <i class="fa-solid fa-sun text-2xl" aria-hidden="true"></i> Modo Claro
            </button>
        </div>

        <p class="mt-5 text-sm text-muted">Puedes cambiarlo después en el menú de navegación</p>
    </div>
</div>
