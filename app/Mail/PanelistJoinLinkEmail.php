<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PanelistJoinLinkEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $speakerName,
        public string $joinUrl
    ) {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Panelist Connection Link – Annual Leaders Gathering 2025',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.panelist-join-link',
            with: [
                'speakerName' => $this->speakerName,
                'joinUrl' => $this->joinUrl,
            ],
        );
    }
}
