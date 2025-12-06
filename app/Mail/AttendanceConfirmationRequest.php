<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceConfirmationRequest extends Mailable
{
    use Queueable, SerializesModels;

    public string $fullName;
    public string $attendanceUrl;

    public function __construct(string $fullName, string $attendanceUrl)
    {
        $this->fullName = $fullName;
        $this->attendanceUrl = $attendanceUrl;
    }

    public function build(): self
    {
        return $this->subject('Confirm how you will attend - ALG 2025')
            ->view('emails.attendance_confirmation_request');
    }
}
