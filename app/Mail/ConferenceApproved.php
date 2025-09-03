<?php

namespace App\Mail;

use App\Models\Conference;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConferenceApproved extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Conference $conference)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: env('APP_NAME').': Conference Approved',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.conference-approved',
        );
    }
}
