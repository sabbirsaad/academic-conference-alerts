<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscriberJoined extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public NewsletterSubscriber $subscriber)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify your email',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.newsletter-subscriber-joined',
        );
    }
}
