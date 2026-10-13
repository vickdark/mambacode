<?php

namespace Tests\Feature;

use App\Mail\ContactFormMail;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormSpamTest extends TestCase
{
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Ana Pérez',
            'email' => 'ana@empresa.com',
            'phone' => '3001234567',
            'company' => 'Empresa SAS',
            'preferred_contact' => 'email',
            'subject' => 'Cotización software de gimnasio',
            'message' => 'Hola, me interesa conocer los planes para mi gimnasio.',
            'data_consent' => '1',
            'website' => '',
            'form_started_at' => encrypt(now()->subMinute()->timestamp),
        ], $overrides);
    }

    public function test_legit_message_is_sent(): void
    {
        Mail::fake();

        $this->post('/contact', $this->payload())->assertRedirect(route('contact'));

        Mail::assertSent(ContactFormMail::class, function (ContactFormMail $mail) {
            return $mail->hasTo('lbarriosmunoz1012@gmail.com')
                && $mail->hasTo('victormanjarres3mayo@gmail.com');
        });
        Mail::assertSentCount(1);
    }

    public function test_spam_is_silently_dropped(): void
    {
        Mail::fake();
        $this->withoutMiddleware(ThrottleRequests::class);

        $cases = [
            ['website' => 'http://spam.com'],
            ['form_started_at' => encrypt(now()->timestamp)],
            ['form_started_at' => 'tampered'],
            ['subject' => 'Unlimited B2B data — any industry, any town - FREE'],
            ['message' => 'See https://a.com and https://b.com now'],
            ['name' => 'Visit www.spam.com'],
        ];

        foreach ($cases as $case) {
            $this->post('/contact', $this->payload($case))
                ->assertRedirect(route('contact'))
                ->assertSessionHas('success');
        }

        Mail::assertNothingSent();
    }

    public function test_submissions_are_rate_limited(): void
    {
        Mail::fake();

        for ($i = 0; $i < 3; $i++) {
            $this->post('/contact', $this->payload());
        }

        $this->post('/contact', $this->payload())->assertSessionHasErrors('message');

        Mail::assertSentCount(3);
    }

    public function test_contact_page_is_never_cached_publicly(): void
    {
        $this->get('/contact')->assertHeader('Cache-Control', 'no-store, private');
    }

    public function test_static_pages_keep_public_cache(): void
    {
        $this->get('/')->assertHeader('Cache-Control', 'max-age=3600, public');
    }
}
