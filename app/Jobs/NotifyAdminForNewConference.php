<?php

namespace App\Jobs;

use App\Mail\ConferenceCreated;
use App\Models\Conference;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyAdminForNewConference implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Conference $conference)
    {
    }

    public function handle(): void
    {
        foreach (explode(',', env('ADMIN_USERS')) as $user) {
            Mail::to($user)->send(new ConferenceCreated($this->conference));
        }
    }
}
