<?php

namespace App\Http\Controllers\Websites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 🛑 Honeypot (Bot trap)
        if ($request->filled('website')) {
            abort(403);
        }

        // ✅ Basic Validation
        $data = $request->validate([
            'name'    => 'required|string|min:3|max:100',
            'email'   => 'required|email|max:150',
            'company' => 'nullable|string|max:150',
            'service' => 'nullable|string|max:150',
            'message' => 'required|string|min:10|max:2000',
            'cf-turnstile-response' => 'required', // Turnstile token
        ], [
            'cf-turnstile-response.required' => 'Please complete the security check.'
        ]);

        // 🛡️ Cloudflare Turnstile Verification
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret'   => env('TURNSTILE_SECRET_KEY'),
            'response' => $request->input('cf-turnstile-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!$response->json('success')) {
            return back()->withErrors([
                'cf-turnstile-response' => 'Bot Detection Failed. Please Try Again.'
            ])->withInput();
        }

        // 🔐 Email based limit (max 3 per day)
        $rateLimitKey = 'contact-email-' . Str::lower($data['email']);

        if (RateLimiter::tooManyAttempts($rateLimitKey, 3)) {
            return back()->withErrors([
                'email' => 'You have already sent 3 messages. Please try again tomorrow.',
            ])->withInput();
        }

        RateLimiter::hit($rateLimitKey, now()->addDay());

        // 💾 Save to DB
        ContactMessage::create([
            'name'    => strip_tags($data['name']),
            'email'   => $data['email'],
            'company' => strip_tags($data['company'] ?? ''),
            'service' => strip_tags($data['service'] ?? ''),
            'message' => strip_tags($data['message']),
        ]);

        // 📧 Send Email
        try {
            Mail::to(config('mail.from.address'))->send(new ContactMail($data));
        } catch (\Exception $e) {
            // ইমেইল পাঠাতে সমস্যা হলেও মেসেজ সেভ হয়েছে
        }

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
