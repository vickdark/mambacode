<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'preferred_contact' => 'nullable|in:email,phone,whatsapp',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
            'data_consent' => 'accepted',
        ]);

        // silently drop spam: pretend success so bots don't learn to adapt
        if ($reason = $this->spamReason($request, $data)) {
            logger()->warning('Contact form spam blocked: ' . $reason, [
                'ip' => $request->ip(),
                'email' => $data['email'],
                'subject' => $data['subject'],
            ]);

            return redirect()->route('contact')->with('success', 'Tu mensaje fue enviado correctamente.')->with('reference', strtoupper(Str::random(8)));
        }

        unset($data['data_consent']);

        // generate a short reference code for tracking
        $reference = strtoupper(Str::random(8));

        // team addresses that receive contact messages (config/mail.php)
        $recipients = config('mail.contact_recipients');

        // attach reference to data sent in email
        $data['reference'] = $reference;

        try {
            // one message to all recipients: a single SMTP round-trip instead of one per address
            Mail::to($recipients)->send(new ContactFormMail($data));
        } catch (\Exception $e) {
            // don't expose mail errors to users; log if needed
            logger()->error('Contact form mail error: ' . $e->getMessage());
            return back()->withInput()->with('success', 'Hemos recibido tu mensaje.')->with('reference', $reference);
        }

        return redirect()->route('contact')->with('success', 'Tu mensaje fue enviado correctamente.')->with('reference', $reference);
    }

    /**
     * Return why a submission looks like spam, or null if it looks legit.
     */
    private function spamReason(Request $request, array $data): ?string
    {
        // honeypot: hidden field only bots fill in
        if (filled($request->input('website'))) {
            return 'honeypot';
        }

        // time trap: humans need more than a few seconds to fill the form
        try {
            $startedAt = (int) decrypt($request->input('form_started_at'));
        } catch (\Throwable $e) {
            return 'missing or tampered timestamp';
        }

        if (now()->timestamp - $startedAt < 4) {
            return 'submitted too fast';
        }

        // links don't belong in name/company/subject, and few legit messages carry several
        foreach (['name', 'company', 'role', 'subject'] as $field) {
            if (preg_match('~https?://|www\.~i', $data[$field] ?? '')) {
                return "link in {$field}";
            }
        }

        if (preg_match_all('~https?://|www\.~i', $data['message']) > 1) {
            return 'too many links';
        }

        // common cold-outreach / marketing spam phrases
        $text = mb_strtolower($data['subject'] . ' ' . $data['message']);
        $phrases = [
            'b2b data', 'b2b leads', 'email list', 'mailing list', 'backlink', 'guest post',
            'seo services', 'rank your website', 'first page of google', 'web traffic',
            'crypto', 'bitcoin', 'casino', 'unsubscribe', 'free trial', 'download it free',
        ];

        foreach ($phrases as $phrase) {
            if (str_contains($text, $phrase)) {
                return "spam phrase: {$phrase}";
            }
        }

        return null;
    }
}
