<div style="font-family: Arial, Helvetica, sans-serif; color: #0f172a;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="max-width:600px;margin:0 auto;background:#ffffff;border-radius:8px;overflow:hidden;border:1px solid #e6e6e6;">
        <tr style="background: #0f172a; color: #fff;">
            <td style="padding:18px 20px;">
                <div style="display:flex;align-items:center;gap:12px;">
                    <img src="{{ asset('img/mambacode.jpeg') }}" alt="Mamba Code" style="height:36px;border-radius:4px;" />
                    <strong style="font-size:16px;">Nuevo mensaje - Formulario de Contacto</strong>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding:18px 20px;">
                @if(!empty($data['reference']))
                    <p style="margin:0 0 8px;">Referencia: <strong>{{ $data['reference'] }}</strong></p>
                @endif
                <p style="margin:0 0 6px;"><strong>Nombre:</strong> {{ $data['name'] }}</p>
                <p style="margin:0 0 6px;"><strong>Email:</strong> {{ $data['email'] }}</p>
                @if(!empty($data['phone']))
                    <p style="margin:0 0 6px;"><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
                @endif
                @if(!empty($data['company']))
                    <p style="margin:0 0 6px;"><strong>Empresa:</strong> {{ $data['company'] }}</p>
                @endif
                @if(!empty($data['role']))
                    <p style="margin:0 0 6px;"><strong>Cargo / Rol:</strong> {{ $data['role'] }}</p>
                @endif
                @if(!empty($data['preferred_contact']))
                    <p style="margin:0 0 6px;"><strong>Preferencia de contacto:</strong> {{ $data['preferred_contact'] === 'whatsapp' ? 'WhatsApp' : ucfirst($data['preferred_contact']) }}</p>
                @endif
                <p style="margin:12px 0 6px;"><strong>Asunto:</strong> {{ $data['subject'] }}</p>
                <p style="margin:0 0 12px;"><strong>Mensaje:</strong></p>
                <div style="padding:12px;border-left:3px solid #0f172a;background:#f7fafc;border-radius:4px;color:#111;">{!! nl2br(e($data['message'])) !!}</div>
            </td>
        </tr>
        <tr style="background:#fafafa;">
            <td style="padding:12px 20px;text-align:center;color:#6b7280;font-size:13px;">
                Mensaje enviado desde Mamba Code • <a href="{{ url('/') }}" style="color:#0f172a;text-decoration:none;">mambacode.com</a>
            </td>
        </tr>
    </table>
</div>
