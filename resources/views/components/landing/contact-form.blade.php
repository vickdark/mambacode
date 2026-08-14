<form method="POST" action="{{ route('contact.send') }}" class="contact-form">
    @csrf
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h5 class="card-title mb-2">Envíanos un mensaje</h5>
            <p class="text-muted small mb-4">Completa el formulario y nuestro equipo se pondrá en contacto contigo.</p>

            <div class="row gy-3">
                <div class="col-md-6">
                    <label for="contact_name" class="form-label small mb-1">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input id="contact_name" type="text" name="name" class="form-control" required placeholder="Tu nombre" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="contact_email" class="form-label small mb-1">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input id="contact_email" type="email" name="email" class="form-control" required placeholder="tu@empresa.com" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="contact_company" class="form-label small mb-1">Empresa (opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                        <input id="contact_company" type="text" name="company" class="form-control" placeholder="Empresa (opcional)" value="{{ old('company') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="contact_role" class="form-label small mb-1">Cargo / Rol (opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-briefcase"></i></span>
                        <input id="contact_role" type="text" name="role" class="form-control" placeholder="Cargo / Rol (opcional)" value="{{ old('role') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="contact_phone" class="form-label small mb-1">Teléfono (opcional)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                        <input id="contact_phone" type="text" name="phone" class="form-control" placeholder="Teléfono (opcional)" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="contact_subject" class="form-label small mb-1">Asunto</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                        <input id="contact_subject" type="text" name="subject" class="form-control" required placeholder="Asunto" value="{{ old('subject') }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="contact_preferred_contact" class="form-label small mb-1">Preferencia de contacto</label>
                    <select id="contact_preferred_contact" name="preferred_contact" class="form-select">
                        <option value="email" {{ old('preferred_contact')=='email' ? 'selected' : '' }}>Correo electrónico</option>
                        <option value="phone" {{ old('preferred_contact')=='phone' ? 'selected' : '' }}>Teléfono</option>
                        <option value="whatsapp" {{ old('preferred_contact')=='whatsapp' ? 'selected' : '' }}>WhatsApp</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="contact_message" class="form-label small mb-1">Mensaje</label>
                    <textarea id="contact_message" name="message" rows="6" class="form-control" required placeholder="Cuéntanos tu proyecto o problema">{{ old('message') }}</textarea>
                </div>

                <div class="col-12 d-flex flex-column flex-md-row align-items-center gap-3 justify-content-between">
                    <small class="text-muted">Al enviar aceptas que revisemos tu mensaje. Respondemos en 24-48 horas hábiles.</small>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary px-4" type="submit">Enviar mensaje</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
