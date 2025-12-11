<?php

namespace App\Mail;

use App\Models\SeatReservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GeneralALGInvite extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public SeatReservation $reservation
    ) {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Invitation to ALG 2025 | Saturday, 13th December',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Generate QR code URL
        $qrCodeUrl = $this->generateQRCode();

        return new Content(
            view: 'emails.general-alg-invite',
            with: [
                'reservation' => $this->reservation,
                'qrCodeUrl' => $qrCodeUrl,
            ],
        );
    }

    /**
     * Generate QR code for attendance verification
     */
    protected function generateQRCode(): string
    {
        $verificationUrl = route('attendance.verify', ['token' => $this->reservation->attendance_token]);
        
        return \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')
            ->size(200)
            ->margin(1)
            ->errorCorrection('H')
            ->generate($verificationUrl);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('assets/1x/FINAL Main Program ALG 2025.pdf'))
                ->as('FINAL Main Program ALG 2025.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
