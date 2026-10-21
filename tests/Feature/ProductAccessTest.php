<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductAccessTest extends TestCase
{
    public function test_directory_links_to_published_products_without_an_additional_login(): void
    {
        config()->set('products.itam.url', null);

        $response = $this->get('/accesos');

        $response->assertOk()
            ->assertHeader('X-Robots-Tag', 'noindex, nofollow')
            ->assertSee('<meta name="robots" content="noindex, nofollow">', false)
            ->assertSee('https://licorera-pos.mambacode.dev/superadmin')
            ->assertSee('https://licorera-pos.mambacode.dev/login')
            ->assertSee('https://test-transporteskemuel.mambacode.dev/login/index.php')
            ->assertSee('https://aloja360.mambacode.dev/login')
            ->assertSee('https://medicosintegrados.mambacode.dev/')
            ->assertSee(asset('img/products/sales/cover.png'))
            ->assertSee(asset('img/products/transports/trans_1.png'))
            ->assertSee(asset('img/products/aloja360/cover.png'))
            ->assertSee(asset('img/products/medicos/cover.png'))
            ->assertSee('En migración · acceso actual')
            ->assertDontSee('Gestión ITAM')
            ->assertDontSee('sistema-ventas.mambacode.dev');
    }

    public function test_directory_uses_configured_accesses_and_hides_invalid_destinations(): void
    {
        config()->set('products.sales.url', 'https://ventas.example.com/login');
        config()->set('products.itam.url', 'https://activos.example.com/login');
        config()->set('products.hospitality.url', 'javascript:alert(1)');
        config()->set('products.transports.url', 'https://admin:secret@example.com/login');

        $this->get('/accesos')->assertOk()
            ->assertSee('https://ventas.example.com/login')
            ->assertSee('https://activos.example.com/login')
            ->assertSee(asset('img/products/itam/itam_1.png'))
            ->assertDontSee('javascript:')
            ->assertDontSee('admin:secret')
            ->assertDontSee('https://licorera-pos.mambacode.dev/superadmin');
    }

    public function test_public_product_and_sales_access_are_connected_to_the_site(): void
    {
        $this->get('/')->assertOk()
            ->assertSee(route('products.hospitality'))
            ->assertSee(route('products.aloja360'))
            ->assertSee(route('products.medicos'))
            ->assertSee('Aloja360')
            ->assertSee('Médicos Integrados')
            ->assertSee(route('access.index'));

        $this->get('/pos-cafeterias-bares')->assertOk()
            ->assertSee('POS para Cafeterías y Bares | Mamba Code')
            ->assertSee(route('contact'));

        config()->set('products.aloja360.url', 'https://aloja360.example.com/login');
        $this->get('/aloja360')->assertOk()
            ->assertSee('Aloja360 | Gestión de Alojamientos | Mamba Code')
            ->assertSee('disponibilidad, tarifas, huéspedes, cotizaciones, reservas')
            ->assertSee('https://aloja360.example.com/login');

        config()->set('products.medicos.url', 'https://medicos.example.com/');
        $this->get('/medicos-integrados')->assertOk()
            ->assertSee('Médicos Integrados | Atención Médica Conectada | Mamba Code')
            ->assertSee('historial médico, diagnósticos, recetas y pagos')
            ->assertSee('https://medicos.example.com/');

        config()->set('products.sales.url', 'https://ventas.example.com/login');
        $this->get('/sales')->assertOk()
            ->assertSee('https://ventas.example.com/login');
    }

    public function test_sitemap_includes_the_new_product_but_excludes_the_directory(): void
    {
        $this->get('/sitemap.xml')->assertOk()
            ->assertSee(route('products.hospitality'))
            ->assertSee(route('products.aloja360'))
            ->assertSee(route('products.medicos'))
            ->assertDontSee(route('access.index'));
    }
}
