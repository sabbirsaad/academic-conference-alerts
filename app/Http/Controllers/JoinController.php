<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJoinRequest;
use App\Jobs\ProcessUserEmailVerification;
use App\Models\User;

class JoinController extends Controller
{
    public function show()
    {
        return view('auth.join');
    }

    public function store(StoreJoinRequest $request)
    {
        $validated = $request->validated();
        $validated['hash'] = $this->generateHasFromEmail($validated['email']);

        $user = User::create($validated);

        ProcessUserEmailVerification::dispatch($user);

        return redirect()->route('join')
            ->with([
                'success' => 'You have successfully joined!',
            ]);
    }

    private function generateHasFromEmail($email): string
    {
        return md5($email.now());
    }
}
