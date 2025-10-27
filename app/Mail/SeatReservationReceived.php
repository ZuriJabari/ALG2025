<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SeatReservationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public string $fullName;

    public function __construct(string $fullName)
    {
        $this->fullName = $fullName;
    }

    public function build(): self
    {
        return $this->subject('Thank You for Registering - ALG 2025')
            ->view('emails.seat_reservation_received');
    }
}
