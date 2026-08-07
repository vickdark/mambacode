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
            'message' => 'required|string'
        ]);

        // generate a short reference code for tracking
        $reference = strtoupper(Str::random(8));

        // send email to team addresses (from footer)
        $recipients = [
            'lbarriosmunoz1012@gmail.com',
            'victormanjarres3mayo@gmail.com'
        ];

        // attach reference to data sent in email
        $data['reference'] = $reference;

        try {
            foreach ($recipients as $to) {
                Mail::to($to)->send(new ContactFormMail($data));
            }
        } catch (\Exception $e) {
            // don't expose mail errors to users; log if needed
            logger()->error('Contact form mail error: ' . $e->getMessage());
            return back()->withInput()->with('success', 'Hemos recibido tu mensaje.')->with('reference', $reference);
        }

        return redirect()->route('contact')->with('success', 'Tu mensaje fue enviado correctamente.')->with('reference', $reference);
    }
}
