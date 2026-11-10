@php
    // CTAs link here with ?asunto=... so the team knows where the request came from; the visitor can still edit it.
    $subject = \Illuminate\Support\Str::limit(trim((string) request()->query('asunto', '')), 120, '');
@endphp

<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    {{-- Anti-spam: campo trampa (los humanos no lo ven) y marca de tiempo cifrada --}}
    <div class="absolute -left-[9999px] size-px overflow-hidden" aria-hidden="true">
        <label for="contact_website">No llenes este campo</label>
        <input id="contact_website" type="text" name="website" value="" tabindex="-1" autocomplete="off">
    </div>
    <input type="hidden" name="form_started_at" value="{{ encrypt(now()->timestamp) }}">

    <div class="rounded-[1.25rem] border border-glass bg-surface p-6 text-fg sm:p-9">
        <h2 class="mb-1.5 text-2xl font-semibold text-fg">Envíanos un mensaje</h2>
        <p class="mb-7 text-sm text-muted">Los campos marcados como opcionales nos ayudan a preparar mejor la respuesta.</p>

        <div class="grid gap-5 md:grid-cols-2">
            <x-form-field name="name" label="Nombre" icon="fa-user" required placeholder="Tu nombre" autocomplete="name" />
            <x-form-field name="email" type="email" label="Correo electrónico" icon="fa-envelope" required placeholder="tu@empresa.com" autocomplete="email" />
            <x-form-field name="company" label="Empresa (opcional)" icon="fa-building" placeholder="Nombre de tu empresa" autocomplete="organization" />
            <x-form-field name="role" label="Cargo / Rol (opcional)" icon="fa-briefcase" placeholder="Tu cargo" autocomplete="organization-title" />
            <x-form-field name="phone" type="tel" label="Teléfono (opcional)" icon="fa-phone" placeholder="+57 300 000 0000" autocomplete="tel" />

            <x-form-field name="preferred_contact" type="select" label="Preferencia de contacto">
                <option value="email" @selected(old('preferred_contact') == 'email')>Correo electrónico</option>
                <option value="phone" @selected(old('preferred_contact') == 'phone')>Teléfono</option>
                <option value="whatsapp" @selected(old('preferred_contact') == 'whatsapp')>WhatsApp</option>
            </x-form-field>

            <x-form-field name="subject" label="Asunto" icon="fa-tag" class="md:col-span-2" :value="$subject" required placeholder="¿Sobre qué quieres hablar?" maxlength="255" />
            <x-form-field name="message" type="textarea" label="Mensaje" class="md:col-span-2" required placeholder="Cuéntanos tu proyecto o el problema que quieres resolver" />

            <div class="mt-2 flex flex-col gap-5 md:col-span-2">
                <label class="flex items-start gap-3 text-sm text-muted" for="data_consent">
                    <input class="mt-0.5 size-4 shrink-0 accent-primary" type="checkbox" name="data_consent" id="data_consent" value="1" required>
                    <span>
                        Autorizo a Mambacode para recolectar y tratar mis datos personales con el fin de gestionar y responder mi solicitud, de acuerdo con su
                        <a href="{{ route('privacy.policy') }}" target="_blank" rel="noopener noreferrer" class="text-primary underline">Política de Tratamiento de Datos Personales</a>.
                    </span>
                </label>
                <button class="btn-primary w-full sm:w-auto sm:self-start" type="submit">
                    Enviar mensaje <i class="fa-solid fa-paper-plane text-sm" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</form>
