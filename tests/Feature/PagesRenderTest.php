<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesRenderTest extends TestCase
{
    public static function pages(): array
    {
        return [
            'home' => ['home', 'Productos Recientes'],
            'transports' => ['products.transports', 'Sistema de Transporte Privado'],
            'sales' => ['products.sales', 'Vende más, gestiona mejor'],
            'hospitality' => ['products.hospitality', 'Cada negocio tiene su ritmo.'],
            'itam' => ['products.itam', 'Tu inventario bajo control'],
            'gym' => ['products.gym', 'Entrena tu negocio'],
            'aloja360' => ['products.aloja360', 'Todo lo que sucede en tu alojamiento.'],
            'medicos' => ['products.medicos', 'La información de salud, más accesible.'],
            'custom' => ['products.custom', 'Tu Producto - Desarrollo a Medida'],
            'contact' => ['contact', 'Envíanos un mensaje'],
            'privacy' => ['privacy.policy', 'POLÍTICA DE TRATAMIENTO DE DATOS PERSONALES'],
        ];
    }

    #[DataProvider('pages')]
    public function test_public_page_renders_without_bootstrap(string $route, string $text): void
    {
        $this->get(route($route))
            ->assertOk()
            ->assertSee($text)
            ->assertSee('x-data="navbar"', false)
            ->assertDontSee('data-bs-', false);
    }

    public function test_contact_form_keeps_anti_spam_fields(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('name="website"', false)
            ->assertSee('name="form_started_at"', false)
            ->assertSee('name="data_consent"', false);
    }
}
