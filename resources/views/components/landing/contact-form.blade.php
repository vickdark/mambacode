<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    {{-- Anti-spam: campo trampa (los humanos no lo ven) y marca de tiempo cifrada --}}
    <div class="absolute -left-[9999px] size-px overflow-hidden" aria-hidden="true">
        <label for="contact_website">No llenes este campo</label>
        <input id="contact_website" type="text" name="website" value="" tabindex="-1" autocomplete="off">
    </div>
    <input type="hidden" name="form_started_at" value="{{ encrypt(now()->timestamp) }}">

    <div class="rounded-2xl border border-card-border bg-card p-5 text-fg shadow-sm backdrop-blur-xl sm:p-9">
        <h2 class="mb-2 text-xl font-semibold text-primary">Envíanos un mensaje</h2>
        <p class="mb-6 text-sm text-muted">Completa el formulario y nuestro equipo se pondrá en contacto contigo.</p>

        <div class="grid gap-5 md:grid-cols-2">
            <x-form-field name="name" label="Nombre" icon="fa-user" required placeholder="Tu nombre" autocomplete="name" />
            <x-form-field name="email" type="email" label="Correo electrónico" icon="fa-envelope" required placeholder="tu@empresa.com" autocomplete="email" />
            <x-form-field name="company" label="Empresa (opcional)" icon="fa-building" placeholder="Empresa (opcional)" autocomplete="organization" />
            <x-form-field name="role" label="Cargo / Rol (opcional)" icon="fa-briefcase" placeholder="Cargo / Rol (opcional)" autocomplete="organization-title" />
            <x-form-field name="phone" type="tel" label="Teléfono (opcional)" icon="fa-phone" placeholder="Teléfono (opcional)" autocomplete="tel" />
            <x-form-field name="subject" label="Asunto" icon="fa-tag" required placeholder="Asunto" />

            <x-form-field name="preferred_contact" type="select" label="Preferencia de contacto">
                <option value="email" @selected(old('preferred_contact') == 'email')>Correo electrónico</option>
                <option value="phone" @selected(old('preferred_contact') == 'phone')>Teléfono</option>
                <option value="whatsapp" @selected(old('preferred_contact') == 'whatsapp')>WhatsApp</option>
            </x-form-field>

            <x-form-field name="message" type="textarea" label="Mensaje" class="md:col-span-2" required placeholder="Cuéntanos tu proyecto o problema" />

            <div class="mt-4 flex flex-col gap-4 md:col-span-2">
                <label class="flex items-start gap-3 text-sm" for="data_consent">
                    <input class="mt-0.5 size-4 shrink-0 accent-primary" type="checkbox" name="data_consent" id="data_consent" value="1" required>
                    <span>
                        Autorizo a Mambacode para recolectar y tratar mis datos personales con el fin de gestionar y responder mi solicitud, de acuerdo con su
                        <a href="{{ route('privacy.policy') }}" target="_blank" rel="noopener noreferrer" class="text-secondary underline">Política de Tratamiento de Datos Personales</a>.
                    </span>
                </label>
                <small class="text-muted">Respondemos en 24-48 horas hábiles.</small>
                <div>
                    <button class="w-full rounded-lg bg-primary px-6 py-2.5 font-semibold text-white transition hover:brightness-105 sm:w-auto" type="submit">Enviar mensaje</button>
                </div>
            </div>
        </div>
    </div>
</form>
