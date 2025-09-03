<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscriberRequest;
use App\Jobs\SendNewsletterVerificationEmail;
use App\Models\NewsletterSubscriber;

class NewsletterSubscriberController extends Controller
{
    public function store(NewsletterSubscriberRequest $request)
    {
        $data = $request->validated();

        $subscriber = NewsletterSubscriber::create([
            'email' => $data['email'],
            'hash' => md5($data['email'].now()),
        ]);

        SendNewsletterVerificationEmail::dispatch($subscriber);

        return redirect()->back()->with('success', 'You have successfully Subscribed!');
    }

    public function show($hash)
    {
        $subscriber = NewsletterSubscriber::where('hash', $hash)->firstOrFail();

        $subscriber->update(['hash' => null, 'email_verified_at' => now()]);

        return redirect()->back()->with(['success' => 'You have successfully verified your email.']);
    }
}
