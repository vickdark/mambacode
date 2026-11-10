@extends('layouts.landing')

@section('title', 'Médicos Integrados | Atención Médica Conectada | Mamba Code')
@section('meta_description', 'Médicos Integrados conecta pacientes y profesionales de la salud con citas, historial médico, diagnósticos, recetas y pagos desde cualquier dispositivo.')
@section('meta_keywords', 'Médicos Integrados, sistema médico, gestión de citas, historia clínica, recetas médicas, atención en salud')
@section('meta_image', asset('img/products/medicos/cover.png'))
@section('meta_image_alt', 'Portada de Médicos Integrados, plataforma de atención médica')

@section('content')
    <x-landing.navigation />

    <x-products.showcase
        id="medicos"
        product="Médicos Integrados"
        icon="fa-heart-pulse"
        eyebrow="Atención médica integrada"
        title="Tu salud y tu historial,"
        highlight="en un solo lugar."
        lead="Médicos Integrados acerca a pacientes y profesionales para facilitar el cuidado y seguimiento de la salud."
        description="Agenda citas, consulta diagnósticos y recetas, y lleva el control de tus pagos desde cualquier dispositivo."
        :access-url="config('products.medicos.url')"
        access-label="Abrir Médicos Integrados"
        secondary-label="Contactar a Mamba Code"
        image="img/products/medicos/cover.png"
        image-alt="Vista de la plataforma Médicos Integrados con citas y datos de atención"
        capabilities-eyebrow="Acompañamiento en cada consulta"
        capabilities-title="La información de salud, más accesible."
        capabilities-text="Una experiencia digital para facilitar la relación entre pacientes y profesionales médicos."
        :cards="[
            ['icon' => 'fa-calendar-check', 'title' => 'Citas médicas', 'text' => 'Solicita y consulta citas con profesionales y especialistas.'],
            ['icon' => 'fa-file-medical', 'title' => 'Historial y diagnósticos', 'text' => 'Consulta la información clínica y el seguimiento de tus atenciones.'],
            ['icon' => 'fa-prescription', 'title' => 'Recetas', 'text' => 'Accede a las recetas e indicaciones asociadas a tus consultas.'],
            ['icon' => 'fa-file-invoice-dollar', 'title' => 'Pagos y documentos', 'text' => 'Revisa tus pagos y consulta los documentos disponibles desde el portal.'],
        ]"
        footer-title="Conoce Médicos Integrados."
        footer-text="Conversemos sobre las necesidades de tu centro médico."
        footer-label="Solicitar información"
    />

    <x-landing.footer />
@endsection
