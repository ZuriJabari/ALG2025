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

class AfricanChampionsBreakfastInvite extends Mailable
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
            subject: 'Africa Champions Breakfast - ALG 2025 | Saturday, 13th December',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $verificationUrl = route('attendance.verify', ['token' => $this->reservation->attendance_token]);

        return new Content(
            view: 'emails.african-champions-breakfast-invite',
            with: [
                'reservation' => $this->reservation,
                'verificationUrl' => $verificationUrl,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Generate QR code and save temporarily
        $verificationUrl = route('attendance.verify', ['token' => $this->reservation->attendance_token]);
        $qrCodePath = storage_path('app/qrcodes/qr-' . $this->reservation->attendance_token . '.png');
        
        // Create directory if it doesn't exist
        if (!file_exists(dirname($qrCodePath))) {
            mkdir(dirname($qrCodePath), 0755, true);
        }

        // Generate and save QR code
        try {
            \SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')
                ->size(300)
                ->margin(2)
                ->errorCorrection('H')
                ->generate($verificationUrl, $qrCodePath);
        } catch (\Exception $e) {
            // If PNG fails, try SVG and convert
            $svg = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')
                ->size(300)
                ->margin(2)
                ->errorCorrection('H')
                ->generate($verificationUrl);
            file_put_contents($qrCodePath, $svg);
        }

        return [
            Attachment::fromPath(public_path('assets/1x/Africa Champions Breakfast ALG 2025.pdf'))
                ->as('Africa Champions Breakfast ALG 2025.pdf')
                ->withMime('application/pdf'),
            Attachment::fromPath(public_path('assets/1x/FINAL Main Program ALG 2025.pdf'))
                ->as('FINAL Main Program ALG 2025.pdf')
                ->withMime('application/pdf'),
            Attachment::fromPath($qrCodePath)
                ->as('QR-Code-' . $this->reservation->full_name . '.png')
                ->withMime('image/png'),
        ];
    }
}
