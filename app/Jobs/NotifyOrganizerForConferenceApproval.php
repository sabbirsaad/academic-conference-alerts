<?php

namespace App\Jobs;

use App\Mail\ConferenceApproved;
use App\Models\Conference;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyOrganizerForConferenceApproval implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Conference $conference)
    {
    }

    public function handle(): void
    {
        Mail::to($this->conference->creator->email)->send(new ConferenceApproved($this->conference));
    }
}
