<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserVerificationController extends Controller
{
    public function show($hash)
    {
        $user = User::where('hash', $hash)->firstOrFail();

        $user->update(['hash' => null, 'email_verified_at' => now()]);

        return redirect()->back()->with(['success' => 'You have successfully verified your email.']);
    }
}
