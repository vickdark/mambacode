@extends('layouts.landing')

@section('title', 'Contacto | Mamba Code')
@section('meta_description', 'Contáctanos y nuestro equipo de Mamba Code te responderá pronto. Solicita una consultoría, una demo en vivo o cuéntanos tu proyecto de software a medida.')
@section('meta_keywords', 'contacto Mamba Code, cotizar software, consultoría tecnológica, desarrollo a medida, Colombia')

@section('content')
    <x-landing.navigation />

    <section class="bg-dot-grid overflow-hidden border-b border-glass" id="formulario">
        <div class="container-page grid gap-10 py-14 sm:py-20 lg:grid-cols-12 lg:gap-14">
            {{-- Direct channels --}}
            <div class="animate-fade-up lg:col-span-5">
                {{-- Faint Laravel code behind the heading only; it fades out before the channels and the form --}}
                <div class="relative isolate">
                    <x-code-rain class="code-rain-soft -z-10" />
                    <span class="eyebrow">/ contacto</span>
                    <h1 class="mt-4 mb-5 text-[clamp(2.3rem,4.4vw,3.6rem)] leading-[1.04] font-bold tracking-[-0.04em] text-fg">
                        Hablemos de tu <span class="text-primary">proyecto.</span>
                    </h1>
                    <p class="mb-8 max-w-md text-lg leading-relaxed text-muted">Cuéntanos qué necesitas: una consultoría, una demo en vivo o un desarrollo a medida. Te respondemos en 24-48 horas hábiles.</p>
                </div>

                <a href="https://wa.me/573235059939" target="_blank" rel="noopener noreferrer" class="group mb-4 flex items-center gap-4 rounded-[1.1rem] border border-glass bg-surface p-5 transition-colors hover:border-[#25D366]">
                    <span class="grid size-12 shrink-0 place-items-center rounded-xl bg-[#25D366] text-white">
                        <x-icons.whatsapp class="size-6" />
                    </span>
                    <span class="flex-1">
                        <strong class="block font-display text-lg font-semibold text-fg">Escríbenos por WhatsApp</strong>
                        <span class="text-sm text-muted">La forma más rápida de hablar con el equipo</span>
                    </span>
                    <i class="fa-solid fa-arrow-right text-sm text-muted transition-transform group-hover:translate-x-1" aria-hidden="true"></i>
                </a>

                <div class="rounded-[1.1rem] border border-glass bg-surface p-5">
                    <span class="mb-3 flex items-center gap-2.5 font-mono text-xs text-faint uppercase">
                        <i class="fa-solid fa-envelope text-primary" aria-hidden="true"></i> Correo
                    </span>
                    <ul class="space-y-1.5">
                        @foreach (config('mail.contact_emails') as $email)
                            <li><a href="mailto:{{ $email }}" class="break-all text-fg transition hover:text-primary">{{ $email }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Form --}}
            <div class="animate-fade-up [animation-delay:0.12s] lg:col-span-7">
                @if (session('success'))
                    <div class="mb-4 flex items-start gap-3 rounded-xl border border-ok/40 bg-ok/10 px-4 py-3 text-ok" role="status">
                        <i class="fa-solid fa-circle-check mt-0.5" aria-hidden="true"></i>
                        <div>
                            <p>{{ session('success') }}</p>
                            @if (session('reference'))
                                <p class="mt-1 text-sm text-muted">Referencia de envío: <strong class="font-mono text-fg">{{ session('reference') }}</strong></p>
                            @endif
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-red-500/40 bg-red-500/10 px-4 py-3 text-red-400 light:text-red-700" role="alert">
                        <ul class="list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('components.landing.contact-form')
            </div>
        </div>
    </section>

    <x-landing.footer />
@endsection
